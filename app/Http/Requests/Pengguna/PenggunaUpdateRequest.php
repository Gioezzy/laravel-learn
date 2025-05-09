<?php

namespace App\Http\Requests\Pengguna;

use Illuminate\Foundation\Http\FormRequest;

class PenggunaUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'nullable|string|max:15',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Nama pengguna harus diisi',
            // 'email.required' => 'Email pengguna harus diisi',
            // 'email.email' => 'Format email tidak valid',
            // 'email.unique' => 'Email sudah terdaftar',
            // 'password.min' => 'Password minimal 8 karakter',
            // 'password.confirmed' => 'Konfirmasi password tidak cocok',
            'phone.digits_between' => 'Nomor telepon harus terdiri dari 11 hingga 13 digit',
        ];
    }
}
