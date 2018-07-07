{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' title='カテゴリ' action='追加'}

<form class='form' action='?controller=category&action=create' method='post'>
  {include file='./_form.tpl' category=$category}
</form>

{include file='../templates/footer.tpl'}
