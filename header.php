<!-- 网站头部 -->
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<html lang="zh">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <?php $this->header(); ?>
    <link rel='icon' href="<?php $this->options->favicon(); ?>">
    <link rel="stylesheet" href="<?php echo $this->options->themeUrl ?>/style.css?ver=1.4.3">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_2697026_baf2v5mkr8r.css">
    <link rel="stylesheet" href="<?php echo $this->options->themeUrl ?>/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?php echo $this->options->themeUrl ?>/css/footer.css?ver=1.0.3">
    
</head>
<body>

    
    
