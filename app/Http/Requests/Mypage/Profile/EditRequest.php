<?php

namespace App\Http\Requests\Mypage\Profile;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'avatar' =>[
                'file',
                //ファイルが画像（jpeg, png, bmp, gif, svg, webp）であるか検証
                'image',
            ],
            'name' => [
                'required',
                'string',
                'max:255',
            ],
        ];
    }
}
