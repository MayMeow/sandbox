<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!doctype html>
<html lang="en">
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>
            <?= $cakeDescription ?>:
            <?= $this->fetch('title') ?>
        </title>

        <!-- Bootstrap core CSS -->
        <!-- Custom styles for this template -->
        <?= $this->Html->css($this->Webapp->mix('/css/dashboard.css')) ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>

  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-sandbox flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">
      <span class="mr-2">
        <svg class="svg-inline--fa fa-hdd fa-w-18" aria-hidden="true" data-prefix="fal" data-icon="hdd" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M566.819 227.377L462.377 83.768A48.001 48.001 0 0 0 423.557 64H152.443a47.998 47.998 0 0 0-38.819 19.768L9.181 227.377A47.996 47.996 0 0 0 0 255.609V400c0 26.51 21.49 48 48 48h480c26.51 0 48-21.49 48-48V255.609a47.996 47.996 0 0 0-9.181-28.232zM139.503 102.589A16.048 16.048 0 0 1 152.443 96h271.115c5.102 0 9.939 2.463 12.94 6.589L524.796 224H51.204l88.299-121.411zM544 272v128c0 8.823-7.178 16-16 16H48c-8.822 0-16-7.177-16-16V272c0-8.837 7.163-16 16-16h480c8.837 0 16 7.163 16 16zm-56 64c0 13.255-10.745 24-24 24s-24-10.745-24-24 10.745-24 24-24 24 10.745 24 24zm-64 0c0 13.255-10.745 24-24 24s-24-10.745-24-24 10.745-24 24-24 24 10.745 24 24z"></path></svg>
      </span>
        Sandbox
      </a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-3 col-lg-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">

            <?= $this->fetch('admin_sidebar_content') ?>
        
          </div>
        </nav>

        <main id="vue-app" role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" v-cloak>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </main>

      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?= $this->Html->script($this->Webapp->mix('/js/mix/manifest.js')) ?>
    <?= $this->Html->script($this->Webapp->mix('/js/mix/vendor.js')) ?>
    <?= $this->Html->script($this->Webapp->mix('/js/mix/assets.budle.js')) ?>
    <?= $this->fetch('script') ?>
    </body>
    
</html>