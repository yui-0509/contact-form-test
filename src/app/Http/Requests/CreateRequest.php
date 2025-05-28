<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:男性,女性,その他'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'tel' => ['required', 'array', 'size:3'],
            'tel.0' => ['required', 'digits_between:1,5'],
            'tel.1' => ['required', 'digits_between:1,5'],
            'tel.2' => ['required', 'digits_between:1,5'],
            'address' => ['required', 'string', 'max:255'],
            'building' => ['nullable', 'string', 'max:255'],
            'inquiry_type' => ['required', 'in:商品のお届けについて,商品の交換について,商品トラブル,ショップへのお問い合わせ,その他'],
            'message' => ['required', 'string', 'max:120'],
        ];
    }

    public function messages() {
        return [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'tel.required' => '電話番号を入力してください',
            'address.required' => '住所を入力してください',
            'inquiry_type.required' => 'お問い合わせの種類を選択してください',
            'message.required' => 'お問い合わせ内容を入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tel.0.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel.1.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel.2.digits_between' => '電話番号は5桁までの数字で入力してください',
            'message.max' => 'お問合せ内容は120文字以内で入力してください'
        ];
    }
}
