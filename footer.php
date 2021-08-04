<!-- 文章底部 -->
<script src="<?php echo $this->options->themeUrl ?>/js/swiper-bundle.min.js"></script>
<script>
        var swiper = new Swiper('.swiper-container', {
            direction: 'vertical',
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
