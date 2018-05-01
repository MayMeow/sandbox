<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Profile[]|\Cake\Collection\CollectionInterface $profiles
 */
$this->extend('/_common/default-no-submenu');
?>
<h2 style="font-weight: 300">Profiles</a></h2>

<div class="row" style="margin-bottom: 10px">

</div>

<div class="row">
    <div class="col-md-12">
        <div class="row text-center loading" v-if="loading">
            <div class="col">
                <h3 style="font-weight: 300">Thinking ...</h3>
            </div>
        </div>
        <profiles-table-component></profiles-table-component>
    </div>
</div>