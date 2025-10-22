<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta petición
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación
     */
    public function rules(): array
    {
        return [
            'correo' => ['required', 'email', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Mensajes de validación personalizados
     */
    public function messages(): array
    {
        return [
            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'Debe ser un correo electrónico válido.',
            'password.required' => 'La contraseña es obligatoria.',
        ];
    }

    /**
     * Intenta autenticar al usuario
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $credentials = [
            'correo' => $this->input('correo'),
            'password' => $this->input('password'),
            'active' => 1, // Solo usuarios activos
        ];

        if (!Auth::attempt($credentials, $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'correo' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Asegura que no haya muchos intentos fallidos
     */
    public function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'correo' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Clave única para rate limiting
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('correo')) . '|' . $this->ip());
    }
}