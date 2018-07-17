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

  <link rel='stylesheet' href='../../styles/index.css'>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.1.0/css/all.css' integrity='sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt' crossorigin='anonymous'>
</head>
<body>
  {include file='./sidebar.tpl' title=$title}
  <main class='global-main'>
    <header class='global-header'>
      <h1 class='global-header__title'>
        <span class='global-header__title--string'>
          {$title}
          {if !is_null($action)}
            {$action}
          {/if}
        </span>
      </h1>
    </header>
