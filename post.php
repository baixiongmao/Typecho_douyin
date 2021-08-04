<!-- 文章页面 -->
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!--header开始-->
<?php $this->need('header.php'); ?>	
<!--header结束-->
<?php $this->need('title.php'); ?>
<!--文章开始-->
<?php $this->need('content.php'); ?>
<!--文章结束-->
<?php $this->need('footer.php'); ?>