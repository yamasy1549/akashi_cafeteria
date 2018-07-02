{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' icon='calendar' title='メニュー一覧'}

<ul>
  {foreach from=$menus item=menu}
    <li>{$menu.category}, {$menu.name}, {$menu.price}, {$menu.image}</li>
  {/foreach}
</ul>

{include file='../templates/footer.tpl'}
