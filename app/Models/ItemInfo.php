<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemInfo extends Model
{
    use HasFactory;

    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'item_info';

    /**
     * 代入不可能な属性
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * キャストする必要のある属性
     *
     * @var array
     */
    protected $casts = [
        'confirm_date' => 'datetime',
    ];

    /**
     * 商品情報一覧データの取得
     *
     * @param string $user_id
     * @param string|null $search_item_name
     * @param string|null $search_shop_name
     * @param string|null $search_category_id
     * @param string|null $search_subcategory_id
     * @return ItemInfo
     */
    public function getList(
        $user_id,
        $search_item_name,
        $search_shop_name,
        $search_category_id,
        $search_subcategory_id,
    ) {
        $query = $this->select(
            'item_info.id as id',
            'item_info.shop_name as shop_name',
            'item_info.item_name as item_name',
            'item_info.amount_value as amount_value',
            'item_info.amount_unit as amount_unit',
            'item_info.price as price',
            'item_info.confirm_date as confirm_date',
            'item_info.memo as memo',
            'category.name as category_name',
            'subcategory.name as subcategory_name',
        )
        ->join('users', 'item_info.user_id', '=', 'users.id')
        ->leftjoin('category', 'item_info.category_id', '=', 'category.id')
        ->leftjoin('subcategory', 'item_info.subcategory_id', '=', 'subcategory.id')
        ->where('item_info.delete_flag', 0)
        ->where('item_info.user_id', $user_id);

        // 検索条件
        // 商品名
        if (!empty($search_item_name)) {
            $query->where('item_info.item_name', 'like', $search_item_name);
        }
        // 店舗
        if (!empty($search_shop_name)) {
            $query->where('item_info.shop_name', 'like', $search_shop_name);
        }
        // 大分類
        if (!empty($search_category_id)) {
            $query->where('item_info.category_id', $search_category_id);
        }
        // 中分類
        if (!empty($search_subcategory_id)) {
            $query->where('item_info.subcategory_id', $search_subcategory_id);
        }

        $query = $query->orderBy('id', 'desc')->paginate(20);

        return $query;
    }

    /**
     * 商品情報の新規登録
     *
     * @param string $user_id
     * @param ItemInfoStoreRequest $request
     * @return void
     */
    public function insert($user_id, $request)
    {
        return $this->create([
            'user_id' => $user_id,
            'shop_name' => $request->shop_name,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'item_name' => $request->item_name,
            'amount_value' => $request->amount_value,
            'amount_unit' => $request->amount_unit,
            'price' => $request->price,
            'confirm_date' => $request->confirm_date,
            'memo' => $request->memo,
            'created_at' => now()
        ]);
    }

}
