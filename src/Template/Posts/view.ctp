<?php
$this->start('script');
echo $this->Html->script($this->Webapp->mix('/js/mix/posts.bundle.js'));
$this->end();
?>
<post-view-component post-i-d="<?= $postID ?>"></post-view-component>