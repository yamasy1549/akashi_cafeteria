{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' icon='tag' title='カテゴリ一覧'}

<ul class='category-list'>
  {foreach from=$categories item=category}
    <li class='category-list__item'>
      <span class='category-list__item--name'>{$category.name}</span>
      <a class='category-list__item--edit' href='./?controller=category&action=edit'><i class='fas fa-pencil-alt'></i></a>
      <a class='category-list__item--destroy' href='./?controller=category&action=destroy'><i class='fas fa-trash-alt'></i></a>
    </li>
  {/foreach}
</ul>

{include file='../templates/footer.tpl'}
