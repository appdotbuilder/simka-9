<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUnitKerjaRequest extends FormRequest
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
            'kode' => 'required|string|max:10|unique:unit_kerjas,kode,' . $this->route('unit_kerja')->id,
            'nama_unit' => 'required|string|max:150',
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
            'kode.required' => 'Kode unit kerja harus diisi.',
            'kode.unique' => 'Kode unit kerja sudah digunakan.',
            'nama_unit.required' => 'Nama unit kerja harus diisi.',
            'urut.required' => 'Urutan harus diisi.',
            'urut.integer' => 'Urutan harus berupa angka.',
            'status.required' => 'Status harus dipilih.',
            'status.in' => 'Status tidak valid.',
        ];
    }
}