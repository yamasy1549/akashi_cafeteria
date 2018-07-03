{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' icon='tag' title='評価管理' action='追加'}

<form class='form' action='?controller=evaluation&action=create' method='post'>
  <p class='form__item'>
    <label class='form__item--label' for='name'>評価するメニュー名</label>
    <input class='form__item--input' id='name' name='name' type='text'>
  </p>
  <p class='form__item'>
    <input class='form__item--button' type='submit' value='評価追加'>
  </p>
</form>

{include file='../templates/footer.tpl'}
