jQuery(document).ready(function($){

    $('.main-slider').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        items: 1,
        autoplay: true,
        autoplayTimeout: 5000,
        navText : ["<i class='ri-arrow-left-line'></i>","<i class='ri-arrow-right-line'></i>"]
    })

    $('.owl-nav').css("width", $(".owl-dots").width() + 50);

    $('[data-trigger="view3d"]').click(function(){
        if($('.modal-view3d').hasClass("show")) {
            $('#view3d').html(view3D);

            $("#enscapeframe").on("mouseenter", function() {
                $(this).focus();
            });
        }
    })

    $('.modal-view3d .modal-close').click(function(){
        $('#view3d').empty();
    })
    
})

const view3D = `<iframe id="enscapeframe" src="https://api2.enscape3d.com/v1/view/1bdd5d91-cd8a-4a3f-8bce-a7f48d49b624" width="100%" height="${screen.width <= 991 ? screen.height - 100 : screen.height - 300}" style="border: 0;border-radius: 20px"></iframe>`;