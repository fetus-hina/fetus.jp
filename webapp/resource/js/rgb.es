jQuery($ => {
  const $tags = $('.rgb');
  $tags.each(function () {
    const $this = $(this);
    const match = $this.text().match(/#[0-9a-fA-F]{6}\b/);
    if (match) {
      $this.append(
        $('<span>')
          .addClass(
            [
              'align-middle',
              'border-1',
              'border-dark',
              'd-inline-block',
              'mx-1'
            ].join(' ')
          )
          .attr('aria-hidden', 'true')
          .css({
            backgroundColor: match[0],
            borderStyle: 'solid',
            height: '1em',
            width: '1.618em'
          })
      );
    }
  });
});
