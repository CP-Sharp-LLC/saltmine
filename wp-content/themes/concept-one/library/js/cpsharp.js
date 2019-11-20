/*global cpsharp*/

let store = {'footer': null, 'myGif': null, 'cpsharp': cpsharp, 'svgStore': null};

jQuery(document).ready(function () {
    menuLogoLinkToAnchor();
    checkHeader();
    focusPopups();
});

function checkHeader() {
    var scrollTop = jQuery(document).scrollTop();
    if (scrollTop < 26) {
        jQuery('.mainheader').removeClass('scrolled');
    } else if (scrollTop >= 26) {
        jQuery('.mainheader').addClass('scrolled');
    }

    setTimeout(checkHeader, 5);
}

function focusPopups() {
    jQuery('a[href="#marketplace"]').click(function () {
        setTimeout("jQuery('#wpcf7-f669-o3 > form > p > span.wpcf7-form-control-wrap.customer-name > input').focus();", 250);
    });

    jQuery('a[href="#request-demo"]').mouseup(function () {
        setTimeout("jQuery('#wpcf7-f302-o4 > form > p > span.wpcf7-form-control-wrap.customer-name > input').focus();", 250);
    });

    jQuery('#get-started').mouseup(function () {
        setTimeout("jQuery('#wpcf7-f302-o4 > form > p > span.wpcf7-form-control-wrap.customer-name > input').focus();", 250);
    });
}

function menuLogoLinkToAnchor() {
    jQuery("#logo > a").attr('href', '#home');
}