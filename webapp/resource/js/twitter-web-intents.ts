// https://developer.twitter.com/en/docs/twitter-for-websites/web-intents/overview
((): void => {
  if (window.__twitterIntentHandler) {
    return;
  }

  const intentRegex = /twitter\.com\/intent\/(\w+)/;
  const windowOptions = 'scrollbars=yes,resizable=yes,toolbar=no,location=yes';
  const width = 550;
  const height = 420;
  const winHeight = window.screen.height;
  const winWidth = window.screen.width;

  function handleIntent (e?: Event): void {
    const ev = e ?? (window as unknown as { event?: Event }).event;
    if (!ev) {
      return;
    }

    let target: Node | null = (ev.target ?? ev.srcElement) as Node | null;

    while (target && target.nodeName.toLowerCase() !== 'a') {
      target = target.parentNode;
    }

    if (target instanceof HTMLAnchorElement && target.href) {
      const m = target.href.match(intentRegex);
      if (m) {
        const left = Math.round((winWidth / 2) - (width / 2));
        const top = (winHeight > height)
          ? Math.round((winHeight / 2) - (height / 2))
          : 0;

        window.open(
          target.href,
          'intent',
          windowOptions + ',width=' + width + ',height=' + height + ',left=' + left + ',top=' + top
        );
        ev.returnValue = false;
        if (ev.preventDefault) {
          ev.preventDefault();
        }
      }
    }
  }

  if (document.addEventListener) {
    document.addEventListener('click', handleIntent, false);
  } else {
    const legacyDoc = document as unknown as {
      attachEvent?: (event: string, handler: (e: Event) => void) => boolean;
    };
    if (legacyDoc.attachEvent) {
      legacyDoc.attachEvent('onclick', handleIntent);
    }
  }
  window.__twitterIntentHandler = true;
})();
