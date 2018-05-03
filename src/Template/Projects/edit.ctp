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

<div class="border-bottom px-0 py-0 mb-3">
    <h3 style="font-weight: 300">Edit project</h3>
</div>

<div class="row mb-3">
    <div class="col-md-3">
        General project information
    </div>
    <div class="col-md-9">
        <div class="projects form large-9 medium-8 columns content">
            <?= $this->Form->create($project) ?>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('image');
                    echo $this->Form->control('description');
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                ?>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<div class="border-bottom px-0 py-0 mb-3">
    <h3 style="font-weight: 300">Application login</h3>
</div>

<div class="row mb-3">
    <div class="col-md-3">
        Credentials to register your application to project
    </div>
    <div class="col-md-9">
        <div class="projects form large-9 medium-8 columns content">
            <ul>
                <li>App key: <span class="text-monospace text-danger"><?= $settings->app_key ?></span></li>
                <li>App secret: <span class="text-monospace text-danger"><?= $settings->app_secret ?></span></li>
            </ul>
        </div>
    </div>
</div>

<div class="border-bottom px-0 py-0 mb-3">
    <h3 style="font-weight: 300">Project info</h3>
</div>

<div class="row mb-3">
    <div class="col-md-3">
        Project settings
    </div>
    <div class="col-md-9">
        <div class="projects form large-9 medium-8 columns content">

        </div>
    </div>
</div>

<div class="border-bottom px-0 py-0 mb-3">
    <h3 style="font-weight: 300">Pages</h3>
</div>

<div class="row mb-3">
    <div class="col-md-3">
        Project related pages.
    </div>
    <div class="col-md-9">
        <div class="projects form large-9 medium-8 columns content">
            Pages are activated and can be found: <span class="text-monospace text-danger">https://server-name.com/project-slug/page-slug</span>
        </div>
    </div>
</div>

<div class="border-bottom px-0 py-0 mb-3">
    <h3 style="font-weight: 300">Dependencies</h3>
</div>

<div class="row mb-3">
    <div class="col-md-3">
        Project dependencies. To show upload <span class="text-monospace text-danger">composer.lock</span> file
    </div>
    <div class="col-md-9">
        <div class="projects form large-9 medium-8 columns content">
        <?= $this->Form->create($dependenciesUpdateForm, ['url' => '/projects/settings/'. $project->id . '/update-dependencies', 'enctype' => 'multipart/form-data'])?>
        <?= $this->Form->control('dependencies_file', ['type' => 'file', 'label' => 'Composer.lock file']); ?>
        <?= $this->Form->button(__('Upload dependecy file'), ['class' => 'btn btn-outline-primary btn-block']) ?>
        <?= $this->form->end() ?>
        </div>
    </div>
</div>