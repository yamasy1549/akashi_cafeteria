{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' title='評価' action='追加'}

<form class='form' action='?controller=evaluation&action=create' method='post'>
  {include file='./_form.tpl' button_name='評価追加'}
</form>

{include file='../templates/footer.tpl'}
