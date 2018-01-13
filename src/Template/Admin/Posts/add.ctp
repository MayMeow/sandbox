<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="posts form large-9 medium-8 columns content">
    <?= $this->Form->create($post) ?>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('body');
        ?>
    <?= $this->Form->button(__('Save', ['type' => 'submit', 'class' => 'test'])) ?>
    <?= $this->Form->end() ?>
</div>
