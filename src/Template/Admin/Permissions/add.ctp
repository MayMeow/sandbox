<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
$this->extend('/_common/dashboard-narrow');
$this->start('script');
echo $this->Html->script($this->Webapp->mix('/js/mix/app.js'));
$this->end();
?>

<div class="posts form large-9 medium-8 columns content">
    <h3 style="font-weight: 300"><?= __('New permission') ?></h3>
    <?= $this->Form->create($permission) ?>
        <?php
            echo $this->Form->control('title', ['placeholder' => 'controller-action']);
            echo $this->Form->control('label');
        ?>
    <?= $this->Form->button(__('Save'), ['class' => 'btn btn-outline-primary']) ?>
    <?= $this->Form->end() ?>
</div>
