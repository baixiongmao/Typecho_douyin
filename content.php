<!-- 文章内容 -->
<div class="swiper-container">
    <div class="swiper-wrapper">
   <?php
   $fullcontent = $this->content;
   $reg = '/(http:|https:)(.*?)(.jpg|.png|.gif|.jpeg)/i';
   $matches = array();
   preg_match_all($reg, $fullcontent, $matches);
   $countPostImg = count($matches[0]);
   for ($k=0; $k < $countPostImg; $k++) { 
   echo ' <div class="swiper-slide "><img src="<?php echo $this->options->themeUrl ?>/img/loading.gif" class="swiper-lazy" data-src="'.$matches[0][$k].'" alt="'.$this->title.'"/></div>';}
   ?>
 </div>  
 <div class="swiper-pagination"></div>
 </div> 