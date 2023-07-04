// https://developer.twitter.com/en/docs/twitter-for-websites/web-intents/overview
(function () {
  if (window.__twitterIntentHandler) {
    return;
  }

  const intentRegex = /twitter\.com\/intent\/(\w+)/;
  const windowOptions = 'scrollbars=yes,resizable=yes,toolbar=no,location=yes';
  const width = 550;
  const height = 420;
  const winHeight = window.screen.height;
  const winWidth = window.screen.width;

  function handleIntent (e) {
    e = e || window.event;
    let target = e.target || e.srcElement;
    let m;
    let left;
    let top;

    while (target && target.nodeName.toLowerCase() !== 'a') {
      target = target.parentNode;
    }

    if (target && target.nodeName.toLowerCase() === 'a' && target.href) {
      m = target.href.match(intentRegex);
      if (m) {
        left = Math.round((winWidth / 2) - (width / 2));
        top = 0;

        if (winHeight > height) {
          top = Math.round((winHeight / 2) - (height / 2));
        }

        window.open(
          target.href,
          'intent',
          windowOptions + ',width=' + width + ',height=' + height + ',left=' + left + ',top=' + top
        );
        e.returnValue = false;
        e.preventDefault && e.preventDefault();
      }
    }
  }

  if (document.addEventListener) {
    document.addEventListener('click', handleIntent, false);
  } else if (document.attachEvent) {
    document.attachEvent('onclick', handleIntent);
  }
  window.__twitterIntentHandler = true;
}());
