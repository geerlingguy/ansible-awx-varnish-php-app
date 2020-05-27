<?php
date_default_timezone_set('America/Chicago');
$datetime = date('Y-m-d h:i:s a', time());
?>
<html>
<head>
  <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css" integrity="sha384-cg6SkqEOCV1NbJoCu11+bm0NvBRc8IYLRGXkmNrqUBfTjmMYwNKPWBTIKyw9mHNJ" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="splash-container" style="background-color: {{ background_color }}">
    <div class="splash">
      <h1 class="splash-head">Hello, Ansiblings!</h1>
      <p class="splash-subhead">It is currently: <?php print $datetime; ?></p>
      <p><a class="pure-button pure-button-primary" href="http://{{ inventory_hostname }}/">Server: <code>{{ inventory_hostname }}</code></a></p>
      <p><a class="pure-button" style="background-color: #e4572e" href="http://{{ groups['varnish'][0] }}/">Varnish Load Balancer: <code>{{ groups['varnish'][0] }}</code></a></p>
    </div>
  </div>
</body>
</html>
