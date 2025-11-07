<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            
            $users = $query->paginate(10);
            
            return response()->json([
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
    
    // ... resto de métodos (store, update, destroy) se mantienen igual
}