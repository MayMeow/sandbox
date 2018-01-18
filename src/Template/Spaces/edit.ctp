<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Space $space
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $space->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $space->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Spaces'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="spaces form large-9 medium-8 columns content">
    <?= $this->Form->create($space) ?>
    <fieldset>
        <legend><?= __('Edit Space') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('project_id', ['options' => $projects, 'empty' => true]);
            echo $this->Form->control('app_key');
            echo $this->Form->control('app_secret');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
