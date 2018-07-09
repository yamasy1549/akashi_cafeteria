{* date *}
<p class='form__item'>
  <label class='form__item--label' for='date'>日付</label>
  <input class='form__item--input' id='date' name='date' type='date' value='{$daymenu.date|default:date("Y-m-d")}'>
</p>

{* menu_id *}
<p class='form__item'>
  <label class='form__item--label' for='menu_id'>メニュー</label>
  <select class='form__item--select' id='menu_id' name='menu_id'>
    <option value=''>＜選択＞</option>
    {foreach from=$menus item=menu}
      {if $menu.menu_id eq $daymenu.menu_id}
        <option value='{$menu.menu_id}' selected>{h($menu.name)}</option>
      {else}
        <option value='{$menu.menu_id}'>{h($menu.name)}</option>
      {/if}
    {/foreach}
  </select>
</p>

{* sale *}
<p class='form__item'>
  <label class='form__item--label'>売り切れ情報</label>
  <div class='form__item--radio'>
    <input id='sale1' type='radio' name='sale' value='1' {($daymenu.sale eq 1) ? 'checked' : ''}><label for='sale1'>販売中</label>
    <input id='sale0' type='radio' name='sale' value='0' {($daymenu.sale eq 1) ? '' : 'checked'}><label for='sale0'>売り切れ</label>
  </div>
</p>

{* daymenu_id *}
{* ユーザに変更されると困るが、変更に必要な情報なのでhiddenにしておく *}
<p class='form__hidden-item'>
  <input class='form__item--input' name='daymenu_id' type='text' value='{$daymenu.daymenu_id}'>
</p>

{* ボタン *}
<p class='form__item'>
  <input class='form__item--button' type='submit' value='日毎メニュー更新'>
</p>
