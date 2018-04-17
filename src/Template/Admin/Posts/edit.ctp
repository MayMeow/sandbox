<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */

$this->extend('/_common/dashboard-narrow');
$this->start('script');
echo $this->Html->script($this->Webapp->mix('/js/mix/posts.bundle.js'));
$this->end();
?>

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
