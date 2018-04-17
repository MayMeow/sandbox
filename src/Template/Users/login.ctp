<?php
$this->start('script');
echo $this->Html->script($this->Webapp->mix('/js/mix/users.bundle.js'));
$this->end();
?>

<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Login', ['class' => 'btn btn-outline-success']) ?>
<?= $this->Form->end() ?>