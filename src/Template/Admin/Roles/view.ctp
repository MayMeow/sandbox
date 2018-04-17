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

<h2 style="font-weight: 300"><?= $role->title ?></a></h2>

<div class="row text-center loading" v-if="loading">
    <div class="col">
        <h3 style="font-weight: 300">Thinking ...</h3>
    </div>
</div>

<table class="table">
<tr>
<th>Title</th>
<th>Label</th>
<th>Actions</th>
</tr>
<?php foreach($role->permissions as $permission) : ?>
    <tr>
        <td><?= $permission->title ?></td>
        <td><?= $permission->label ?></td>
        <td><a href="/admin/roles/revoke-permission/<?= $role->id ?>/<?= $permission->id ?>">Revoke</a></td>
    </tr>
<?php endforeach; ?>
</table>

<div class="row">
<div class="col-md-12">

<?= $this->Form->create($role, ['url' => '/admin/roles/assign-permission/' . $role->id]) ?>
    <?php
        echo $this->Form->control('permissions');
    ?>
<?= $this->Form->button(__('Assign permission'), ['class' => 'btn btn-outline-primary']) ?>
<?= $this->Form->end() ?>

</div>
</div>