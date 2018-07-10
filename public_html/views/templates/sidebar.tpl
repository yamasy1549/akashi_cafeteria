<menu class='sidebar'>
  <ol class='sidebar-list'>
    <li class='sidebar-list__item'>
      <a href='./?controller=daymenu&action=index' class='sidebar-list__item-wrapper'>
        <i class='sidebar-list__item--icon fas fa-calendar'></i>
        <span class='sidebar-list__item--text'>DAYMENU</span>
      </a>
      {if $title eq '日毎メニュー'}
        <i class='sidebar-list__item--mark fas fa-caret-left'></i>
      {/if}
    </li>
    <li class='sidebar-list__item'>
      <a href='./?controller=menu&action=index' class='sidebar-list__item-wrapper'>
        <i class='sidebar-list__item--icon fas fa-coffee'></i>
        <span class='sidebar-list__item--text'>MENU</span>
      </a>
      {if $title eq 'メニュー'}
        <i class='sidebar-list__item--mark fas fa-caret-left'></i>
      {/if}
    </li>
    <li class='sidebar-list__item'>
      <a href='./?controller=category&action=index' class='sidebar-list__item-wrapper'>
        <i class='sidebar-list__item--icon fas fa-tag'></i>
        <span class='sidebar-list__item--text'>CATEGORY</span>
      </a>
      {if $title eq 'カテゴリ'}
        <i class='sidebar-list__item--mark fas fa-caret-left'></i>
      {/if}
    </li>
    <li class='sidebar-list__item'>
      <a href='./?controller=evaluation&action=index' class='sidebar-list__item-wrapper'>
        <i class='sidebar-list__item--icon fas fa-star'></i>
        <span class='sidebar-list__item--text'>EVALUATION</span>
      </a>
      {if $title eq '評価'}
        <i class='sidebar-list__item--mark fas fa-caret-left'></i>
      {/if}
    </li>
  </ol>
</menu>
