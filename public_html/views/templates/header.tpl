<!DOCTYPE html>
<html lang='ja'>
<head>
  <title>{$title}</title>

  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width,initial-scale=1'>

  {* 開発環境 *}
  <link rel='stylesheet' href='../../styles/index.css'>
  {* 本番環境 *}
  <link rel='stylesheet' href='styles/index.css'>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.1.0/css/all.css' integrity='sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt' crossorigin='anonymous'>
</head>
<body>
  <header class='global-header'>
    <h1 class='global-header__title'>
      <i class='global-header__title--icon fas fa-{$icon}'></i>
      <span class='global-header__title--string'>{$title}</span>
    </h1>
  </header>
  <main class='global-main'>
