{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' icon='tag' title='日毎メニュー管理' action='編集'}

<form class='form' action='?controller=daymenu&action=update&daymenu_id={$daymenu.daymenu_id}' method='post'>
  <p class='form__item'>
    <label class='form__item--label' for='name'>カテゴリ名</label>
    <input class='form__item--input' id='name' name='name' type='text' value='{$daymenu.name}'>
  </p>
  {* ユーザに変更されると困るが、変更に必要な情報なのでhiddenにしておく *}
  <p class='form__hidden-item'>
    <input class='form__item--input' name='daymenu_id' type='text' value='{$daymenu.daymenu_id}'>
  </p>
  <p class='form__item'>
    <input class='form__item--button' type='submit' value='日毎メニュー更新'>
  </p>
</form>

{include file='../templates/footer.tpl'}
