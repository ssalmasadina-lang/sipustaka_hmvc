<?php

namespace Modules\Buku\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BukuRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'judul' => ['required', 'string', 'max:255'],
            'penulis' => ['required', 'string', 'max:255'],
            'penerbit' => ['required', 'string', 'max:255'],
            'tahun_terbit' => ['required', 'integer', 'min:1900', 'max:'.date('Y')],
            'stok' => ['required', 'integer', 'min:0', 'max:9999'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'tahun_terbit.min' => 'Tahun terbit minimal 1900.',
            'tahun_terbit.max' => 'Tahun terbit tidak boleh lebih dari tahun ini.',
            'stok.min' => 'Stok tidak boleh negatif.',
        ];
    }

    /**
     * Only admins may create or change books (second layer behind the route middleware).
     */
    public function authorize(): bool
    {
        return $this->user()?->isAdmin() ?? false;
    }
}
