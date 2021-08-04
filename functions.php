<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {

	$db = Typecho_Db::get();
$sjdq=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:splinx'));
$ysj = $sjdq['value'];
if(isset($_POST['type']))

	 
	echo '<link href="https://fonts.googleapis.com/css?family=Noto+Sans+SC:300|Noto+Serif+SC:300&display=swap" rel="stylesheet">';
	echo '<div class="miracles-pannel">
	<h1>SpLinx 主题设置面板</h1>
	
	作者博客：<a href="https://spinyue.com/">悦图Yue\'s</a> | 问题反馈：<a href="https://spinyue.com/3">Splinx反馈页面</a>
	</p>
	</div>';
     $highweb = new Typecho_Widget_Helper_Form_Element_Select('highweb',array('0'=>'白天模式','1'=>'夜间模式','2'=>'自动模式'),'0','界面白天/夜晚模式，自动模式：晚上7点开始-凌晨5点期间显示夜间模式','');
    $form->addInput($highweb);

    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('<hr><h2>网站基本设置 Info</h2><hr>站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $form->addInput($logoUrl);
    $favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, NULL, _t('favicon地址'), _t('一般为http://www.yourblog.com/image.png,支持 https:// 或 //,留空则不设置favicon'));
    $form->addInput($favicon);
  
    $icp = new Typecho_Widget_Helper_Form_Element_Text('icp', NULL, 'Copyright © SP. 粤ICP备17062710号-3', _t('备案号'), _t('在这里填入你的网站备案号， 例如：鄂ICP备xxxxx号-1'));
    $form->addInput($icp);   

    $zztj = new Typecho_Widget_Helper_Form_Element_Text('zztj', NULL, NULL, _t('网站统计代码'), _t('在这里填入你的网站统计代码，这个可以到百度统计或者cnzz上申请。'));
    $form->addInput($zztj);

    $imghdp = new Typecho_Widget_Helper_Form_Element_Text('imghdp', NULL, '1,2,3,4', _t('<hr><h2>网站个性化设置 Set</h2><hr>首页轮显文章ID'), _t('在这里填入轮显文章ID,支持多填'));
    $form->addInput($imghdp);

    $bianad = new Typecho_Widget_Helper_Form_Element_Text('bianad', NULL, NULL, _t('<hr><h2>广告位设置 Ad</h2>边栏广告（广告图片）'), _t('格式为：&lt;a rel="nofollow" target="_blank" href="//xxxx.cn"&gt;&lt;img src="xxxx.jpg"&gt;&lt;/a&gt;'));
    $form->addInput($bianad);

}

//博客最后更新时间
function get_last_update(){
    $num   = '1'; //取最近的一笔就好了
    $now = time();
    $db     = Typecho_Db::get();
    $prefix = $db->getPrefix();
    $create = $db->fetchRow($db->select('created')->from('table.contents')->limit($num)->order('created',Typecho_Db::SORT_DESC));
    $update = $db->fetchRow($db->select('modified')->from('table.contents')->limit($num)->order('modified',Typecho_Db::SORT_DESC));
    if($create>=$update){  //发表时间和更新时间取最近的
      echo Typecho_I18n::dateWord($create['created'], $now); //转换为更通俗易懂的格式
    }else{
      echo Typecho_I18n::dateWord($update['modified'], $now);
    }
}

/**
* 阅读统计
* 调用<?php get_post_view($this); ?>
*/
function Postviews($archive) {
    $db = Typecho_Db::get();
    $cid = $archive->cid;
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `'.$db->getPrefix().'contents` ADD `views` INT(10) DEFAULT 0;');
    }
    $exist = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid))['views'];
    if ($archive->is('single')) {
        $cookie = Typecho_Cookie::get('contents_views');
        $cookie = $cookie ? explode(',', $cookie) : array();
        if (!in_array($cid, $cookie)) {
            $db->query($db->update('table.contents')
                ->rows(array('views' => (int)$exist+1))
                ->where('cid = ?', $cid));
            $exist = (int)$exist+1;
            array_push($cookie, $cid);
            $cookie = implode(',', $cookie);
            Typecho_Cookie::set('contents_views', $cookie);
        }
    }
    echo $exist == 0 ? '' : $exist.' ';
}
function content_img($content){
    $fullcontent = $this->content;
   $reg = '/(http:|https:)(.*?)(.jpg|.png|.gif|.jpeg)/i';
   $matches = array();
   preg_match_all($reg, $fullcontent, $matches);
   $countPostImg = count($matches[0]);
   for ($k=0; $k < $countPostImg; $k++) { 
   echo ' <div class="swiper-slide"><img src="'.$matches[0][$k].'" alt="'.$this->title.'"/></div>';}
}

function img_lazy_load($ct){
    $imgplaceholder = Helper::options()->themeUrl."/s/img/loadingi.gif";
    return preg_replace("/<img(.*?)src=[\"|'](.*?)[\"|'](.*?)>/i","<img src='".$imgplaceholder."'$1data-original='$2'$3>",$ct);
}