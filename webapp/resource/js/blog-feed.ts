jQuery(($: JQueryStatic): void => {
  const $container = $('#blog');

  $container
    .empty()
    .append(
      $('<span class="fas fa-cog fa-spin fa-3x fa-fw">')
    );

  $.get('https://blog.fetus.jp/feed')
    .then(
      (document: Document | XMLDocument | string): void => {
        const $document = $(document as unknown as Document);
        const $ul = $('<ul id="blog-entries">');
        $('channel item', $document).each((_i: number, item: Element): void => {
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
      (): void => {
        $container
          .empty()
          .append(
            $('<span class="far fa-frown fa-3x fa-fw">')
          ).append(
            ' Error'
          );
      }
    );
});
