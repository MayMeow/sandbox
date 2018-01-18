<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>

<div class="row">
    <div class="col-md-12">
        <h2 style="font-weight: 300"><?= $project->name ?></h2> <hr />
    </div>
</div>

<div class="row">
    <div class="col-md-2">

    <ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link active" href="#">Posts</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Spaces</a>
    </li>
    </ul>

    </div>
    <div class="col-md-10">
        <spaces-table-component space-id="<?= $project->id ?>"></spaces-table-component>
    </div>
</div>