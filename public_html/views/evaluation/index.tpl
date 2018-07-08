{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' title='評価' action='一覧'}

{foreach from=$evaluations item=_evaluations}
<a href='./?controller=menu&action=edit&menu_id={$_evaluations[0].menu_id}'>
  <h2 class='table-list__title'>{$_evaluations[0].menu_name}</h2>
</a>
<ul class='table-list'>
  {foreach from=$_evaluations item=evaluation}
    <li class='table-list__item'>
      <a href='./?controller=evaluation&action=edit&evaluation_id={$evaluation.evaluation_id}'>
        <div class='table-list__item--stars'>
          {for $count=1 to $evaluation.data}
             <i class='table-list__item--star fas fa-star'></i>
           {/for}
          {for $count=1 to (5 - $evaluation.data)}
             <i class='table-list__item--star far fa-star'></i>
          {/for}
        </div>
      </a>
      <a href='./?controller=user&action=edit&user_id={$evaluation.user_id}'>
        <span class='table-list__item--name'>{$evaluation.email}</span>
      </a>
      <a class='table-list__item--edit' href='./?controller=evaluation&action=edit&evaluation_id={$evaluation.evaluation_id}'><i class='fas fa-pencil-alt'></i></a>
      <a class='table-list__item--destroy' href='./?controller=evaluation&action=delete&evaluation_id={$evaluation.evaluation_id}'><i class='fas fa-trash-alt'></i></a>
    </li>
  {/foreach}
  </ul>
{/foreach}

<div class='new-button-wrapper'>
  <a class='new-button' href='./?controller=evaluation&action=new'><i class='fas fa-plus'></i></a>
</div>

{include file='../templates/footer.tpl' button_action=$button_action}
