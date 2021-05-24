jQuery($ => {
  const $btn = $('<a href="#" class="d-none floating-action-button bg-dark text-light" aria-hidden="true">')
    .append('<i class="fas fa-angle-up">');

  $('.wrap').append($btn);

  const $window = $(window);
  let timerId = null;
  $window.on('scroll', function () {
    if (timerId) {
      window.clearTimeout(timerId);
      timerId = null;
    }
    timerId = window.setTimeout(
      function () {
        timerId = null;

        if ($window.scrollTop() > 100) {
          $btn.removeClass('d-none');
        } else {
          $btn.addClass('d-none');
        }
      },
      0.05 * 1000
    );
  });

  $(window).scroll();
});
