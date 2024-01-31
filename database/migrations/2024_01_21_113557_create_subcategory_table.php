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
        Schema::create('subcategory', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->foreignId('category_id')->comment('大分類ID')
                ->constrained('category')->cascadeOnDelete();
            $table->string('name', 32)->comment('中分類名');
            $table->boolean('delete_flag')->default(0)->comment('削除フラグ');
            $table->dateTime('created_at')->comment('作成日時');
            $table->dateTime('updated_at')->nullable()->comment('更新日時');
            $table->dateTime('deleted_at')->nullable()->comment('削除日時');

            // テーブル論理名
            $table->comment('中分類');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 外部キー制約削除
        Schema::table('subcategory', function (Blueprint $table) {
            $table->dropForeign('subcategory_category_id_foreign');
        });
        // テーブル削除
        Schema::dropIfExists('subcategory');
    }
};
