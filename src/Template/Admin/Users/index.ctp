<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
$this->extend('/_common/dashboard-boxed');
$this->start('script');
echo $this->Html->script($this->Webapp->mix('/js/mix/users.bundle.js'));
$this->end();
?>

<h2 style="font-weight: 300">Users</a></h2>
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-12 text-right">
        <a class="btn btn-success" href="/users/add">Create user</a>
    </div>
</div>
<div class="row text-center loading" v-if="loading">
    <div class="col">
        <h3 style="font-weight: 300">Thinking ...</h3>
    </div>
</div>
<users-table-component></users-table-component>