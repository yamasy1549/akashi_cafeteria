{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' title='日毎メニュー' action='編集'}

<form class='form' action='?controller=daymenu&action=update&daymenu_id={$daymenu.daymenu_id}' method='post'>
  {include file='./_form.tpl' daymenu=$daymenu}
</form>

{include file='../templates/footer.tpl'}
