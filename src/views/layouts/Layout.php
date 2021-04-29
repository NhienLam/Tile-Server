<?php

namespace NhienLam\hw4\views\layouts;

use NhienLam\hw4\views\View as View;

class Layout
{
  function mapServerLayout()
  {
    $mapServerView = new View();
    ?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">

    <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="src/styles/style.css">
      <title>Map Server</title>
    </head>

    <body>
      <main>
        <h1>Map Server</h1>
        <?php
    $mapServerView->mapServerView();
    ?>
    </body>
    </html>
    <?php
  }
}
