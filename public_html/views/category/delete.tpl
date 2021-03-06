{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' title='カテゴリ' action='削除'}

<p class='form__question'>カテゴリ「{h($category.name)}」を削除しますか？</p>

<form class='form' action='?controller=category&action=destroy' method='post'>
  {* ユーザに変更されると困るが、変更に必要な情報なのでhiddenにしておく *}
  <p class='form__hidden-item'>
    <input class='form__item--input' name='category_id' type='text' value='{$category.category_id}'>
  </p>
  <p class='form__item'>
    <input class='form__item--button' type='submit' value='削除'>
  </p>
</form>

{include file='../templates/footer.tpl'}

