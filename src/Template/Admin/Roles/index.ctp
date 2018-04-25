<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Roles[]|\Cake\Collection\CollectionInterface $roles
 */

$this->extend('/_common/dashboard-boxed');
$this->start('script');
echo $this->Html->script($this->Webapp->mix('/js/mix/app.js'));
$this->end();
?>

<h2 style="font-weight: 300">Roles</a></h2>
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-12 text-right">
        <a class="btn btn-success" href="/admin/roles/add">Create post</a>
    </div>
</div>
<table class="table">
<tr>
<th>Title</th>
<th>Label</th>
</tr>
<?php foreach($roles as $role) : ?>
    <tr>
        <td><a href="/admin/roles/<?= $role->id ?>"><?= $role->title ?></a></td>
        <td><?= $role->label ?></td>
    </tr>
<?php endforeach; ?>
</table>
