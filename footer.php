<!-- 文章底部 -->
<script src="<?php echo $this->options->themeUrl ?>/js/swiper-bundle.min.js"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery_lazyload/1.9.7/jquery.lazyload.min.js"></script>
<script>
        var swiper = new Swiper('.swiper-container', {
            direction: 'vertical',
            lazy: {
                loadPrevNext: true,
                loadPrevNextAmount: 2,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                type: 'fraction',
            },
        });
    </script>
<script src="<?php echo $this->options->themeUrl ?>/js/post.js"></script>
<?php $this->options->zztj(); ?>
</body>
</html>
