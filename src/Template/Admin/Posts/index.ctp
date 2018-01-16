<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post[]|\Cake\Collection\CollectionInterface $posts
 */

$this->extend('/_common/col-3-9');

$this->start('sidebar_content');
?>
<?= $this->element("admin-sidebar") ?>
<?php $this->end(); ?>

<posts-table-component></posts-table-component>