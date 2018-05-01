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

<div class="row">
    <div class="col-md-12">
        <?= $this->fetch('project_body') ?>
    </div>
</div>