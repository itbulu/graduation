<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <title><?php if($this->_currentPage>1) echo '第 '.$this->_currentPage.' 页 - '; ?><?php $this->archiveTitle('', '', '_'); ?><?php $this->options->title(); ?>
<?php if($this->is('index')): ?>_<?php $this->options->subtitle() ?><?php endif; ?></title>
 <script src="<?php $this->options->themeUrl('js/skel.min.js'); ?>"></script>
	<script src="<?php $this->options->themeUrl('js/init.js'); ?>"></script>
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/skel-noscript.css'); ?>">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css'); ?>">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/style-desktop.css'); ?>">

 <?php if($this->is('index')): ?>
	<meta name="description" content="<?php $this->options->description() ?>" />
	<meta name="keywords" content="<?php $this->options->keywords() ?>" />
   <?php else: ?>
   	<?php $this->header(); ?><?php endif; ?>
  </head>






