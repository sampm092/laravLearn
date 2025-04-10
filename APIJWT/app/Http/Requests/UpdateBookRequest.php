<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookRequest extends FormRequest
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
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                'cover' => ['required'],
                'title' => ['required'], //jika bukan i atau b maka request akan ditolak
                'author' => ['required'],
                'genre' => ['required', Rule::in(['F','NF','f','nf'])],
                'description' => ['required'],
            ];
        } else {
            return [
                'cover' => ['sometimes', 'required'],
                'title' => ['sometimes', 'required'], //jika bukan i atau b maka request akan ditolak
                'author' => ['sometimes', 'required'],
                'genre' => ['sometimes', 'required',Rule::in(['F','NF','f','nf'])],
                'description' => ['sometimes', 'required'],
            ];
        }
    }
}
