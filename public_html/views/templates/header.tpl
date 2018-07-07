<!DOCTYPE html>
<html lang='ja'>
<head>
  <title>
    {$title}
    {if !is_null($action)}
      {$action}
    {/if}
  </title>

  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width,initial-scale=1'>

  {* 開発環境 *}
  <link rel='stylesheet' href='../../styles/index.css'>
  {* 本番環境 *}
  <link rel='stylesheet' href='styles/index.css'>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.1.0/css/all.css' integrity='sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt' crossorigin='anonymous'>
</head>
<body>
  {include file='./sidebar.tpl'}
  <main class='global-main'>
    <header class='global-header'>
      <h1 class='global-header__title'>
        <i class='global-header__title--icon fas fa-{$icon}'></i>
        <span class='global-header__title--string'>
          {$title}
          {if !is_null($action)}
            <i class='fas fa-caret-right global-header__title--string--separator'></i>
            {$action}
          {/if}
        </span>
      </h1>
    </header>
