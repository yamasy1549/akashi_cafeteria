{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' icon='tag' title='評価管理' action='編集'}

<form class='form' action='?controller=evaluation&action=update&evaluation_id={$evaluation.evaluation_id}' method='post'>
  <p class='form__item'>
    <label class='form__item--label' for='name'>評価するメニュー名</label>
    <input class='form__item--input' id='name' name='name' type='text' value='{$evaluation.name}'>
  </p>
  {* ユーザに変更されると困るが、変更に必要な情報なのでhiddenにしておく *}
  <p class='form__hidden-item'>
    <input class='form__item--input' name='evaluation_id' type='text' value='{$evaluation.evaluation_id}'>
  </p>
  <p class='form__item'>
    <input class='form__item--button' type='submit' value='評価更新'>
  </p>
</form>

{include file='../templates/footer.tpl'}
