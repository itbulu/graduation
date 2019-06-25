<?php
/**
 * Typecho主题：Graduation（ <a href="https://www.itbulu.com/typecho-graduation.html" target="_blank">主题发布地址</a>）
 * 毕业季，赶巧在即将期末考试，毕业季分享的主题。
 *
 * 基于Layui前端框架样式架设的单栏Typecho主题，适合个人日志博客使用。 建站交流QQ群： <font color="red">594467847</font>。
 * 申明：主题是免费发布至互联网共享的，使用者务必用于正规网站和学习，如果因用于违规用途，用户自行承担法律责任。
 * @package graduation博客主题 
 * @author 老蒋部落
 * @version 2019.6
 * @link https://www.itbulu.com/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
  <body class="homepage">
    <!-- Header -->
    <div id="header">
      <div class="container"> 
        
        <!-- Logo -->
        <div id="logo">
          <h1><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></h1>
          <span><?php $this->options->description() ?></span>
        </div>
        
        <!-- Nav -->
        <nav id="nav">

          <ul>
              <li> <a<?php if($this->is('index')): ?> class="active"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                    <li><a<?php if($this->is('page', $pages->slug)): ?> class="active"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
                    <?php endwhile; ?></ul>
        </nav>
      </div>
    </div>

    <!-- Main -->
    <div id="main">
      <div class="container">
        <div class="row"> 
          
          <!-- Content -->
          <div id="content" class="8u skel-cell-important">
            
            <section>
              <header>
                <h2><?php $this->title() ?></a></h2>
                <span class="byline">分类：<?php $this->category(','); ?> / 时间：<time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time> / <a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></span>              
              </header>
              
              
              <p><?php $this->content(); ?></p></p>
            </section>
             

            <hr>
<p>上一篇&gt;&gt; <?php $this->thePrev('%s','没有了'); ?></p>
<p>下一篇&gt;&gt; <?php $this->theNext('%s','没有了'); ?></p>
<div class="pinglun"> 
<?php $this->need('comments.php'); ?>
</div>
          </div>
          
          <!-- Sidebar -->
          <?php $this->need('sidebar.php'); ?>
          
        </div>
      </div>
    </div>
     <?php $this->need('footer.php'); ?>
    

