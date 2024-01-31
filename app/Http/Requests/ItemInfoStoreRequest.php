<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemInfoStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'shop_name' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'item_name' => 'required',
            'amount_value' => 'required',
            'amount_unit' => 'required',
            'price' => 'required',
            'confirm_date' => 'required',
        ];
    }

    /**
     * バリデーションエラーのカスタム属性の取得
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'shop_name' => '店舗',
            'category_id' => '大分類',
            'subcategory_id' => '中分類',
            'item_name' => '商品名',
            'amount_value' => '内容量',
            'amount_unit' => '内容量(単位)',
            'price' => '価格',
            'confirm_date' => '確認日',
            'memo' => 'メモ',
        ];
    }
}
