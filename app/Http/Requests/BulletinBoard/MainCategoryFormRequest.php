<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Categories\MainCategory;

class MainCategoryFormRequest extends FormRequest
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
            'main_category' => 'required|unique:main_categories',
        ];
    }
    public function messages()
    {
        return [
            'main_category.required' => '必須項目です。',
            'main_category.unique' => 'このメインカテゴリは既に作成済みです。',
        ];
    }
}
