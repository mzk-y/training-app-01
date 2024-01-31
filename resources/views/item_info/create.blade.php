<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品情報登録フォーム
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="text-sm text-red-600 bg-red-100 rounded-md">  
                @if ($errors->any())  
                    <ul class="p-4">  
                        @foreach ($errors->all() as $error)  
                            <li class="py-1">{{ $error }}</li>  
                        @endforeach  
                    </ul>  
                @endif  
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="post" action="{{ route('itemInfoStore') }}" id="create_form" class="space-y-6">
                        @csrf
                        <!-- TODO: バリデーションエラー時に枠色を赤くする -->
                        <div>
                            <x-input-label for="shop_name">店舗</x-input-label>
                            <x-text-input id="shop_name" name="shop_name" type="text" :value="old('shop_name')" class="mt-1 block w-full" />
                        </div>

                        <div>
                            <!-- TODO: セレクトボックスのcomponents作成 -->
                            <x-form-select label="大分類" name="category_id" :options="$category_list" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                        </div>

                        <div>
                            <!-- TODO: セレクトボックスのcomponents作成 -->
                            <x-form-select label="中分類" name="subcategory_id" :options="$subcategory_list" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                        </div>

                        <div>
                            <x-input-label for="item_name">商品名</x-input-label>
                            <x-text-input id="item_name" name="item_name" type="text" :value="old('item_name')" class="mt-1 block w-full" />
                        </div>

                        <div>
                            <x-input-label for="amount_value">内容量</x-input-label>
                            <div class="flex items-center">
                                <x-text-input id="amount_value" name="amount_value" type="text" :value="old('amount_value')" class="mt-1 block w-3/4" />
                                <!-- TODO: セレクトボックスのcomponents作成 -->
                                <x-form-select name="amount_unit" :options="['個' => '個, 'g' => 'g', 'ml'=> 'ml']" class="mt-1 block w-full ml-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                            </div>
                        </div>

                        <div>
                            <x-input-label for="price">価格</x-input-label>
                            <div class="flex items-end">
                                <x-text-input id="price" name="price" type="text" :value="old('price')" class="mt-1 block w-3/4" />
                                <span class='block w-1/4 ml-2 font-medium text-sm text-gray-700'>円</span>
                            </div>
                        </div>

                        <div>
                            <x-input-label for="confirm_date">確認日</x-input-label>
                            <x-text-input id="confirm_date" name="confirm_date" type="date" :value="old('confirm_date')" class="mt-1 block w-full" />
                        </div>

                        <div>
                            <!-- TODO: テキストエリアのcomponents作成 -->
                            <x-form-textarea label="メモ" name="memo" class="mb-6 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                        </div>
                    </form>
                    <form method="get" action="{{ route('itemInfoIndex') }}" id="button_back"></form>
                    <div class="flex items-center gap-4">
                        <x-primary-button form="create_form">登録</x-primary-button>
                        <x-secondary-button type="submit" form="button_back">戻る</x-secondary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>