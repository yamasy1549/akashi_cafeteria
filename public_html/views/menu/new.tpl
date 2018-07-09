{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' title='メニュー' action='追加'}

<form class='form' action='?controller=menu&action=create' method='post'>
  {include file='./_form.tpl' button_name='メニュー追加'}
</form>

{include file='../templates/footer.tpl'}
