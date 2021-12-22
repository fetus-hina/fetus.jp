jQuery($ => {
  // From Bootstrap Icons "bi-chevron-bar-up"
  // https://icons.getbootstrap.com/icons/chevron-bar-up/
  const svg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">' +
    '<path fill-rule="evenodd" ' +
    'd="M3.646 11.854a.5.5 0 0 0 .708 0L8 8.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 ' +
    '.708zM2.4 5.2c0 .22.18.4.4.4h10.4a.4.4 0 0 0 0-.8H2.8a.4.4 0 0 0-.4.4z"/>' +
    '</svg>';

  const $btn = $('<a href="#" class="d-none floating-action-button bg-dark text-light" aria-hidden="true">')
    .append(svg);

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
