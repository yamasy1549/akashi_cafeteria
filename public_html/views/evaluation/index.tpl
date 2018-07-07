{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' icon='tag' title='評価一覧' action='管理'}

<ul class='evaluation-list'>
  {foreach from=$evaluations item=evaluation}
    <li class='evaluation-list__item'>
      <span class='evaluation-list__item--name'>{$evaluation.menu_name}</span>
      <span class='evaluation-list__item--name'>{$evaluation.data}</span>
      <span class='evaluation-list__item--name'>{$evaluation.email}</span>
      <a class='evaluation-list__item--edit' href='./?controller=evaluation&action=edit&evaluation_id={$evaluation.evaluation_id}'><i class='fas fa-pencil-alt'></i></a>
      <a class='evaluation-list__item--destroy' href='./?controller=evaluation&action=delete&evaluation_id={$evaluation.evaluation_id}'><i class='fas fa-trash-alt'></i></a>
    </li>
  {/foreach}
</ul>

{include file='../templates/footer.tpl' button_action=$button_action}
