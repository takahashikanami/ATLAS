<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
     *
     */
    public function getValidatorInstance()
        {
            $old_year = $this->input('old_year');
            $old_month = $this->input('old_month');
            $old_day = $this->input('old_day');
            $datetime = $old_year. '-' . $old_month . '-' . $old_day;
            // rules()に渡す値を追加でセット
            //     これで、この場で作った変数にもバリデーションを設定できるようになる
            $this->merge([
            'datetime' => $datetime,
           ]);

            return parent::getValidatorInstance();
        }

    public function rules()
    {
        return [
            'over_name' => 'required|string|max:10',
            'under_name' => 'required|string|max:10',
            'over_name_kana' => 'required|string|max:30|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'under_name_kana' => 'required|string|max:30|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'mail_address' => 'required|string|email|max:100|unique:users',
            'sex' => 'required|in: 1,2,3',
            'role' =>'required|in: 1,2,3,4',
            'old_year' => 'required',
            'old_month' => 'required',
            'old_day' => 'required',
            'password' => 'required|min:8|max:30|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'over_name.required' => '必須項目です。',
            'over_name.string' => '使用できない文字が使われています。',
            'over_name.max' => '最大10文字です。',
            'under_name.required' => '必須項目です。',
            'under_name.string' => '使用できない文字が使われています。',
            'under_name.max' => '最大10文字です。',
            'over_name_kana.required' => '必須項目です。',
            'over_name_kana.string' => '使用できない文字が使われています。',
            'over_name_kana.max' => '最大10文字です。',
            'over_name_kana.katakana' => 'カタカナで入力してください。',
            'under_name_kana.required' => '必須項目です。',
            'under_name_kana.string' => '使用できない文字が使われています。',
            'under_name_kana.katakana' => 'カタカナで入力してください。',
            'under_name_kana.max' => '最大10文字です。',
            'mail_address.required' => '必須項目です。',
            'mail_address.email' => 'メール形式で入力してください。',
            'mail_address.unique' => 'このメールアドレスは使えません。',
            'mail_address.max' => '最大100文字です。',
            'password.required' => '必須項目です。',
            'password.min' => '8文字以上で入力してください。',
            'password.max' => '最大30文字です。',
            'password.confirmed' => 'パスワードが一致しません。',
        ];
    }
}
