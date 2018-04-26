<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post[]|\Cake\Collection\CollectionInterface $posts
 */
$this->extend('/_common/default-no-submenu');
$this->start('script');
echo $this->Html->script($this->Webapp->mix('/js/mix/posts.bundle.js'));
$this->end();
?>

<h2 style="font-weight: 300">Posts</a></h2>

<div class="row" style="margin-bottom: 10px">
    <div class="col-md-12 text-right">
        <a class="btn btn-success" href="/admin/posts/add">Create post</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <posts-table-component></posts-table-component>
    </div>
</div>

