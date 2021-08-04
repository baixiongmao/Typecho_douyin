<?php
    /**
 * 仿抖音图片模板
 *
 * @package 仿抖音图片模板
 * @author pand
 * @version 1.0.0
 * @link https://www.32tu.com/
 */
    if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
    <?php
    $db = Typecho_Db::get();
    $sql = $db->select('MAX(cid)')->from('table.contents')
        ->where('status = ?','publish')
        ->where('type = ?', 'post')
        ->where('created <= unix_timestamp(now())', 'post');
    $result = $db->fetchAll($sql);
    $max_id = $result[0]['MAX(`cid`)'];
    $sql = $db->select('MIN(cid)')->from('table.contents')
        ->where('status = ?','publish')
        ->where('type = ?', 'post')
        ->where('created <= unix_timestamp(now())', 'post');
    $result = $db->fetchAll($sql);
    $min_id = $result[0]['MIN(`cid`)'];
    $result = NULL;
    while($result == NULL) {
        $rand_id = mt_rand($min_id,$max_id);
        $sql = $db->select()->from('table.contents')
            ->where('status = ?','publish')
            ->where('type = ?', 'post')
            ->where('created <= unix_timestamp(now())', 'post')
            ->where('cid = ?',$rand_id);
        $result = $db->fetchAll($sql);
    }
    ?>
    <!--跳转文章-->
    <?php $target = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($result['0']); ?>
    <!--开始跳转-->
      <?php $this->response->redirect($target['permalink'],307); ?>