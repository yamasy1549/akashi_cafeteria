{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' title='メニュー一覧' action='管理'}

<ul class='menu-list'>
  {foreach from=$menus item=menu}
    <li class='menu-list__item'>
      <span class='menu-list__item--name'>{$menu.name}</span>
      <a class='menu-list__item--edit' href='./?controller=menu&action=edit'><i class='fas fa-pencil-alt'></i></a>
      <a class='menu-list__item--destroy' href='./?controller=menu&action=destroy'><i class='fas fa-trash-alt'></i></a>
    </li>
  {/foreach}
</ul>

{include file='../templates/footer.tpl'}
