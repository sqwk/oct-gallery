$(document).ready(function() {
    //Custom Js Start
    'use strict';

    /*
    Initialize the gallery with Owl Carousel
     */
    if ($(".gallery_in_post").length){
        $(".gallery_in_post").owlCarousel({
            autoplay: false,
            loop: true,
            items:1,
            margin:10,
            autoHeight:true,
            nav: true,
            dots: false
        });
    }

    /*
    Initialize the litebox for the photo gallery
     */
    if ($(".pretty").length) {
        $("a[rel^='prettyPhoto']").prettyPhoto({
            animation_speed: 'normal',
            counter_separator_label: ' de ',
            theme: 'pp_default',
            social_tools: false
        });
    }
});