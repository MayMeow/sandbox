<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->extend('/_common/dashboard-boxed');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
</div>


<table class="table">
<tr>
<th>Title</th>
<th>Label</th>
<th>Actions</th>
</tr>
<?php foreach($user->roles as $role) : ?>
    <tr>
        <td><?= $role->title ?></td>
        <td><?= $role->label ?></td>
        <td><a href="/admin/users/revoke-role/<?= $user->id ?>/<?= $role->id ?>">Revoke</a></td>
    </tr>
<?php endforeach; ?>
</table>

<div class="row">
<div class="col-md-12">

<?= $this->Form->create($user, ['url' => '/admin/users/assign-role/' . $user->id]) ?>
    <?php
        echo $this->Form->control('roles');
    ?>
<?= $this->Form->button(__('Assign role'), ['class' => 'btn btn-outline-primary']) ?>
<?= $this->Form->end() ?>

</div>
</div>