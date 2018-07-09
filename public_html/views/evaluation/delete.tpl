{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' title='評価' action='削除'}

<p class='form__question'>評価「{h($evaluation.menu_name)}（評価：{$evaluation.data}）」を削除しますか？</p>

<form class='form' action='?controller=evaluation&action=destroy' method='post'>
  {* ユーザに変更されると困るが、変更に必要な情報なのでhiddenにしておく *}
  <p class='form__hidden-item'>
    <input class='form__item--input' name='evaluation_id' type='text' value='{$evaluation.evaluation_id}'>
  </p>
  <p class='form__item'>
    <input class='form__item--button' type='submit' value='削除'>
  </p>
</form>

{include file='../templates/footer.tpl'}
