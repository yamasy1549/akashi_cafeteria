{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' title='カテゴリ一覧'}

<ul>
  {foreach from=$categories item=category}
  <li>{$category.name}</li>
  {/foreach}
</ul>

{include file='../templates/footer.tpl'}
