{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' icon='tag' title='メニュー管理' action='追加'}

<form class='form' action='?controller=menu&action=create&menu_id={$menu.menu_id}' method='post'>
  {include file='./_form.tpl' menu=$menu button_name='メニュー追加'}
</form>

{include file='../templates/footer.tpl'}
