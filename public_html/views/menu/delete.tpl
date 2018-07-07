{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' title='メニュー' action='削除'}

<p>メニュー「{$menu.name}」を削除しますか？</p>

<form class='form' action='?controller=menu&action=destroy' method='post'>
  {* ユーザに変更されると困るが、変更に必要な情報なのでhiddenにしておく *}
  <p class='form__hidden-item'>
    <input class='form__item--input' name='menu_id' type='text' value='{$menu.menu_id}'>
  </p>
  <p class='form__item'>
    <input class='form__item--button' type='submit' value='削除'>
  </p>
</form>

{include file='../templates/footer.tpl'}
