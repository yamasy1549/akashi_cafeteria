{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' title='評価' action='一覧'}

{foreach from=$evaluations item=_evaluations}
<h2 class='table-list__title'>{$_evaluations[0]['menu_name']}</h2>
<ul class='table-list'>
  {foreach from=$_evaluations item=evaluation}
    <li class='table-list__item'>
      <div class='table-list__item--stars'>
        {for $count=1 to $evaluation.data}
           <i class='table-list__item--star fas fa-star'></i>
         {/for}
        {for $count=1 to (5 - $evaluation.data)}
           <i class='table-list__item--star far fa-star'></i>
        {/for}
      </div>
      <span class='table-list__item--name'>{$evaluation.email}</span>
      <a class='table-list__item--edit' href='./?controller=evaluation&action=edit&evaluation_id={$evaluation.evaluation_id}'><i class='fas fa-pencil-alt'></i></a>
      <a class='table-list__item--destroy' href='./?controller=evaluation&action=delete&evaluation_id={$evaluation.evaluation_id}'><i class='fas fa-trash-alt'></i></a>
    </li>
  {/foreach}
  </ul>
{/foreach}

{include file='../templates/footer.tpl' button_action=$button_action}
