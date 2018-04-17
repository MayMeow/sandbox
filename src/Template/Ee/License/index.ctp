<?php
/**
 * @var \App\View\AppView $this
 */
$this->extend('/_common/dashboard-boxed');
$this->start('admin_sidebar_content');
echo $this->element('admin-sidebar');
$this->end();

$this->start('script');
echo $this->Html->script($this->Webapp->mix('/js/mix/app.js'));
$this->end();
?>

<h2 style="font-weight: 300">License</a></h2>
<div class="row" style="margin-bottom: 10px">


<?php if ($license) :?>


<div class="row mb-3">
            <div class="col-md-6">

            <div class="card mb-3">
                <div class="card-header">
                    Licensed to
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Name: <strong><?= $license->licensee->name ?></strong></li>
                    <li class="list-group-item">Email: <strong><?= $license->licensee->email ?></strong></li>
                    <li class="list-group-item">Company: <strong><?= $license->licensee->company ?></strong></li>
                </ul>
            
            </div>

            <div class="card">
                <div class="card-header">
                    Details
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Plan: <strong><?= $license->type ?></strong></li>
                    <li class="list-group-item">Started: <strong><?= $license->started_at->diffForHumans() ?></strong></li>
                    <li class="list-group-item">Expires in: <strong><?= $license->expires_at->diffForHumans() ?></strong></li>
                </ul>
            
            </div>

            </div>
            <div class="col-md-6">

                <div class="card border-danger">
                <div class="card-header bg-danger text-white">Delete license</div>
                <div class="card-body">
                    <p class="card-text">If you remove license Webapp fill falback to free edition and you will not be able to use licensed features</p>
                    <delete-button url="/admin/license/delete" redirect="/admin/license"></delete-button>
                </div>
                </div>

            </div>
        </div>


<?php else : ?>

<div class="col-md-6">
<?= $this->Form->create($licenseForm, ['url' => '/admin/license/upload', 'enctype' => 'multipart/form-data'])?>
<?= $this->Form->control('webapp_license', ['type' => 'file', 'label' => 'License file']); ?>
<?= $this->Form->button(__('Upload license file'), ['class' => 'btn btn-outline-primary btn-block']) ?>
<?= $this->form->end() ?>
</div>

<?php endif; ?>

</div>



