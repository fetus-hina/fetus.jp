(($: JQueryStatic, twemojiLib: TwemojiNamespace): void => {
  $.fn.twemoji = function (this: JQuery): JQuery {
    this.each(function (this: HTMLElement): void {
      twemojiLib.parse(this, {
        callback: (icon: string, options: { base: string; size: string; ext: string }): string | false => {
          switch (icon) {
            case 'a9': // (c) copyright
            case 'ae': // (R) registered trademark
            case '2122': // (TM) trademark
              return false;
            default:
              return ''.concat(options.base, options.size, '/', icon, options.ext);
          }
        },
        ext: '.svg',
        folder: 'svg',
      });
    });
    return this;
  };
})(jQuery, window.twemoji);
