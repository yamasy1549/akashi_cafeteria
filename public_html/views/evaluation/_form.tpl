<p class='form__item'>
  <label class='form__item--label' for='name'>評価（5段階）</label>
  <input class='form__item--input' id='name' name='data' type='text' value='{$evaluation.data}'>
</p>
<p class='form__item'>
  <label class='form__item--label' for='name'>評価するメニュー</label>
  <select class='form__item--select' id='name' name='menu_id'>
    {foreach from=$menus item=menu}
      {if $menu.menu_id eq $evaluation.menu_id}
        <option value='{$menu.menu_id}' selected>{$menu.name}</option>
      {else}
        <option value='{$menu.menu_id}'>{$menu.name}</option>
      {/if}
    {/foreach}
  </select>
</p>
{* ユーザに変更されると困るが、変更に必要な情報なのでhiddenにしておく *}
<p class='form__hidden-item'>
  <input class='form__item--input' name='evaluation_id' type='text' value='{$evaluation.evaluation_id}'>
</p>
<p class='form__item'>
  <input class='form__item--button' type='submit' value='評価更新'>
</p>
