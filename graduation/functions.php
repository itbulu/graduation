<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $subtitle = new Typecho_Widget_Helper_Form_Element_Text('subtitle', NULL, NULL, _t('网站副标题：'), _t(''));
       
    $form->addInput($subtitle);
    
    
   $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());  
    
}

/*
* 无插件阅读数
*/
function get_post_view($archive)
{
$cid = $archive->cid;
$db = Typecho_Db::get();
$prefix = $db->getPrefix();
if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
$db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
echo 0;
return;
}
$row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
if ($archive->is('single')) {
$db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
}
echo $row['views'];
}

/*
* 随机缩略图
*/
function thumb($obj) {
    $rand_num = 3; //随机图片数量，根据图片目录中图片实际数量设置
    if ($rand_num == 0) {
        $imgurl = "./usr/themes/graduation/images/1.jpg";
        //如果$rand_num = 0,则显示默认图片，须命名为"0.jpg"，注意是绝对地址
    }else{
        $imgurl = "./usr/themes/graduation/images/".rand(1,$rand_num).".jpg";
            //随机图片，须按"1.jpg","2.jpg","3.jpg"...的顺序命名，注意是绝对地址
    }
    $attach = $obj->attachments(1)->attachment;
    if(isset($attach->isImage) && $attach->isImage == 1){
        $thumb = $attach->url;
    }else{
        $thumb = $imgurl;
    }
        return $thumb;
}

