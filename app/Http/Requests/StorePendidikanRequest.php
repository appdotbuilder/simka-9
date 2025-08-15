<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePendidikanRequest extends FormRequest
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
            'kode' => 'required|string|max:10|unique:pendidikans,kode',
            'nama_pendidikan' => 'required|string|max:100',
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
            'kode.required' => 'Kode pendidikan harus diisi.',
            'kode.unique' => 'Kode pendidikan sudah digunakan.',
            'nama_pendidikan.required' => 'Nama pendidikan harus diisi.',
            'urut.required' => 'Urutan harus diisi.',
            'urut.integer' => 'Urutan harus berupa angka.',
            'status.required' => 'Status harus dipilih.',
            'status.in' => 'Status tidak valid.',
        ];
    }
}