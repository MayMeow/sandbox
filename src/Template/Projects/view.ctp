<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
$this->extend('/_common/default-with-submenu');
$this->start('script');
echo $this->Html->script($this->Webapp->mix('/js/mix/projects.bundle.js'));
$this->end();

$this->assign('submenu-header', $project->name);
?>

<?php $this->start('submenu-links')?>
<?= $this->element('Projects/side_nav') ?>
<?php $this->end() ?>

<?php $this->start('project_body')?>
<div class="has-emoji mb-3"><?= $project->description ?></div>
<?php $this->end() ?>

<div class="row">
    <div class="col-md-12">
        <div class="d-flex align-items-center p-3 my-3 text-white-50 <?= $project->project_setting->color; ?> rounded box-shadow">
            <div class="lh-100">
                <h6 class="mb-0 text-white lh-100"><?= $project->name ?></h6>
                <small><a href="#" class="text-white"><?= $project->user->profile->name ?></a></small>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12 project-buttons text-center">
        <button type="button" class="btn btn-outline-secondary btn-sm my-1 mx-1">Create CA certificate</button>
        <button type="button" class="btn btn-outline-secondary btn-sm my-1 mx-1">Sign Intermediate CA certificate</button>
        <button type="button" class="btn btn-outline-secondary btn-sm my-1 mx-1">Sign User certificate</button>
        <button type="button" class="btn btn-outline-secondary btn-sm my-1 mx-1">Create Key pair</button>
        <button type="button" class="btn btn-outline-secondary btn-sm my-1 mx-1">Encrypt and decrypt text</button>
        <button type="button" class="btn btn-outline-secondary btn-sm my-1 mx-1">GitHub</button>
        <button type="button" class="btn btn-outline-secondary btn-sm my-1 mx-1">Seal</button>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?= $this->fetch('project_body') ?>
    </div>
</div>