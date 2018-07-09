{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' title='メニュー' action='一覧'}

{foreach from=$menus item=_menus}
  <h2 class='menu-list__title'>{h($_menus[0]['category_name'])}({count($_menus)})</h2>
  <ul class='menu-list'>
    {foreach from=$_menus item=menu}
      <li class='menu-list__item'>
        <div class='menu-list__item--imgarea'>
          <a href='./?controller=menu&action=edit&menu_id={$menu.menu_id}'>
            <img class='menu-list__item--img' src='{h($menu.image)|default:"../images/noimage.png"}' />
            <a class='menu-list__item--edit' href='./?controller=menu&action=edit&menu_id={$menu.menu_id}'><i class='fas fa-pencil-alt'></i></a>
            <a class='menu-list__item--destroy' href='./?controller=menu&action=delete&menu_id={$menu.menu_id}'><i class='fas fa-trash-alt'></i></a>
          </a>
        </div>
        <div class='menu-list__item--info'>
          <a href='./?controller=menu&action=edit&menu_id={$menu.menu_id}'>
            <div class='menu-list__item--category-name'>{h($menu.category_name)}</div>
            <div class='menu-list__item--name'>{h($menu.name)}</div>
            <div class='menu-list__item--price'>¥{$menu.price}</div>
          </a>
        </div>
      </li>
    {/foreach}
  </ul>
{/foreach}

<div class='new-button-wrapper'>
  <a class='new-button' href='./?controller=menu&action=new'><i class='fas fa-plus'></i></a>
</div>

{include file='../templates/footer.tpl'}
