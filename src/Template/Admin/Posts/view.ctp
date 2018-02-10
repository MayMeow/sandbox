<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
$this->layout('dashboard');
$this->start('admin_sidebar_content');
echo $this->element('admin-sidebar');
$this->end();
?>

