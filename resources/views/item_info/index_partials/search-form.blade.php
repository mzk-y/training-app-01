<section>
    <form method="get" action="{{ route('itemInfoCreate') }}" class="space-y-2">
        <div class="flex items-center gap-4">
            <x-primary-button>登録</x-primary-button>
        </div>
    </form>

    <form method="get" action="{{ route('itemInfoIndex') }}" class="mt-6 space-y-6">
        <div>
            <x-input-label for="item_name">商品</x-input-label>
            <x-text-input id="item_name" name="item_name" type="text" :value="session()->get('item_name')" class="mt-1 block w-full"></x-text-input>
        </div>

        <div>
            <x-input-label for="shop_name">店舗</x-input-label>
            <x-text-input id="shop_name" name="shop_name" type="text" :value="session()->get('shop_name')" class="mt-1 block w-full"></x-text-input>
        </div>

        <div>
            <!-- TODO: 検索時の選択状態保持 -->
            <x-form-select label="大分類" name="category_id" :options="$category_list" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        </div>

        <div>
            <!-- TODO: 検索時の選択状態保持 -->
            <x-form-select label="中分類" name="subcategory_id" :options="$subcategory_list" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>検索</x-primary-button>
            <!-- TODO: リセットボタン押下で検索条件をリセット -->
            <x-secondary-button>リセット</x-secondary-button>
        </div>
    </form>
</section>