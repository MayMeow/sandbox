<?php
$this->start('script');
echo $this->Html->script($this->Webapp->mix('/js/mix/users.bundle.js'));
$this->end();
$this->extend('/_common/default-no-submenu');
?>

<div class="row">
    <div class="col-8">
        <h2 style="font-weight: 300">Sandbox</h2>
        CakePHP 3 sandbox application
    </div>
    <div class="col-4">
        <?= $this->Form->create() ?>
        <div class="card">
            <div class="card-header">
                <span class="mr-2"><i class="fal fa-user-circle"></i></span>
                <?= __('Login') ?>
            </div>
            <div class="card-body">
            <?php
                echo $this->Form->control('email');
                echo $this->Form->control('password');
            ?>
            <?= $this->Form->button('Login', ['class' => 'btn btn-outline-success']) ?>
            </div>
        </div> 
        <?= $this->Form->end() ?>
    </div>
</div>