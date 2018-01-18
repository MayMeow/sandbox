<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project[]|\Cake\Collection\CollectionInterface $projects
 */
?>

<h2 style="font-weight: 300">Projects</a></h2>

<div class="row" style="margin-bottom: 10px">
    <div class="col-md-12 text-right">
        <a class="btn btn-success" href="/projects/add">Create project</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="row text-center loading" v-if="loading">
            <div class="col">
                <h3 style="font-weight: 300">Thinking ...</h3>
            </div>
        </div>
        <projects-table-component></projects-table-component>
    </div>
</div>