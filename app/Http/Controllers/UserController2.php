<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\NewUserPassword;

class UserController extends Controller
{
    /**
     * Mostrar lista de usuarios con paginación y filtros
     */
    public function index(Request $request)
    {
        $query = User::query();
        
        // Aplicar filtros
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        
        if ($request->filled('last_name')) {
            $query->where(function($q) use ($request) {
                $q->where('first_last_name', 'like', '%' . $request->last_name . '%')
                  ->orWhere('second_last_name', 'like', '%' . $request->last_name . '%');
            });
        }
        
        if ($request->filled('country')) {
            $query->where('country', 'like', '%' . $request->country . '%');
        }
        
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
        
        // Paginación
        $users = $query->paginate(10);
        
        return response()->json([
            'users' => $users->items(),
            'current_page' => $users->currentPage(),
            'last_page' => $users->lastPage(),
            'total' => $users->total(),
        ]);
    }
    
    /**
     * Crear un nuevo usuario
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|max:255',
            'first_last_name' => 'required|string|max:255',
            'second_last_name' => 'nullable|string|max:255',
            'country' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'send_password' => 'boolean'
        ]);
        
        // Generar contraseña aleatoria
        $password = Str::random(12);
        
        $user = User::create([
            'email' => $validated['email'],
            'name' => $validated['name'],
            'first_last_name' => $validated['first_last_name'],
            'second_last_name' => $validated['second_last_name'],
            'country' => $validated['country'],
            'phone' => $validated['phone'],
            'password' => Hash::make($password),
            'active' => true,
        ]);
        
        // Enviar correo con la contraseña si se solicitó
        if ($request->boolean('send_password')) {
            try {
                Mail::to($user->email)->send(new NewUserPassword($user, $password));
            } catch (\Exception $e) {
                // Log del error pero continuar
                \Log::error('Error sending password email: ' . $e->getMessage());
            }
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Usuario creado exitosamente',
            'user' => $user
        ]);
    }
    
    /**
     * Actualizar un usuario existente
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'name' => 'required|string|max:255',
            'first_last_name' => 'required|string|max:255',
            'second_last_name' => 'nullable|string|max:255',
            'country' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'send_password' => 'boolean'
        ]);
        
        // Actualizar datos del usuario
        $user->update([
            'email' => $validated['email'],
            'name' => $validated['name'],
            'first_last_name' => $validated['first_last_name'],
            'second_last_name' => $validated['second_last_name'],
            'country' => $validated['country'],
            'phone' => $validated['phone'],
        ]);
        
        // Generar nueva contraseña y enviar por correo si se solicitó
        if ($request->boolean('send_password')) {
            $password = Str::random(12);
            $user->update([
                'password' => Hash::make($password)
            ]);
            
            try {
                Mail::to($user->email)->send(new NewUserPassword($user, $password));
            } catch (\Exception $e) {
                \Log::error('Error sending password email: ' . $e->getMessage());
            }
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Usuario actualizado exitosamente',
            'user' => $user
        ]);
    }
    
    /**
     * Eliminar un usuario (soft delete)
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Usuario eliminado exitosamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el usuario: ' . $e->getMessage()
            ], 500);
        }
    }
}


<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserPassword;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request, $role = 'all')
    {
        // Para peticiones AJAX (filtros, paginación)
        if ($request->ajax()) {
            $query = User::query();
            
            // Filtrar por rol si no es 'all'
            if ($role !== 'all') {
                $query->where('role', $role);
            }
            
            // Aplicar filtros adicionales
            if ($request->has('name') && $request->name) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }
            
            if ($request->has('last_name') && $request->last_name) {
                $query->where(function($q) use ($request) {
                    $q->where('first_last_name', 'like', '%' . $request->last_name . '%')
                      ->orWhere('second_last_name', 'like', '%' . $request->last_name . '%');
                });
            }
            
            if ($request->has('country') && $request->country) {
                $query->where('country', 'like', '%' . $request->country . '%');
            }
            
            if ($request->has('email') && $request->email) {
                $query->where('email', 'like', '%' . $request->email . '%');
            }
            
            // Filtrar por estado activo/inactivo si se proporciona
            if ($request->has('active') && $request->active !== '') {
                $query->where('active', $request->active);
            }
            
            // Ordenar por fecha de creación más reciente primero
            $query->orderBy('created_at', 'desc');
            
            $users = $query->paginate(10);
            
            return response()->json([
                'success' => true,
                'users' => $users->items(),
                'current_page' => $users->currentPage(),
                'last_page' => $users->lastPage(),
                'total' => $users->total(),
                'current_role' => $role
            ]);
        }
        
        // Para carga inicial de la página
        return view('admin.usuarios', compact('role'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|email|unique:users,email',
                'name' => 'required|string|max:255',
                'first_last_name' => 'required|string|max:255',
                'second_last_name' => 'nullable|string|max:255',
                'country' => 'required|string|max:100',
                'phone' => 'required|string|max:20',
                'role' => ['required', Rule::in(['admin', 'user', 'editor'])],
                'send_password' => 'boolean',
                'active' => 'boolean'
            ]);
            
            // Generar contraseña aleatoria
            $password = Str::random(12);
            
            $user = User::create([
                'email' => $validated['email'],
                'name' => $validated['name'],
                'first_last_name' => $validated['first_last_name'],
                'second_last_name' => $validated['second_last_name'] ?? null,
                'country' => $validated['country'],
                'phone' => $validated['phone'],
                'role' => $validated['role'],
                'password' => Hash::make($password),
                'active' => $validated['active'] ?? true,
            ]);
            
            // Enviar correo con la contraseña si se solicitó
            if ($request->boolean('send_password')) {
                try {
                    Mail::to($user->email)->send(new NewUserPassword($user, $password));
                } catch (\Exception $e) {
                    // Log del error pero continuar
                    \Log::error('Error sending password email: ' . $e->getMessage());
                }
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Usuario creado exitosamente',
                'user' => $user
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el usuario: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            $validated = $request->validate([
                'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
                'name' => 'required|string|max:255',
                'first_last_name' => 'required|string|max:255',
                'second_last_name' => 'nullable|string|max:255',
                'country' => 'required|string|max:100',
                'phone' => 'required|string|max:20',
                'role' => ['required', Rule::in(['admin', 'user', 'editor'])],
                'active' => 'boolean',
                'send_password' => 'boolean'
            ]);
            
            // Datos a actualizar
            $updateData = [
                'email' => $validated['email'],
                'name' => $validated['name'],
                'first_last_name' => $validated['first_last_name'],
                'second_last_name' => $validated['second_last_name'] ?? null,
                'country' => $validated['country'],
                'phone' => $validated['phone'],
                'role' => $validated['role'],
                'active' => $validated['active'] ?? $user->active,
            ];
            
            // Generar nueva contraseña y enviar por correo si se solicitó
            if ($request->boolean('send_password')) {
                $password = Str::random(12);
                $updateData['password'] = Hash::make($password);
                
                try {
                    Mail::to($user->email)->send(new NewUserPassword($user, $password));
                } catch (\Exception $e) {
                    \Log::error('Error sending password email: ' . $e->getMessage());
                }
            }
            
            $user->update($updateData);
            
            return response()->json([
                'success' => true,
                'message' => 'Usuario actualizado exitosamente',
                'user' => $user
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el usuario: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            // No permitir eliminar al propio usuario
            if (auth()->id() == $user->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'No puedes eliminar tu propia cuenta'
                ], 403);
            }
            
            $userName = $user->name . ' ' . $user->first_last_name;
            $user->delete();
            
            return response()->json([
                'success' => true,
                'message' => "Usuario {$userName} eliminado exitosamente"
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el usuario: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Mostrar información de un usuario específico
     */
    public function show(User $user)
    {
        return response()->json([
            'success' => true,
            'user' => $user
        ]);
    }
    
    /**
     * Cambiar estado activo/inactivo de un usuario
     */
    public function toggleStatus(User $user)
    {
        try {
            $user->update(['active' => !$user->active]);
            
            return response()->json([
                'success' => true,
                'message' => 'Estado del usuario actualizado',
                'user' => $user
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al cambiar el estado: ' . $e->getMessage()
            ], 500);
        }
    }
}