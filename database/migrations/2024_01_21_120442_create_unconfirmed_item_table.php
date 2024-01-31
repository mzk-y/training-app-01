<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unconfirmed_item', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->foreignId('category_id')->nullable()->comment('大分類ID')
                ->constrained('category')->cascadeOnDelete();
            $table->foreignId('subcategory_id')->nullable()->comment('中分類ID')
                ->constrained('subcategory')->cascadeOnDelete();
            $table->string('item_name', 128)->comment('商品名');
            $table->boolean('confirmed_flag')->default(0)->comment('確認済フラグ');
            $table->boolean('delete_flag')->default(0)->comment('削除フラグ');
            $table->dateTime('created_at')->comment('作成日時');
            $table->dateTime('updated_at')->nullable()->comment('更新日時');
            $table->dateTime('deleted_at')->nullable()->comment('削除日時');

            // テーブル論理名
            $table->comment('未確認商品');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 外部キー制約削除
        Schema::table('unconfirmed_item', function (Blueprint $table) {
            $table->dropForeign('unconfirmed_item_category_id_foreign');
            $table->dropForeign('unconfirmed_item_subcategory_id_foreign');
        });
        // テーブル削除
        Schema::dropIfExists('unconfirmed_item');
    }
};
