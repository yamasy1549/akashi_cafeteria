<p class='form__item'>
  <label class='form__item--label' for='name'>評価（5段階）</label>
  <input class='form__item--input' id='name' name='data' type='text' value='{$evaluation.data}'>
</p>
{* TODO: <select>タグでメニュー名選択 *}
<p class='form__item'>
  <label class='form__item--label' for='name'>評価するメニュー</label>
  <input class='form__item--input' id='name' name='menu_id' type='text' value='{$evaluation.menu_id}'>
</p>
{* ユーザに変更されると困るが、変更に必要な情報なのでhiddenにしておく *}
<p class='form__hidden-item'>
  <input class='form__item--input' name='evaluation_id' type='text' value='{$evaluation.evaluation_id}'>
</p>
<p class='form__item'>
  <input class='form__item--button' type='submit' value='評価更新'>
</p>
