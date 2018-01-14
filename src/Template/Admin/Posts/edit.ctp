<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $post->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="posts form large-9 medium-8 columns content">
    <h3 style="font-weight: 300"><?= __('Edit Post') ?></h3>
    <?= $this->Form->create($post) ?>

        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('body');
        ?>

    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-outline-success']) ?>
    <?= $this->Form->end() ?>
</div>
