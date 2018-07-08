{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' title='評価' action='追加'}

<form class='form' action='?controller=evaluation&action=create' method='post'>
  {include file='./_form.tpl' evaluation=$evaluation}
  {* ユーザに変更されると困るが、変更に必要な情報なのでhiddenにしておく *}
  <p class='form__hidden-item'>
    {* TODO: 動作確認のためdefaultを入れているのでUser実装後に削除 *}
    <input class='form__item--input' name='user_id' type='text' value='{$menu.user_id|default:1}'>
  </p>
</form>

{include file='../templates/footer.tpl'}
