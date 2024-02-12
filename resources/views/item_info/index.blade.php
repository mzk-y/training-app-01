<x-app-layout>
    @section('script')
        @vite('resources/js/item_info.js')
    @endsection

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ "商品情報一覧" }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-6 space-y-6">
        @if (session('success'))
        <div class="p-4 text-sm text-green-600 bg-green-100 rounded-md">
            {{ session('success') }}
        </div> 
        @elseif (session('error'))
        <div class="p-4 text-sm text-red-600 bg-red-100 rounded-md">
            {{ session('error') }}
        </div>
        @endif
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('item_info.index_partials.search-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w">
                @include('item_info.index_partials.index-table')
                </div>
                <form id=update_form>
                    <input type="hidden" id="update_id" name="id" value="">
                    <input type="hidden" id="update_amount" name="amount" value="">
                    <input type="hidden" id="update_price" name="price" value="">
                    <input type="hidden" id="update_confirm_date" name="confirm_date" value="">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>