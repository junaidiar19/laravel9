<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->book) {
            $kode = "required|unique:books,kode,{$this->book->id}";
        } else {
            $kode = "required|unique:books,kode";
        }

        return [
            'kode' => $kode,
            'title' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            // 'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|numeric',
            'published' => 'boolean',
        ];
    }

    public function attributes()
    {
        return [
            'Kode' => 'Kode',
            'title' => 'Judul',
            'qty' => 'Jumlah',
            'price' => 'Harga',
            'category_id' => 'Kategori',
        ];
    }
}
