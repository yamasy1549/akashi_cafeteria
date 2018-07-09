{* name *}
<p class='form__item'>
  <label class='form__item--label' for='name'>メニュー名</label>
  <input class='form__item--input' id='name' name='name' type='text' value='{h($menu.name)|default:""}'>
</p>

{* category_id *}
<p class='form__item'>
  <label class='form__item--label' for='category_id'>カテゴリ</label>
  <select class='form__item--select' id='category_id' name='category_id'>
    <option value=''>＜選択＞</option>
    {foreach from=$categories item=category}
      {if $category.category_id eq $menu.category_id}
        <option value='{$category.category_id}' selected>{h($category.name)}</option>
      {else}
        <option value='{$category.category_id}'>{h($category.name)}</option>
      {/if}
    {/foreach}
  </select>
</p>

{* price *}
<p class='form__item'>
  <label class='form__item--label' for='price'>価格</label>
  <input class='form__item--input' id='price' name='price' type='number' value='{$menu.price|default:300}'>
</p>

{* image *}
<p class='form__item'>
  <label class='form__item--label' for='image'>画像</label>
  <input class='form__item--input' id='image' name='image' type='text' value='{h($menu.image|default:"")}'>
</p>

{* menu_id *}
{* ユーザに変更されると困るが、変更に必要な情報なのでhiddenにしておく *}
<p class='form__hidden-item'>
  <input class='form__item--input' name='menu_id' type='text' value='{$menu.menu_id}'>
</p>

{* ボタン *}
<p class='form__item'>
  <input class='form__item--button' type='submit' value='{$button_name}'>
</p>
