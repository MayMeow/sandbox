<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Profile $profile
 */
?>

<h2 style="font-weight: 300">Edit profile</a></h2>

<div class="row" style="margin-bottom: 10px">
    <div class="col-md-12 text-right">
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="row text-center loading" v-if="loading">
            <div class="col">
                <h3 style="font-weight: 300">Thinking ...</h3>
            </div>
        </div>

        <h3 style="font-weight: 300">Basic info</h3> <hr />
        <div class="row">
            <div class="col-md-3">
                Update basic information of your profile
            </div>
            <div class="col-md-9">
            <?= $this->Form->create($profile, ['enctype' => 'multipart/form-data']) ?>

            <?php
                echo $this->Form->control('name');
                echo $this->Form->control('bio');
                echo $this->Form->control('location');
                echo $this->Form->control('facebook');
                echo $this->Form->control('twitter');
                echo $this->Form->control('url');
            ?>

            <?= $this->Form->button(__('Update'), ['class' => 'btn btn-success']) ?>
            <?= $this->Form->end() ?>
            </div>
        </div>

        <h3 style="font-weight: 300">Profile Image</h3> <hr />
        <div class="row">
            <div class="col-md-3">
                Maximum image size is 300kb
            </div>
            <div class="col-md-9">
            <?= $this->Form->create($profile, ['enctype' => 'multipart/form-data']) ?>

            <?php
                echo $this->Form->control('image_file', ['type' => 'file']);
            ?>

            <?= $this->Form->button(__('Update picture'), ['class' => 'btn btn-success']) ?>
            <?= $this->Form->end() ?>
            </div>
        </div>
        
        
    </div>
</div>


    
    

    
    

