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
        Schema::create('item_info', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->foreignId('user_id')->comment('ユーザID')
                ->constrained('users')->cascadeOnDelete();
            $table->string('shop_name', 128)->comment('店舗');
            $table->foreignId('category_id')->nullable()->comment('大分類ID')
                ->constrained('category')->cascadeOnDelete();
            $table->foreignId('subcategory_id')->nullable()->comment('中分類ID')
                ->constrained('subcategory')->cascadeOnDelete();
            $table->string('item_name', 128)->comment('商品名');
            $table->unsignedInteger('amount_value')->nullable()->comment('内容量(値)');
            $table->string('amount_unit', 8)->nullable()->comment('内容量(単位)');
            $table->unsignedInteger('price')->comment('価格');
            $table->date('confirm_date')->comment('確認日');
            $table->string('memo', 256)->nullable()->comment('メモ');
            $table->boolean('delete_flag')->default(0)->comment('削除フラグ');
            $table->dateTime('created_at')->comment('作成日時');
            $table->dateTime('updated_at')->nullable()->comment('更新日時');
            $table->dateTime('deleted_at')->nullable()->comment('削除日時');

            // テーブル論理名
            $table->comment('商品情報');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 外部キー制約削除
        Schema::table('item_info', function (Blueprint $table) {
            $table->dropForeign('item_info_user_id_foreign');
            $table->dropForeign('item_info_category_id_foreign');
            $table->dropForeign('item_info_subcategory_id_foreign');
        });
        // テーブル削除
        Schema::dropIfExists('item_info');
    }
};
