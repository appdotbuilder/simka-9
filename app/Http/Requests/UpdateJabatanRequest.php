<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJabatanRequest extends FormRequest
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
            'kode' => 'required|string|max:10|unique:jabatans,kode,' . $this->route('jabatan')->id,
            'kode_unit_kerja' => 'required|string|max:10|exists:unit_kerjas,kode',
            'nama_jabatan' => 'required|string|max:150',
            'status' => 'required|in:aktif,nonaktif',
            'urut' => 'required|integer|min:0',
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
            'kode.required' => 'Kode jabatan harus diisi.',
            'kode.unique' => 'Kode jabatan sudah digunakan.',
            'kode_unit_kerja.required' => 'Unit kerja harus dipilih.',
            'kode_unit_kerja.exists' => 'Unit kerja tidak valid.',
            'nama_jabatan.required' => 'Nama jabatan harus diisi.',
            'status.required' => 'Status harus dipilih.',
            'status.in' => 'Status tidak valid.',
            'urut.required' => 'Urutan harus diisi.',
            'urut.integer' => 'Urutan harus berupa angka.',
        ];
    }
}