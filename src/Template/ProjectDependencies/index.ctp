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
<h4>Dependencies</h4>
<table class="table table-hover">
<?php foreach($project->project_setting->dependencies_text->packages as $package) : ?>
<tr>
    <td><?= $package->name ?></td>
    <td><?= $package->version ?></td>
</tr>
<?php endforeach; ?>
</table>

<h4>Dev Dependencies</h4>
<table class="table table-hover">
<?php foreach($project->project_setting->dependencies_text->{'packages-dev'} as $package_dev) : ?>
<tr>
    <td><?= $package_dev->name ?></td>
    <td><?= $package_dev->version ?></td>
</tr>
<?php endforeach; ?>
</table>
<?php $this->end() ?>

<div class="row mr-3">
    <div class="col-md-12">
        <?= $this->fetch('project_body') ?>
    </div>
</div>