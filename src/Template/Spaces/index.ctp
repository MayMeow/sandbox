<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Space[]|\Cake\Collection\CollectionInterface $spaces
 */
$this->extend('/_common/default-no-submenu');
?>

<h2 style="font-weight: 300">Spaces</a></h2>

<div class="row" style="margin-bottom: 10px">
    <div class="col-md-12 text-right">
        <a class="btn btn-success" href="/spaces/add">Create space</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="row text-center loading" v-if="loading">
            <div class="col">
                <h3 style="font-weight: 300">Thinking ...</h3>
            </div>
        </div>
        <spaces-table-component space-id="<?= $spaceID ?>"></spaces-table-component>
    </div>
</div>