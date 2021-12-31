($ => {
  function findDialog () {
    return $('#r18-dialog');
  }

  function findOkButton ($dialog = null) {
    return $('#r18-dialog-ok', $dialog ?? findDialog());
  }

  let modal = null;

  $(function () {
    modal = new bootstrap.Modal(findDialog(), {
      backdrop: 'static',
      focus: true,
      keyboard: true
    });

    findOkButton().click(function () {
      if (modal) {
        modal.hide();
      }

      const $button = $(this);
      const link = $button.data('link');
      if (link) {
        window.open(link.href);
        $button.data('link', null);
      }
    });
  });

  $.fn.r18dialog = function () {
    const $dialog = findDialog();
    const $secureIcon = $('#r18-dialog-link-secure', $dialog);
    const $linkOrigin = $('#r18-dialog-link-origin', $dialog);
    const $okButton = findOkButton($dialog);

    this.click(function () {
      if (!modal) {
        return true;
      }

      if (this instanceof HTMLAnchorElement) {
        if (this.protocol === 'https:') {
          $secureIcon.show();
        } else {
          $secureIcon.hide();
        }
        $linkOrigin.text(this.host);
        $okButton.data('link', this);
      } else {
        $secureIcon.hide();
        $linkOrigin.text('');
        $okButton.data('link', null);
      }

      modal.show();

      return false;
    });

    return this;
  };
})(jQuery);
