<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */

$this->extend('/_common/dashboard-full');
?>

<?= $this->Form->create($post) ?>
<div class="row">
    <div class="col-9">
    <h3 style="font-weight: 300"><?= __('New Post') ?></h3>
    
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('body');
        ?>
    
    </div>

    <div class="col-3">
    <?= $this->Form->button(__('Publish'), ['class' => 'btn btn-outline-primary btn-block']) ?>
    </div>
</div>
<?= $this->Form->end() ?>
