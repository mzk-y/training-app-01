<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'subcategory';

    /**
     * 代入不可能な属性
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    public function getListForSelectBox()
    {
        return $this->where('delete_flag', 0)
        ->pluck('name', 'id');
    }
}
