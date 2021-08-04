<!-- 文章标题 -->
<div class="title">
        <div><?php $this->title(); ?></div>
        <span class="d-block badge badge-primary">#<?php $this->category(',', true, 'none'); ?>#</span>
        <div datetime="<?php $this->date('c'); ?>"><?php $this->date('F j, Y'); ?></div>
    </div>