<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgamaRequest extends FormRequest
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
            'kode' => 'required|string|max:10|unique:agamas,kode',
            'nama_agama' => 'required|string|max:100',
            'urut' => 'required|integer|min:0',
            'status' => 'required|in:aktif,nonaktif',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'kode.required' => 'Kode agama harus diisi.',
            'kode.unique' => 'Kode agama sudah digunakan.',
            'nama_agama.required' => 'Nama agama harus diisi.',
            'urut.required' => 'Urutan harus diisi.',
            'urut.integer' => 'Urutan harus berupa angka.',
            'status.required' => 'Status harus dipilih.',
            'status.in' => 'Status tidak valid.',
        ];
    }
}