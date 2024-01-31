<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnconfirmedItem extends Model
{
    use HasFactory;

    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'unconfirmed_item';

    /**
     * 代入不可能な属性
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];
}
