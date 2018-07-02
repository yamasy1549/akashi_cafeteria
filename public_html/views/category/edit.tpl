{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' icon='tag' title='カテゴリ管理' action='編集'}

<form class='form' action='?controller=category&action=edit&category_id={$category.category_id}' method='post'>
  <p class='form__item'>
    <label class='form__item--label' for='category_name'>カテゴリ名</label>
    <input class='form__item--input' id='category_name' name='category_name' type='text' value='{$category.name}'>
  </p>
  <p class='form__item'>
    <input class='form__item--button' type='submit' value='カテゴリ更新'>
  </p>
</form>

{include file='../templates/footer.tpl'}
