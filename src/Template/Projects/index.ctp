<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project[]|\Cake\Collection\CollectionInterface $projects
 */
$this->extend('/_common/default-no-submenu');
$this->start('script');
echo $this->Html->script($this->Webapp->mix('/js/mix/projects.bundle.js'));
$this->end();
?>

<h2 style="font-weight: 300">Projects</a></h2>

<div class="row" style="margin-bottom: 10px">
    <div class="col-md-12 text-right">
        <a class="btn btn-success" href="/projects/add">Create project</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <projects-table-component></projects-table-component>
    </div>
</div>