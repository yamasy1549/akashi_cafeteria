<p class='form__item'>
  <label class='form__item--label' for='name'>日付</label>
  <input class='form__item--input' id='name' name='date' type='date' value='{$daymenu.date}'>
</p>
<p class='form__item'>
  <label class='form__item--label' for='name'>メニュー</label>
  <select class='form__item--select' id='name' name='menu_id'>
    {foreach from=$menus item=menu}
      {if $menu.menu_id eq $daymenu.menu_id}
        <option value='{$menu.menu_id}' selected>{$menu.name}</option>
      {else}
        <option value='{$menu.menu_id}'>{$menu.name}</option>
      {/if}
    {/foreach}
  </select>
</p>
{* TODO: <input type='radio'>タグで売り切れ情報選択 *}
{if $daymenu.sale eq 1}
  {$sale = 1}
{else}
  {$sale = 0}
{/if}
<p class='form__item'>
  <label class='form__item--label' for='name'>売り切れ情報</label>
  <input class='form__item--input' id='name' name='sale' type='text' value='{$sale}'>
</p>
{* ユーザに変更されると困るが、変更に必要な情報なのでhiddenにしておく *}
<p class='form__hidden-item'>
  <input class='form__item--input' name='daymenu_id' type='text' value='{$daymenu.daymenu_id}'>
</p>
<p class='form__item'>
  <input class='form__item--button' type='submit' value='日毎メニュー更新'>
</p>
