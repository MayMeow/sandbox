<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
$this->layout('dashboard');
$this->start('admin_sidebar_content');
echo $this->element('admin-sidebar');
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
