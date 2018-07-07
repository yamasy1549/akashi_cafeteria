<p class='form__item'>
  <label class='form__item--label' for='name'>メニュー名</label>
  <input class='form__item--input' id='name' name='name' type='text' value='{$menu.name}'>
</p>
{* TODO: <select>タグでカテゴリ名選択 *}
<p class='form__item'>
  <label class='form__item--label' for='name'>カテゴリ</label>
  <input class='form__item--input' id='name' name='category_id' type='text' value='{$menu.category_id}'>
</p>
<p class='form__item'>
  <label class='form__item--label' for='name'>価格</label>
  <input class='form__item--input' id='name' name='price' type='text' value='{$menu.price}'>
</p>
<p class='form__item'>
  <label class='form__item--label' for='name'>画像</label>
  <input class='form__item--input' id='name' name='image' type='text' value='{$menu.image}'>
</p>
{* ユーザに変更されると困るが、変更に必要な情報なのでhiddenにしておく *}
<p class='form__hidden-item'>
  <input class='form__item--input' name='menu_id' type='text' value='{$menu.menu_id}'>
</p>
<p class='form__item'>
  <input class='form__item--button' type='submit' value='{$button_name}'>
</p>