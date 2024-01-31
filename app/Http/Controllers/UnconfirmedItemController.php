<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\UnconfirmedItem;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDOException;

class UnconfirmedItemController extends Controller
{
    private $unconfirmed_item;
    private $category;
    private $subcategory;

    public function __construct(
        UnconfirmedItem $unconfirmed_item,
        Category $category,
        SubCategory $subcategory
        ) {
        $this->unconfirmed_item = $unconfirmed_item;
        $this->category = $category;
        $this->subcategory = $subcategory;
    }

    // 一覧画面表示
    public function index(Request $request)
    {
        // ログインユーザのIDを取得する
        $user_id = Auth::user()->id;

        // TODO: 確認したい商品一覧情報を取得する

        // TODO: 取得した情報をviewに渡す
        return view('unconfirmed_item.index');
        // return view('unconfirmed_item.index', compact('item_info_list'));

    }

    // 登録画面表示
    public function createForm(Request $request)
    {
        // ログインユーザのIDを取得する
        $user_id = Auth::user()->id;

        // 大分類/中分類セレクトボックス用のデータを取得する
        $category_list = $this->category->getListForSelectBox();
        $subcategory_list = $this->subcategory->getListForSelectBox();

        // TODO: 取得した情報をviewに渡す
        return view(
            'unconfirmed_item.create',
            compact(
                'category_list',
                'subcategory_list'
            )
        );

    }

    // 登録処理
    public function store(Request $request)
    {
        // ログインユーザのIDを取得する
        $user_id = Auth::user()->id;

        try {
            // TODO: 登録処理

        } catch (PDOException | QueryException $e) {
            logger()->info($e);

            // 登録失敗時、自画面に遷移し失敗メッセージを表示する
            return redirect()->route('unconfirmedItemCreate')
            ->with('error', '確認したい商品情報の登録に失敗しました');
        }

        // 登録成功時、一覧画面に遷移し成功メッセージを表示する
        return redirect()->route('unconfirmedItemIndex')
        ->with('success', '確認したい商品情報の登録に成功しました');

    }
}
