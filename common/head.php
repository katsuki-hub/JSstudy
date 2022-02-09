<!-- Google Tag Manager -->
<script>
  (function(w, d, s, l, i) {
    w[l] = w[l] || [];
    w[l].push({
      'gtm.start': new Date().getTime(),
      event: 'gtm.js'
    });
    var f = d.getElementsByTagName(s)[0],
      j = d.createElement(s),
      dl = l != 'dataLayer' ? '&l=' + l : '';
    j.async = true;
    j.src =
      'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
    f.parentNode.insertBefore(j, f);
  })(window, document, 'script', 'dataLayer', 'GTM-P2ZWXCZ');
</script>
<!-- End Google Tag Manager -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta http-equiv="x-ua-compatible" content="IE=edge">
<title><?= $title ?></title>
<meta name="description" content="WEBプログラミング入門編の学習技術ブログです。初級編～中級編までアップします。どんなソースコードで作成されているのか？ソースコードと概要を分かりやすく説明しています">
<meta name="keywords" content="JavaScript,プログラミング,技術ブログ,ソースコード,PHP,jQuery">
<link href="../css/style.css" rel="stylesheet" type="text/css">
<link rel="icon" type="image/x-icon" href="../favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="192x192" href="../android-touch-icon.png">
<meta property="og:title" content="WEBプログラミング学習帳～簡単解説！基本コード～">
<meta property="og:type" content="website">
<meta property="og:description" content="WEBプログラミング超入門編の学習技術ブログです。どんなソースコードで作成されているのか？ソースコードと概要を分かりやすく説明しています">
<meta property="og:url" content="https://katsu-study.work/">
<meta property="og:site_name" content="JavaScript学習帳">
<meta property="og:image" content="https://katsu-study.work/images/js.png">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="WEBプログラミング講座">
<link rel="apple-touch-icon" href="../apple-touch-icon.png">
<link rel="manifest" href="../manifest.json">
<script>
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('sw.js')
      .then((reg) => {
        console.log('Service worker registered.', reg);
      });
  }
</script>