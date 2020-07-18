(function ($) {
  $(document).ready(function(){
    $('.carousel_item').first().addClass('active');

    $('.next').on('click', function(){
      var currentImg = $('.active');
      var nextImg = currentImg.next();

      if(nextImg.length){
        currentImg.removeClass('active');
        nextImg.addClass('active');
      }
      else {
        currentImg.removeClass('active');
        $('.carousel_item').first().addClass('active');
      }
    });

    $('.prev').on('click', function(){
      var currentImg = $('.active');
      var prevImg = currentImg.prev();

      if(prevImg.length){
        currentImg.removeClass('active');
        prevImg.addClass('active');
      }
      else {
        currentImg.removeClass('active');
        $('.carousel_item').last().addClass('active');
      }
    });
  });
})(jQuery);
