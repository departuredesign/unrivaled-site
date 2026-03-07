<?php
/**
 * 404 page — show a simple not-found message.
 *
 * Previously this did a 301 redirect to the homepage, which masked
 * broken URLs and made debugging impossible. Now it returns a proper
 * 404 status so issues are visible.
 */
$assets = get_theme_file_uri( "assets/" );
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
  <style>
    @font-face {
      font-family: 'Review';
      src: url('<?php echo $assets; ?>fonts/review-bold-webfont.woff2') format('woff2'),
           url('<?php echo $assets; ?>fonts/review-bold-webfont.woff') format('woff');
      font-weight: 700;
      font-style: normal;
      font-display: swap;
    }
    @font-face {
      font-family: 'Neue Plak';
      src: url('<?php echo $assets; ?>fonts/neue_plak_regular-webfont.woff2') format('woff2'),
           url('<?php echo $assets; ?>fonts/neue_plak_regular-webfont.woff') format('woff');
      font-weight: 400;
      font-style: normal;
      font-display: swap;
    }
    :root {
      --color-navy: #1D2468;
      --color-red: #FF0000;
      --color-white: #FFFFFF;
      --font-display: 'Review', 'Arial Black', sans-serif;
      --font-ui: 'Neue Plak', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    }
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: var(--font-ui);
      background: var(--color-navy);
      color: var(--color-white);
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      text-align: center;
      padding: 40px 20px;
    }
    .error-wrap { max-width: 480px; }
    .error-wrap h1 {
      font-family: var(--font-display);
      font-size: clamp(48px, 10vw, 96px);
      line-height: 1;
      color: var(--color-red);
      margin-bottom: 16px;
    }
    .error-wrap p {
      font-size: 18px;
      line-height: 1.5;
      margin-bottom: 32px;
      opacity: 0.8;
    }
    .error-wrap a {
      display: inline-block;
      color: var(--color-white);
      border: 2px solid var(--color-white);
      padding: 12px 32px;
      text-decoration: none;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      transition: background 250ms ease, color 250ms ease;
    }
    .error-wrap a:hover {
      background: var(--color-white);
      color: var(--color-navy);
    }
  </style>
</head>
<body>
  <div class="error-wrap">
    <h1>404</h1>
    <p>The page you're looking for doesn't exist.</p>
    <a href="<?php echo home_url( '/' ); ?>">Back to Home</a>
  </div>
<?php wp_footer(); ?>
</body>
</html>
