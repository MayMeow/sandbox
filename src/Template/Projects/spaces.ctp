<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>

<?php $this->start('project_sidebar')?>
<?= $this->element('Projects/side_nav') ?>
<?php $this->end() ?>

<?php $this->start('project_body')?>
<div class="row text-right" style="margin-bottom: 10px">
    <div class="col">
        <a href="/spaces/add" class="btn btn-success">Create space</a>
    </div>
</div>

<div class="row text-center loading" v-if="loading">
    <div class="col">
        <h3 style="font-weight: 300">Thinking ...</h3>
    </div>
</div>
<spaces-table-component space-id="<?= $project->id ?>"></spaces-table-component>
<?php $this->end() ?>

<div class="row text-center">
    <div class="col-md-12">
        <div style="margin-bottom: 10px">
            <?= $this->Html->image('/' . $project->image, ['class' => 'rounded-circle img-thumbnail', 'width' => '100px', 'height' => '100px']) ?>
        </div>
        <h2 style="font-weight: 300">
            <svg class="svg-inline--fa fa-camera-retro fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="camera-retro" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M356 160H188c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12v8c0 6.6-5.4 12-12 12zm12 52v-8c0-6.6-5.4-12-12-12H188c-6.6 0-12 5.4-12 12v8c0 6.6 5.4 12 12 12h168c6.6 0 12-5.4 12-12zm64.7 268h3.3c6.6 0 12 5.4 12 12v8c0 6.6-5.4 12-12 12H80c-44.2 0-80-35.8-80-80V80C0 35.8 35.8 0 80 0h344c13.3 0 24 10.7 24 24v368c0 10-6.2 18.6-14.9 22.2-3.6 16.1-4.4 45.6-.4 65.8zM128 384h288V32H128v352zm-96 16c13.4-10 30-16 48-16h16V32H80c-26.5 0-48 21.5-48 48v320zm372.3 80c-3.1-20.4-2.9-45.2 0-64H80c-64 0-64 64 0 64h324.3z"/></svg>
            <?= $project->name ?>
            <small class="has-emoji">By <?= $project->user->profile->name ?></small>
        </h2>
        <p class="lead has-emoji"><?= $project->description ?></p>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
    <?= $this->fetch('project_sidebar') ?>
    </div>
    <div class="col-md-10">
        <?= $this->fetch('project_body') ?>
    </div>
</div>