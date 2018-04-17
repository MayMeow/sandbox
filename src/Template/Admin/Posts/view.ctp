<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
$this->extend('/_common/dashboard-narrow');
$this->start('script');
echo $this->Html->script($this->Webapp->mix('/js/mix/posts.bundle.js'));
$this->end();
?>

