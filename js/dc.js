$(window).load(function(){
  $('.thumb').each(function(){
    var img = new Image();
    img.src = $(this).data('thumb');
    $(this).find('.size').before(img);
  });
});
