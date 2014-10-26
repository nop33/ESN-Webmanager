/**
 * parallax.js
 * @Author original @msurguy (tw) -> http://bootsnipp.com/snippets/featured/parallax-login-form
 * @Tested on FF && CH
 * @Reworked by @kaptenn_com (tw)
 * @package PARALLAX LOGIN.
 */

$(document).ready(function() {
    var hei = 320
    var wid = 280
    $(document).mousemove(function(event) {
        TweenLite.to($("body"), 
        .5, {
            css: {
                backgroundPosition: "" + parseInt((event.pageX / 8) - wid) + "px " + parseInt((event.pageY / '12') - hei) + "px, " + parseInt((event.pageX / '15') - wid) + "px " + parseInt((event.pageY / '15') - hei) + "px, " + parseInt((event.pageX / '30') - wid) + "px " + parseInt((event.pageY / '30') - hei) + "px",
                "background-position": parseInt((event.pageX / 8) - wid) + "px " + parseInt((event.pageY / 12) - hei) + "px, " + parseInt((event.pageX / 15) - wid) + "px " + parseInt((event.pageY / 15) - hei) + "px, " + parseInt((event.pageX / 30) - wid) + "px " + parseInt((event.pageY / 30) - hei) + "px"
            }
        })
    })
})