<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $roles
 */
$this->layout('dashboard');
$this->start('admin_sidebar_content');
echo $this->element('admin-sidebar');
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
