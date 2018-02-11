<?php
/**
 * @var \App\View\AppView $this
 */
$this->layout('dashboard');
$this->start('admin_sidebar_content');
echo $this->element('admin-sidebar');
$this->end();
?>

<div class="row justify-content-md-center">
    <div class="col-8">
        <?= $this->fetch('content') ?>
    </div>
</div>