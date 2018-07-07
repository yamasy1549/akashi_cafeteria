{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' title='日毎メニュー' action='一覧'}

{foreach from=$daymenus item=_day_menus}
  <h2 class='menu-list__date'>{$_day_menus[0]['date']}</h2>
  <ul class='menu-list'>
    {foreach from=$_day_menus item=daymenu}
      <li class='menu-list__item'>
        <div class='menu-list__item--imgarea'>
          <img class='menu-list__item--img' src='{$daymenu.image|default:"../images/noimage.png"}' />
          <a class='menu-list__item--edit' href='./?controller=daymenu&action=edit&daymenu_id={$daymenu.daymenu_id}'><i class='fas fa-pencil-alt'></i></a>
          <a class='menu-list__item--destroy' href='./?controller=daymenu&action=delete&daymenu_id={$daymenu.daymenu_id}'><i class='fas fa-trash-alt'></i></a>
        </div>
        <div class='menu-list__item--info'>
          <div class='menu-list__item--category-name'>{$daymenu.category_name}</div>
          <div class='menu-list__item--name'>{$daymenu.menu_name}</div>
          <div class='menu-list__item--price'>¥{$daymenu.price}</div>
        </div>
        {if $daymenu.sale eq 0}
          <div class='menu-list__item--sale'></div>
        {/if}
      </li>
    {/foreach}
  </ul>
{/foreach}

{include file='../templates/footer.tpl' button_action=$button_action}
