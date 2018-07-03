{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' icon='tag' title='カテゴリ管理' action='編集'}

<form class='form' action='?controller=menu&action=update&menu_id={$menu.menu_id}' method='post'>
  <p class='form__item'>
    <label class='form__item--label' for='name'>カテゴリ名</label>
    <input class='form__item--input' id='name' name='name' type='text' value='{$menu.name}'>
  </p>
  {* ユーザに変更されると困るが、変更に必要な情報なのでhiddenにしておく *}
  <p class='form__hidden-item'>
    <input class='form__item--input' name='menu_id' type='text' value='{$menu.menu_id}'>
  </p>
  <p class='form__item'>
    <input class='form__item--button' type='submit' value='カテゴリ更新'>
  </p>
</form>

{include file='../templates/footer.tpl'}
