$(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 100) {
        $("#main-menu").addClass("scrolling");
    } else {
        $("#main-menu").removeClass("scrolling");
    }
    var contentHeight = $('.main>.content').outerHeight();
    var sbLeftHeight = $('.sb-left .sticky').outerHeight();
    var sbRightHeight = $('.sb-right .sticky').outerHeight();
    var menuTop=$('.sticky-top').outerHeight();
    var deltaTop = menuTop+$('.title .cover').outerHeight();
    var widthLeft = $('.sb-left').outerWidth();
    var widthRight = $('.sb-right').outerWidth();
    if(scroll>deltaTop && scroll<deltaTop+contentHeight-sbLeftHeight)
    {
        $('.sb-left .sticky').css({'position':'fixed','top':(menuTop+10),'width':widthLeft});
    }
    else
    {
        $('.sb-left .sticky').css({'position':'static'});
    }
    if(scroll>deltaTop && scroll<deltaTop+contentHeight-sbRightHeight)
    {
        $('.sb-right .sticky').css({'position':'fixed','top':(menuTop+10),'width':widthRight});
    }
    else
    {
        $('.sb-right .sticky').css({'position':'static'});
    }
});
$('.sb-right ul ul').hide();
$('.sb-right i').click(function(){
    // alert($(this).attr('class'));
    if($(this).hasClass('fa-angle-down'))
    {
        $(this).removeClass('fa-angle-down');
        $(this).addClass('fa-angle-right');
        $('#'+$(this).attr('sub-id')).slideUp();
    }
    else
    {
        $(this).removeClass('fa-angle-right');
        $(this).addClass('fa-angle-down');
        $('#'+$(this).attr('sub-id')).slideDown();
    }
})