{* title= のように変数でテンプレートの中身を変更可能 *}

{include file='../templates/header.tpl' icon='tag' title='管理画面' action='一覧'}

<ul class='button-list'>

  <li class='button-list__item'>
    <a href='./?controller=daymenu&action=index' class='button-list__item-link'>
      <i class='button-list__item-link--icon fas fa-calendar'></i>
      <span class='button-list__item-link--name'>日毎メニュー</span>
    </a>
  </li>

  <li class='button-list__item'>
    <a href='./?controller=menu&action=index' class='button-list__item-link'>
      <i class='button-list__item-link--icon fas fa-coffee'></i>
      <span class='button-list__item-link--name'>メニュー管理</span>
    </a>
  </li>

  <li class='button-list__item'>
    <a href='./?controller=category&action=index' class='button-list__item-link'>
      <i class='button-list__item-link--icon fas fa-tag'></i>
      <span class='button-list__item-link--name'>カテゴリ管理</span>
    </a>
  </li>

  <li class='button-list__item'>
    <a href='./?controller=evaluation&action=index' class='button-list__item-link'>
      <i class='button-list__item-link--icon fas fa-star'></i>
      <span class='button-list__item-link--name'>評価管理</span>
    </a>
  </li>

  <li class='button-list__item'>
    <a href='./?controller=user&action=index' class='button-list__item-link'>
      <i class='button-list__item-link--icon fas fa-user'></i>
      <span class='button-list__item-link--name'>ユーザ管理</span>
    </a>
  </li>

  <li class='button-list__item'>
    <a href='./?controller=adminmenu&action=howtouse' class='button-list__item-link'>
      <i class='button-list__item-link--icon fas fa-question'></i>
      <span class='button-list__item-link--name'>つかいかた</span>
    </a>
  </li>
</ul>

{include file='../templates/footer.tpl' button_action=$button_action}
