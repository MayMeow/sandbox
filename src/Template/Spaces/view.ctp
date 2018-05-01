<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Space $space
 */
$this->extend('/_common/default-no-submenu');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Space'), ['action' => 'edit', $space->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Space'), ['action' => 'delete', $space->id], ['confirm' => __('Are you sure you want to delete # {0}?', $space->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Spaces'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Space'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="spaces view large-9 medium-8 columns content">
    <h3><?= h($space->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($space->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project') ?></th>
            <td><?= $space->has('project') ? $this->Html->link($space->project->name, ['controller' => 'Projects', 'action' => 'view', $space->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('App Key') ?></th>
            <td><?= h($space->app_key) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('App Secret') ?></th>
            <td><?= h($space->app_secret) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($space->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($space->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($space->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($space->description)); ?>
    </div>
</div>
