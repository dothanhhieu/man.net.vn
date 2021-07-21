// $(window).scroll(function() {
    
//     var hT = $('#supp').offset().top,
//         hH = $('#supp').outerHeight(),
//         wH = $(window).height(),
//         wS = $(this).scrollTop();
//     if (wS > (hT+hH-wH)){
//         console.log('supp on the view!');
//     }
//  });
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