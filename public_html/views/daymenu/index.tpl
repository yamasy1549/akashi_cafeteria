{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' icon='tag' title='日毎メニュー一覧'}

<ul class='daymenu-list'>
  {foreach from=$daymenmus item=daymenu}
    <li class='daymenu-list__item'>
      <span class='daymenu-list__item--name'>{$daymenu.name}</span>
      <a class='daymenu-list__item--edit' href='./?controller=daymenu&action=edit'><i class='fas fa-pencil-alt'></i></a>
      <a class='daymenu-list__item--destroy' href='./?controller=daymenu&action=destroy'><i class='fas fa-trash-alt'></i></a>
    </li>
  {/foreach}
</ul>

{include file='../templates/footer.tpl'}
