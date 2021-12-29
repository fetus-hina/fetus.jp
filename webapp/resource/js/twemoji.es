(($, twemoji) => {
  $.fn.twemoji = function () {
    this.each(function () {
      twemoji.parse(this, {
        callback: function (icon, options) {
          switch (icon) {
            case 'a9': // © copyright
            case 'ae': // ® registered trademark
            case '2122': // ™ trademark
              return false;
            default:
              return ''.concat(options.base, options.size, '/', icon, options.ext);
          }
        },
        ext: '.svg',
        folder: 'svg'
      });
    });
    return this;
  };
})(jQuery, window.twemoji);
