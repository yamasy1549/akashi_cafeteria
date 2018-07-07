{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' title='日毎メニュー' action='追加'}

<form class='form' action='?controller=daymenu&action=create' method='post'>
  {include file='./_form.tpl' daymenu=$daymenu}
</form>

{include file='../templates/footer.tpl'}
