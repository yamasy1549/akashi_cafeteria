{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' title='メニュー' action='一覧'}

<ul class='menu-list'>
  {foreach from=$menus item=menu}
    <li class='menu-list__item'>
      <span class='menu-list__item--name'>{$menu.name}</span>
      <span class='menu-list__item--name'>¥{$menu.price}</span>
      <img class='menu-list__item--name' src='{$menu.image|default:"../images/noimage.png"}' />
      <span class='menu-list__item--name'>{$menu.category_name}</span>
      <a class='menu-list__item--edit' href='./?controller=menu&action=edit&menu_id={$menu.menu_id}'><i class='fas fa-pencil-alt'></i></a>
      <a class='menu-list__item--destroy' href='./?controller=menu&action=delete&menu_id={$menu.menu_id}'><i class='fas fa-trash-alt'></i></a>
    </li>
  {/foreach}
</ul>

{include file='../templates/footer.tpl'}
