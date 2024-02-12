import $ from 'jquery';
window.$ = $;

$(function() {
    // リセットボタン押下時に検索条件を空にしてsubmit
    $('#btn_reset').on('click', function() {
        // 各検索欄の入力値を削除
        $('input[name="item_name"]').val("");
        $('input[name="shop_name"]').val("");
        $('[name="category_id"] option[value=""]').prop('selected', true);
        $('[name="subcategory_id"] option[value=""]').prop('selected', true);
        // リセットフラグに値をセット
        $('#reset_flag').val("1");
        $('#search_form').submit();
    })

    // TODO: 削除ボタン押下時にcheckedのチェックボックスを取得しsubmit

    // TODO: 更新ボタン押下時に一覧のinputのデータを取得しsubmit
})