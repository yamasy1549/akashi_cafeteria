{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' icon='tag' title='評価管理' action='編集'}

<form class='form' action='?controller=evaluation&action=update&evaluation_id={$evaluation.evaluation_id}' method='post'>
  {include file='./_form.tpl' evaluation=$evaluation}
</form>

{include file='../templates/footer.tpl'}
