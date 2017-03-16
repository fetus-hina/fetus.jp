($ => {
  $(() => {
    const $panels = $('.about-panels');
    let timer = null;
    $(window).resize(() => {
      if (timer) {
        clearTimeout(timer);
      }
      timer = setTimeout(() => {
        timer = null;
        $panels.height(
          Math.max.apply(
            null,
            $panels.map(
              (i, el) => $(el).height('').height()
            )
          )
        );
      }, 10);
    }).resize();
  });
})(jQuery);
