{* data *}
<p class='form__item'>
  <label class='form__item--label' for='data'>評価（5段階）</label>
  <input class='form__item--input' id='data' name='data' type='number' value='{$evaluation.data|default:3}'>
</p>

{* menu_id *}
<p class='form__item'>
  <label class='form__item--label' for='menu_id'>評価するメニュー</label>
  <select class='form__item--select' id='menu_id' name='menu_id'>
    <option value=''>＜選択＞</option>
    {foreach from=$menus item=menu}
      {if $menu.menu_id eq $evaluation.menu_id}
        <option value='{$menu.menu_id}' selected>{h($menu.name)}</option>
      {else}
        <option value='{$menu.menu_id}'>{h($menu.name)}</option>
      {/if}
    {/foreach}
  </select>
</p>

{* evaluation_id *}
{* ユーザに変更されると困るが、変更に必要な情報なのでhiddenにしておく *}
<p class='form__hidden-item'>
  <input class='form__item--input' name='evaluation_id' type='text' value='{$evaluation.evaluation_id}'>
</p>

{* ボタン *}
<p class='form__item'>
  <input class='form__item--button' type='submit' value='{$button_name}'>
</p>
