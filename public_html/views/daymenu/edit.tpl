{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' icon='tag' title='日毎メニュー管理' action='編集'}

<form class='form' action='?controller=daymenu&action=update&daymenu_id={$daymenu.daymenu_id}' method='post'>
  {include file='./_form.tpl' daymenu=$daymenu}
</form>

{include file='../templates/footer.tpl'}
