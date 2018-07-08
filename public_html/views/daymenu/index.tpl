{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' title='日毎メニュー' action='一覧'}

{foreach from=$daymenus item=_daymenus}
  {$date = $_daymenus[0]['date']}
  <h2 class='menu-list__title' id='{$date}'>
    <a class='menu-list__title--link' href='#{$date}'>
      <i class='menu-list__title--mark fas fa-link'></i>{$date}
    </a>
  </h2>
  <ul class='menu-list'>
    {foreach from=$_daymenus item=daymenu}
      {if $daymenu.sale eq 0}
        {* 売り切れの場合はグレースケールにする *}
        <li class='menu-list__item menu-list__item--sale'>
      {else}
        <li class='menu-list__item'>
      {/if}
        <div class='menu-list__item--imgarea'>
          <a href='./?controller=daymenu&action=edit&daymenu_id={$daymenu.daymenu_id}'>
            <img class='menu-list__item--img' src='{$daymenu.image|default:"../images/noimage.png"}' />
            <a class='menu-list__item--edit' href='./?controller=daymenu&action=edit&daymenu_id={$daymenu.daymenu_id}'><i class='fas fa-pencil-alt'></i></a>
            <a class='menu-list__item--destroy' href='./?controller=daymenu&action=delete&daymenu_id={$daymenu.daymenu_id}'><i class='fas fa-trash-alt'></i></a>
          </a>
        </div>
        <div class='menu-list__item--info'>
          <a href='./?controller=menu&action=edit&menu_id={$daymenu.menu_id}'>
            <div class='menu-list__item--category-name'>{$daymenu.category_name}</div>
            <div class='menu-list__item--name'>{$daymenu.menu_name}</div>
            <div class='menu-list__item--price'>¥{$daymenu.price}</div>
          </a>
        </div>
      </li>
    {/foreach}
  </ul>
{/foreach}

<div class='new-button-wrapper'>
  <a class='new-button' href='./?controller=daymenu&action=new'><i class='fas fa-plus'></i></a>
</div>

{include file='../templates/footer.tpl' button_action=$button_action}
