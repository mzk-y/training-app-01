<section>
    <div class="mb-2">
        検索結果：{{ $item_info_list->count() }} 件
    </div>
    <div>
        <table class="table-fixed w-full">
            <tr>
                <th class="w-1/12">
                    <x-danger-button>削除</x-danger-button>
                </th>
                <th class="w-1/12">店舗</th>
                <th class="w-1/12">大分類</th>
                <th class="w-1/12">中分類</th>
                <th class="w-1/12">商品名</th>
                <th class="w-1/12">内容量</th>
                <th class="w-1/12">価格</th>
                <th class="w-1/12">円/(単位)</th>
                <th class="w-1/12">確認日</th>
                <th class="w-2/12">メモ</th>
                <th class="w-1/12"></th>
            </tr>
            @foreach ($item_info_list as $item_info)
                <tr class="text-center">
                    <!-- TODO: 選択削除機能追加 -->
                    <td><x-form-checkbox name="delete_item_info" class="justify-center" /></td>
                    <td>{{ $item_info->shop_name }}</td>
                    <td>{{ $item_info->category_name }}</td>
                    <td>{{ $item_info->subcategory_name }}</td>
                    <td>{{ $item_info->item_name }}</td>
                    <td>{{ $item_info->amount }}</td>
                    <td>{{ $item_info->price }}円</td>
                    <td>{{ number_format($item_info->amount_per_amount, 2) }}円/{{ $item_info->amount_unit }}</td>
                    <td>{{ $item_info->confirm_date->format('y/m/d') }}</td>
                    <td>{{ $item_info->memo }}</td>
                    <!-- 内容量/価格/確認日/メモ更新機能追加 -->
                    <td><x-primary-button form="update_form">更新</x-primary-button></td>
                </tr>
            @endforeach
        </table>
    </div>
    {{ $item_info_list->links() }}
</section>