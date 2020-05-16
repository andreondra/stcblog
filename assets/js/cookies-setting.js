COOKIES_ENABLER.init({
    scriptClass: 'ce-script',
    iframeClass: 'ce-iframe',

    acceptClass: 'ce-accept',
    dismissClass: 'ce-dismiss',
    disableClass: 'ce-disable',

    bannerClass: 'ce-banner',
    /*bannerHTML:
        '<p>Tento web používá soubory cookies. '
            +'<a href="#" class="ce-accept">'
                +'Souhlasím'
            +'</a>'
        +'</p>',*/

    eventScroll: false,
    scrollOffset: 200,

    clickOutside: false,

    cookieName: 'ce-cookie',
    cookieDuration: '365',
    wildcardDomain: false,

    iframesPlaceholder: false,
    iframesPlaceholderHTML:
        '<p>To view this content you need to'
            +'<a href="#" class="ce-accept">Enable Cookies</a>'
        +'</p>',
    iframesPlaceholderClass: 'ce-iframe-placeholder',

    // Callbacks
    onEnable: '',
    onDismiss: '',
    onDisable: ''
    });
