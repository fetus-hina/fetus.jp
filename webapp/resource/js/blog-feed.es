jQuery($ => {
  const $container = $('#blog');

  $container
    .empty()
    .append(
      $('<span class="fas fa-cog fa-spin fa-3x fa-fw">')
    );

  $.get('https://blog.fetus.jp/feed')
    .then(
      document => {
        const $document = $(document);
        const $ul = $('<ul id="blog-entries">');
        $('channel item', $document).each((i, item) => {
          const $item = $(item);
          const at = new Date($('pubDate', $item).text()).toLocaleDateString();
          $ul.append(
            $('<li>')
              .append(
                `[${at}] `
              ).append(
                $('<a>')
                  .text($('title', $item).text())
                  .attr('href', $('link', $item).text())
              )
          );
        });
        $container.empty().append($ul);
      },
      () => {
        $container
          .empty()
          .append(
            $('<span class="fa fa-frown-o fa-3x fa-fw">')
          ).append(
            ' Error'
          );
      }
    );
});
