<p class='form__item'>
  <label class='form__item--label' for='name'>カテゴリ名</label>
  <input class='form__item--input' id='name' name='name' type='text' value='{$category.name}'>
</p>
{* ユーザに変更されると困るが、変更に必要な情報なのでhiddenにしておく *}
<p class='form__hidden-item'>
  <input class='form__item--input' name='category_id' type='text' value='{$category.category_id}'>
</p>
<p class='form__item'>
  <input class='form__item--button' type='submit' value='カテゴリ更新'>
</p>
