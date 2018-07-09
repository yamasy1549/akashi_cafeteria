{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' title='カテゴリ' action='編集'}

<form class='form' action='?controller=category&action=update&category_id={$category.category_id}' method='post'>
  {include file='./_form.tpl' button_name='カテゴリ更新'}
</form>

{include file='../templates/footer.tpl'}
