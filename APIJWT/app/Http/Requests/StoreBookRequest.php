<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBookRequest extends FormRequest
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
        return [
            'cover' => ['required'],
            'title' => ['required'], //jika bukan i atau b maka request akan ditolak
            'author' => ['required'],
            'genre' => ['required', Rule::in(['F','NF','f','nf'])],
            'description' => ['required'],
        ];
    }
}
