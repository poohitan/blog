/*$(".datatable tr").on("mouseover", function() {
    $(this).css("z-index", "9999");
    
    var degree = Math.random() * 2 -1;
    $(this).animate({  borderSpacing: degree + 'deg' }, {
        step: function(now, fx) {
          $(this).css('-webkit-transform', 'rotate(' + now + 'deg)'); 
          $(this).css('-moz-transform', 'rotate(' + now + 'deg)');
          $(this).css('transform', 'rotate(' + now + 'deg)');
        },
        duration: 50
    });
});


$(".datatable tr").on("mouseleave", function() {
    $(this).css("z-index", "0");
    $(this).css("transform", "rotate(0)");
});*/

$(".datatable tr").on("mouseover", function() {
    $(this).addClass("highlighted");
});

$(".datatable tr").on("mouseleave", function() {
    $(this).removeClass("highlighted");
});