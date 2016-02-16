$(document).ready(function() {
    $("#list").click(function() {
        $('.search').css({
            "width" : "98%",
            "height" : "50px"
        })
    });
    $("#grid").click(function() {
        $('.search').css({
            "width" : "22.65%",
            "height" : "100px"
        })
    });
});