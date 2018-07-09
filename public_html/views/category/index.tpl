{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' title='カテゴリ' action='一覧'}

<ul class='table-list'>
  {foreach from=$categories item=category}
    <li class='table-list__item'>
      <a href='./?controller=category&action=edit&category_id={$category.category_id}'>
        <span class='table-list__item--name'>{h($category.name)}</span>
      </a>
      <a class='table-list__item--edit' href='./?controller=category&action=edit&category_id={$category.category_id}'><i class='fas fa-pencil-alt'></i></a>
      <a class='table-list__item--destroy' href='./?controller=category&action=delete&category_id={$category.category_id}'><i class='fas fa-trash-alt'></i></a>
    </li>
  {/foreach}
</ul>

<div class='new-button-wrapper'>
  <a class='new-button' href='./?controller=category&action=new'><i class='fas fa-plus'></i></a>
</div>

{include file='../templates/footer.tpl' button_action=$button_action}
