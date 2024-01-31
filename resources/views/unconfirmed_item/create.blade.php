<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('確認したい商品登録フォーム') }}
        </h2>
    </x-slot>

    <div class="container-fluid">
        <div class="mx-auto" style="max-width:1200px">
            <div class="">
                <div class="grid grid-cols-4 gap-4 flex-wrap">
                    <div class="">
                        <label class="">大分類</label>
                        <select class="">
                            @foreach ($category_list as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <label>中分類</label>
                        <select class="">
                            @foreach ($subcategory_list as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <label>商品名</label>
                        <input type="text" class="" id="item_name" />
                    </div>
                    <div>
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('登録する') }}</x-primary-button>
                        <x-secondary-button>{{ __('戻る') }}</x-secondary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
