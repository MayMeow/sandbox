<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $roles
 */
$this->extend('/_common/dashboard-narrow');
$this->start('script');
echo $this->Html->script($this->Webapp->mix('/js/mix/app.js'));
$this->end();
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="posts form large-9 medium-8 columns content">
    <h3 style="font-weight: 300"><?= __('New permission') ?></h3>
    <?= $this->Form->create($role) ?>
        <?php
            echo $this->Form->control('title', ['placeholder' => 'Role']);
            echo $this->Form->control('label');
        ?>
    <?= $this->Form->button(__('Save'), ['class' => 'btn btn-outline-primary']) ?>
    <?= $this->Form->end() ?>
</div>
