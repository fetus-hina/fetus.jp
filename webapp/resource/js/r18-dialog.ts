(($: JQueryStatic): void => {
  function findDialog (): JQuery {
    return $('#r18-dialog');
  }

  function findOkButton ($dialog: JQuery | null = null): JQuery {
    return $('#r18-dialog-ok', $dialog ?? findDialog());
  }

  let modal: BootstrapModalInstance | null = null;

  $((): void => {
    const dialog = findDialog().get(0);
    if (!dialog) {
      return;
    }
    modal = new bootstrap.Modal(dialog, {
      backdrop: 'static',
      focus: true,
      keyboard: true,
    });

    findOkButton().on('click', function (this: HTMLElement): void {
      if (modal) {
        modal.hide();
      }

      const $button = $(this);
      const link = $button.data('link') as HTMLAnchorElement | null;
      if (link) {
        window.open(link.href);
        $button.data('link', null);
      }
    });
  });

  $.fn.r18dialog = function (this: JQuery): JQuery {
    const $dialog = findDialog();
    const $secureIcon = $('#r18-dialog-link-secure', $dialog);
    const $linkOrigin = $('#r18-dialog-link-origin', $dialog);
    const $okButton = findOkButton($dialog);

    this.on('click', function (this: HTMLElement): boolean {
      if (!modal) {
        return true;
      }

      if (
        typeof window.HTMLAnchorElement !== 'undefined' &&
        this instanceof window.HTMLAnchorElement
      ) {
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
