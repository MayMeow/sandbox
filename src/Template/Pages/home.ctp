<?php
$this->extend('/_common/default-no-submenu');
$this->start('script');
echo $this->Html->script($this->Webapp->mix('/js/mix/app.js'));
$this->end();
?>

<h2 style="font-weight: 300">
    <span class="mr-2"><i class="fal fa-hdd"></i></span>
    <?= __('Sandbox') ?>
</h2>

Features
<ul>
<li>Users management and authentication</li>
<li>Authorization with roles and permissions</li>
<li>Projects</li>
<li>Posts</li>
<li>License (with public-private key encryption) - some action need valid license</li>
</ul>

Info
<ul>
<li>App version: <span class="text-monospace">v<?= $this->Webapp->version() ?></span></li>
<li>Framework: <span class="text-monospace">v<?= $this->Webapp->frameworkVersion() ?></span></li>
</ul>