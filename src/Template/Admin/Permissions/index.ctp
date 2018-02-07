<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permissions[]|\Cake\Collection\CollectionInterface $permissions
 */

$this->extend('/_common/col-3-9');

$this->start('sidebar_content');
?>
<?= $this->element("admin-sidebar") ?>
<?php $this->end(); ?>

<h2 style="font-weight: 300">Permissions</a></h2>
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-12 text-right">
        <a class="btn btn-success" href="/admin/permissions/add">Create post</a>
    </div>
</div>
<div class="row text-center loading" v-if="loading">
    <div class="col">
        <h3 style="font-weight: 300">Thinking ...</h3>
    </div>
</div>

<table class="table">
<tr>
<th>Title</th>
<th>Label</th>
</tr>
<?php foreach($permissions as $permission) : ?>
    <tr>
        <td><?= $permission->title ?></td>
        <td><?= $permission->label ?></td>
    </tr>
<?php endforeach; ?>
</table>
