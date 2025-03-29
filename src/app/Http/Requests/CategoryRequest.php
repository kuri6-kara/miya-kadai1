<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'content' => ['required', 'in:商品のお届けについて, 商品の交換について, 商品トラブル, ショップへのお問い合わせ, その他'],
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'お問い合わせの種類を選択してください' ,
        ];
    }
}
