$('body').css('opacity',0);
setTimeout("changeOpacityPage();",10);
function changeOpacityPage()
{
    var op = parseFloat($('body').css('opacity'));
    op+=0.02;
    $('body').css('opacity',op);
    if(op!=1)
        setTimeout("changeOpacityPage();",20);
}
//$('#contact .frm').hide();
//$('#contact').css({'position':'fixed','bottom':'0px','width':'100%'});
$('#top-menu a.nav-link').click(function (event) {
    let target = $(this).attr("href");
    //let more = ((target=="#blog"||target=="#supp")?300:129);
    let more =129+(target=="#contact"?25:0);
    $('#top-menu a.nav-link').removeClass('active');
    $('#top-menu a.nav-link[href="'+target+'"]').addClass('active');
    $('html,body').stop().animate({
        scrollTop: ($(target).offset().top-more)
    }, 1000);
    
    event.preventDefault();
});