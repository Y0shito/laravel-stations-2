<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMovieRequest extends FormRequest
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
            'title' => ['required', 'unique:movies,title', 'string'],
            'genre' => ['required', 'string'],
            'image_url' => ['required', 'url', 'max:2000'],
            'published_year' => ['required', 'numeric', 'gte:1895'],
            'is_showing' => ['required', 'boolean'],
            'description' => ['required', 'string', 'max:100'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルを入力してください',
            'title.unique' => 'このタイトルの映画はすでに登録されています',
            'genre.required' => 'ジャンルを入力してください',
            'genre.string' => 'ジャンルを文字で入力してください',
            'image_url.required' => 'URLを入力してください',
            'image_url.url' => '有効なURLで入力してください',
            'published_year.required' => '公開年を入力してください',
            'published_year.numeric' => '公開年を数字で入力してください',
            'published_year.gte' => '公開年を1895以降で入力してください',
            'description.required' => '概要を入力してください',
            'description.max' => '概要は100文字以内で入力してください',
        ];
    }
}
