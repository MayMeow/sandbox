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

<h2 style="font-weight: 300">Posts</a></h2>
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-12 text-right">
        <a class="btn btn-success" href="/admin/posts/add">Create post</a>
    </div>
</div>
<div class="row text-center loading" v-if="loading">
    <div class="col">
        <h3 style="font-weight: 300">Thinking ...</h3>
    </div>
</div>
<posts-table-component></posts-table-component>