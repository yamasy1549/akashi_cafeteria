{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' icon='tag' title='日毎メニュー一覧' action='管理'}

<ul class='daymenu-list'>
  {foreach from=$daymenus item=daymenu}
    <li class='daymenu-list__item'>
      <span class='daymenu-list__item--name'>{$daymenu.name}</span>
      <a class='daymenu-list__item--edit' href='./?controller=daymenu&action=edit&daymenu_id={$daymenu.daymenu_id}'><i class='fas fa-pencil-alt'></i></a>
      <a class='daymenu-list__item--destroy' href='./?controller=daymenu&action=delete&daymenu_id={$daymenu.daymenu_id}'><i class='fas fa-trash-alt'></i></a>
    </li>
  {/foreach}
</ul>

{include file='../templates/footer.tpl' button_action=$button_action}
