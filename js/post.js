// 文章js
/*content高度*/
function initSize() {
    var height = $(window).height() - $("header").height() - $("#description").height() - $("#menu").height();
    $("#content").height(height + "px");
}