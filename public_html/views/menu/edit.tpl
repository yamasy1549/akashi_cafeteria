{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' title='メニュー' action='編集'}

<form class='form' action='?controller=menu&action=update&menu_id={$menu.menu_id}' method='post'>
  {include file='./_form.tpl' button_name='メニュー更新'}
</form>

{include file='../templates/footer.tpl'}
