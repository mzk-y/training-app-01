<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemInfoStoreRequest;
use App\Models\Category;
use App\Models\ItemInfo;
use App\Models\SubCategory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDOException;

class ItemInfoController extends Controller
{
    private $item_info;
    private $category;
    private $subcategory;

    public function __construct(
        ItemInfo $item_info,
        Category $category,
        SubCategory $subcategory
    ) {
        $this->item_info = $item_info;
        $this->category = $category;
        $this->subcategory = $subcategory;
    }

    // 一覧画面表示
    public function index(Request $request)
    {
        // ログインユーザのIDを取得する
        $user_id = Auth::user()->id;

        // 検索条件を取得する        
        $search_item_name = $request->input('item_name');
        $search_shop_name = $request->input('shop_name');
        $search_category_id = $request->input('category_id');
        $search_subcategory_id = $request->input('subcategory_id');
        session()->put('item_name', $search_item_name);
        session()->put('shop_name', $search_shop_name);
        session()->put('category_id', $search_category_id);
        session()->put('subcategory_id', $search_subcategory_id);

        $reset_flag = $request->input('reset_flag') == 1 ? true : false;
        if ($reset_flag) {
            // リセットボタン押下時はセッションの検索条件を削除する
            session()->forget('item_name');
            session()->forget('shop_name');
            session()->forget('category_id');
            session()->forget('subcategory_id');
        }

        //  商品一覧情報を取得する
        $item_info_list = $this->item_info->getList(
            $user_id,
            $search_item_name,
            $search_shop_name,
            $search_category_id,
            $search_subcategory_id
        );
        // 取得した商品一覧情報を加工する
        // 容量あたりの金額(金額/内容量)を算出し、取得した情報に追加する
        foreach ($item_info_list as $item_info) {
            $amount = $item_info->amount_value.$item_info->amount_unit;
            $item_info->amount = $amount;

            $amount_per_amount = $item_info->price / $item_info->amount_value;
            $item_info->amount_per_amount = $amount_per_amount;
        }

        // 大分類/中分類セレクトボックス用のデータを取得する
        $category_list = $this->category->getListForSelectBox();
        $subcategory_list = $this->subcategory->getListForSelectBox();
        $category_list->prepend('―', '');
        $subcategory_list->prepend('―', '');

        // 取得した情報をviewに渡す
        return view(
            'item_info.index',
            compact(
                'item_info_list',
                'category_list',
                'subcategory_list'
            )
        );

    }

    // 登録画面表示
    public function createForm(Request $request)
    {
        // ログインユーザのIDを取得する
        $user_id = Auth::user()->id;

        // 大分類/中分類セレクトボックス用のデータを取得する
        $category_list = $this->category->getListForSelectBox();
        $subcategory_list = $this->subcategory->getListForSelectBox();
        $category_list->prepend('選択してください', '');
        $subcategory_list->prepend('選択してください', '');

        // TODO: 確認したい商品ページの「登録」ボタンから遷移した場合
        // 大分類/中分類/商品名を取得し、viewに渡す
        return view(
            'item_info.create',
            compact(
                'category_list',
                'subcategory_list'
            )
        );

    }

    // 登録処理
    public function store(ItemInfoStoreRequest $request)
    {
        // ログインユーザのIDを取得する
        $user_id = Auth::user()->id;

        try {
            // 登録処理
            $this->item_info->insert($user_id, $request);

        } catch (PDOException | QueryException $e) {
            logger()->info($e);

            // 登録失敗時、自画面に遷移し失敗メッセージを表示する
            return redirect()->route('itemInfoCreate')
            ->with('error', '商品情報の登録に失敗しました');
        }

        // 登録成功時、一覧画面に遷移し成功メッセージを表示する
        return redirect()->route('itemInfoIndex')
        ->with('success', '商品情報の登録に成功しました');

    }
}
