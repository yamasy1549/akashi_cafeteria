{* category_name *}
<p class='form__item'>
  <label class='form__item--label' for='name'>カテゴリ名</label>
  <input class='form__item--input' id='name' name='name' type='text' value='{h($category.name)|default:""}'>
  {if isset($error['name'])}
    <span class='error'><i class='fas fa-exclamation-triangle'></i> {$error['name']}です<span>
  {/if}
</p>

{* category_id *}
{* ユーザに変更されると困るが、変更に必要な情報なのでhiddenにしておく *}
<p class='form__hidden-item'>
  <input class='form__item--input' name='category_id' type='text' value='{$category.category_id}'>
</p>

{* ボタン *}
<p class='form__item'>
  <input class='form__item--button' type='submit' value='{$button_name}'>
</p>
