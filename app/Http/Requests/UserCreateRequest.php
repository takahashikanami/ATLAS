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
            //新規登録バリデーション
            'over_name' => 'required|string|max:10',
            'under_name' => 'required|string|max:10',
            'over_name_kana' => 'required|string|max:30|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'under_name_kana' => 'required|string|max:30|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'mail_address' => 'required|string|email|max:100|unique:users',
            'sex' => 'required|in: 1,2,3',
            'role' =>'required|in: 1,2,3,4',
            'datetime' => 'date|before:today|after:19991231',// 正しい日付かどうかをチェック
            'old_year' => 'required_with:old_month,old_day',
            'old_month' => 'required_with:old_year,old_day',
            'old_day' => 'required_with:old_year,old_month',
            'password' => 'required|string|min:8|max:30|confirmed',
            'password_confirmation'=> 'required|string|min:8|max:30',

        ];
    }
    public function messages(){
        return [
            'over_name.required' => '入力必須です。',
            'over_name.max' => '10文字以下で入力してください。',
            'under_name.required' => '入力必須です。',
            'over_name.max' => '10文字以下で入力してください。',
            'over_name_kana.required' => '入力必須です。',
            'over_name_kana.max' => '30文字以下で入力してください。',
            'over_name_kana.regex' => 'カナを入力してください。',
            'under_name_kana.required' => '入力必須です。',
            'under_name_kana.max' => '30文字以下で入力してください。',
            'under_name_kana.regex' => 'カナを入力してください。',
            'mail_address.required' => '入力必須です。',
            'sex.required' => '入力必須です。',
            'sex.in' => '選択してください。',
            'role.required' =>'入力必須です。',
            'role.in' =>'選択してください。',
            'datetime.required' =>'入力必須です。',
            'datetime.before' =>'正しい日付を入力してください。',
            'datetime.after' =>'正しい日付を入力してください。',
            'password.required' => '入力必須です。',
            'password.min' => '8文字以上で入力してください。',
            'password.max' => '10文字以下で入力してください。',
            'password.confirmed' => '入力必須です。',
            'password_confirmation.required' => '入力必須です。',
        ];
    }
}
