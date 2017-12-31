$(document).ready(function () {
// Javascript to enable link to tab
    var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
        console.log(url.split('#')[1]);
    }

    // Change hash for page-reload
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash;
    });

    $('.register-link').on('click', function () {
        $('.nav-tabs a[href="#register"]').tab('show');
    });

    $('#goto-login-tab').on('click', function () {
        $('.nav-tabs a[href="#login"]').tab('show');
    });
});
/*
$(document).ready(function () {
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = this.href.split('#');
        $('.nav a').filter('[href="#'+target[1]+'"]').tab('show');
    });
});*/
