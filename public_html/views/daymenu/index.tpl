{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' icon='tag' title='日毎メニュー一覧' action='管理'}

<ul class='menu-list'>
  {foreach from=$daymenus item=daymenu}
    <li class='menu-list__item'>
      <span class='menu-list__item--name'>{$daymenu.date}</span>
      <span class='menu-list__item--name'>{$daymenu.menu_name}</span>
      <span class='menu-list__item--name'>
        {if $daymenu.sale eq 1}
          販売中
        {else}
          売り切れ
        {/if}
      </span>
      <span class='menu-list__item--name'>¥{$daymenu.price}</span>
      <img class='menu-list__item--name' src='{$daymenu.image|default:"../images/noimage.png"}' />
      <span class='menu-list__item--name'>{$daymenu.category_name}</span>
      <a class='menu-list__item--edit' href='./?controller=daymenu&action=edit&daymenu_id={$daymenu.daymenu_id}'><i class='fas fa-pencil-alt'></i></a>
      <a class='menu-list__item--destroy' href='./?controller=daymenu&action=delete&daymenu_id={$daymenu.daymenu_id}'><i class='fas fa-trash-alt'></i></a>
    </li>
  {/foreach}
</ul>

{include file='../templates/footer.tpl' button_action=$button_action}
