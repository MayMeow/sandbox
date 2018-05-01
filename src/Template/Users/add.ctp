<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->extend('/_common/default-no-submenu');
$this->start('script');
echo $this->Html->script($this->Webapp->mix('/js/mix/users.bundle.js'));
$this->end();
?>

<div class="users form large-9 medium-8 columns content">

    <?= $this->Form->create($user) ?>
    <div class="card">
        <div class="card-header">
        <?= __('Add User') ?>
        </div>
        <div class="card-body">
        <?php
            echo $this->Form->control('email');
            echo $this->Form->control('password');
        ?>
        <?= $this->Form->button(__('Create user'), ['class' => 'btn btn-outline-primary']) ?>
        </div>
    </div>   
    <?= $this->Form->end() ?>

</div>
