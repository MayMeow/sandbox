<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>

<div class="row">
    <div class="col-md-12">
        <h2 style="font-weight: 300"><?= $project->name ?></h2>
        <p class="lead"><?= $project->description ?></p>
    </div>
</div>

<div class="row">
    <div class="col-md-2">

    <ul class="nav flex-column" style="font-weight: 700">
    <li class="nav-item">
        <a class="nav-link" href="#">Posts</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/projects/<?= $project->id ?>/spaces">Spaces</a>
    </li>
    </ul>

    </div>
    <div class="col-md-10 text-center">
        Project information
    </div>
</div>