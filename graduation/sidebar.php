<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="sidebar" class="4u">
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
                        <section>
                            <header>
                                <h3><?php _e('最新文章'); ?></h3>
                            </header>
                            <ul class="style">
                                
<?php
$this->widget('Widget_Contents_Post_Recent','pageSize=6')->to($recent);
if($recent->have()):
while($recent->next()):
?>
<li><p class="posted"><?php $recent->date(); ?></p>
<img src="<?php echo thumb($this); ?>" height="70px" width="70px"/>
<p class="text"> <a href="<?php $recent->permalink();?>"><?php $recent->title();?></a></li>
<?php endwhile; endif;?>
                               
                            </ul>
                        </section>
                         <?php endif; ?>

<?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
                        <section>
                            <header>
                                <h3><?php _e('分类'); ?></h3>
                            </header>
                            <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
                        </section>
                         <?php endif; ?>


                          <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
                        <section>
                            <header>
                                <h3><?php _e('归档'); ?></h3>
                            </header>
                            <ul class="style">
                                <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
            ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
                               
                            </ul>
                        </section>
                         <?php endif; ?>

                          <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
                        <section>
                            <header>
                                <h3><?php _e('其它'); ?></h3>
                            </header>
                            <ul>
                                <?php if($this->user->hasLogin()): ?>
                <li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
                <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
            <?php else: ?>
                <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
            <?php endif; ?>
            <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
            <li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
            <li><a href="http://www.typecho.org">Typecho</a></li>
                               
                            </ul>
                        </section>
                         <?php endif; ?>
                    </div>
