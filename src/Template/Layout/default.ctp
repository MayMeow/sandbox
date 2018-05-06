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
    <?= $this->Html->css($this->Webapp->mix('/css/app.css')) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-sandbox pt-1 pb-1">
      <a class="navbar-brand" href="/">
        <span class="mr-2">
          <svg class="svg-inline--fa fa-hdd fa-w-18" aria-hidden="true" data-prefix="fal" data-icon="hdd" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M566.819 227.377L462.377 83.768A48.001 48.001 0 0 0 423.557 64H152.443a47.998 47.998 0 0 0-38.819 19.768L9.181 227.377A47.996 47.996 0 0 0 0 255.609V400c0 26.51 21.49 48 48 48h480c26.51 0 48-21.49 48-48V255.609a47.996 47.996 0 0 0-9.181-28.232zM139.503 102.589A16.048 16.048 0 0 1 152.443 96h271.115c5.102 0 9.939 2.463 12.94 6.589L524.796 224H51.204l88.299-121.411zM544 272v128c0 8.823-7.178 16-16 16H48c-8.822 0-16-7.177-16-16V272c0-8.837 7.163-16 16-16h480c8.837 0 16 7.163 16 16zm-56 64c0 13.255-10.745 24-24 24s-24-10.745-24-24 10.745-24 24-24 24 10.745 24 24zm-64 0c0 13.255-10.745 24-24 24s-24-10.745-24-24 10.745-24 24-24 24 10.745 24 24z"></path></svg>
        </span>
        Sandbox
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= $this->Url->build(['plugin' => false, 'prefix' => false, 'controller' => 'pages', 'action' => 'display', 'about'])?>">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/users">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/projects">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/posts"><i class="far fa-wrench"></i></a>
          </li>
        </ul>
        <?php if($this->request->getSession()->read('Auth.User')) : ?>
          <a href="/profiles/<?= $this->Auth->getUser()->profile()->id; ?>" class="btn btn-light my-2 my-sm-0 mr-2">
            <span class="mr-2">
            <svg class="svg-inline--fa fa-user-circle fa-w-16" aria-hidden="true" data-prefix="fal" data-icon="user-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 32c119.293 0 216 96.707 216 216 0 41.286-11.59 79.862-31.684 112.665-12.599-27.799-38.139-43.609-56.969-48.989L350.53 310.3C372.154 286.662 384 256.243 384 224c0-70.689-57.189-128-128-128-70.691 0-128 57.192-128 128 0 32.243 11.846 62.662 33.471 86.299l-32.817 9.376c-18.483 5.281-44.287 20.974-56.979 48.973C51.586 335.849 40 297.279 40 256c0-119.293 96.707-216 216-216zm0 280c-53.02 0-96-42.981-96-96s42.98-96 96-96 96 42.981 96 96-42.98 96-96 96zm0 152c-63.352 0-120.333-27.274-159.844-70.72 1.705-23.783 18.083-44.206 41.288-50.836l54.501-15.572C211.204 346.041 233.143 352 256 352s44.796-5.959 64.054-17.127l54.501 15.572c23.205 6.63 39.583 27.053 41.288 50.836C376.333 444.726 319.352 472 256 472z"></path></svg>
            </span>
            <?= $this->Auth->getUser()->profile()->name; ?>
          </a>
          <a href="/logout" class="btn btn-light my-2 my-sm-0">
          <svg class="svg-inline--fa fa-sign-out-alt fa-w-16" aria-hidden="true" data-prefix="fal" data-icon="sign-out-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M160 217.1c0-8.8 7.2-16 16-16h144v-93.9c0-7.1 8.6-10.7 13.6-5.7l141.6 143.1c6.3 6.3 6.3 16.4 0 22.7L333.6 410.4c-5 5-13.6 1.5-13.6-5.7v-93.9H176c-8.8 0-16-7.2-16-16v-77.7m-32 0v77.7c0 26.5 21.5 48 48 48h112v61.9c0 35.5 43 53.5 68.2 28.3l141.7-143c18.8-18.8 18.8-49.2 0-68L356.2 78.9c-25.1-25.1-68.2-7.3-68.2 28.3v61.9H176c-26.5 0-48 21.6-48 48zM0 112v288c0 26.5 21.5 48 48 48h132c6.6 0 12-5.4 12-12v-8c0-6.6-5.4-12-12-12H48c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16h132c6.6 0 12-5.4 12-12v-8c0-6.6-5.4-12-12-12H48C21.5 64 0 85.5 0 112z"></path></svg>
          </a>
        <?php else : ?>
          <a href="/login" class="btn btn-outline-light my-2 my-sm-0 mr-2">Login</a>
          <a href="/register" class="btn btn-light my-2 my-sm-0">Register</a>
        <?php endif; ?>
      </div>
    </nav>

      <?= $this->Flash->render() ?>
      <?= $this->fetch('content') ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?= $this->Html->script($this->Webapp->mix('/js/mix/manifest.js')) ?>
    <?= $this->Html->script($this->Webapp->mix('/js/mix/vendor.js')) ?>
    <?= $this->Html->script($this->Webapp->mix('/js/mix/assets.budle.js')) ?>
    <?= $this->fetch('script') ?>
  </body>
</html>
