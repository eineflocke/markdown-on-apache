<?php
if (isset($_SERVER['PATH_TRANSLATED'])) {
  $file = realpath($_SERVER['PATH_TRANSLATED']);
}

if ($file and is_readable($file)) {
  $markdown = file_get_contents($file);
} else {
  $markdown = '<p>cannot read file</p>';
}

$title = $_SERVER["REQUEST_URI"];

foreach (preg_split('/\n/', $markdown) as $line) {
  if (substr($line, 0, 1) == '#') {
    $title = preg_replace('/^#+\s*/', '', $line);
    break;
  }
}
?>
<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8" />
    <title><?php print $title; ?></title>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
      #markup { margin: 20px; }
    </style>
  </head>
  <body>
  <div id="markdown" style="display: none;"><?php print $markdown; ?></div>
  <div id="markup"></div>
  <script>
    document.querySelector('#markup').innerHTML = marked(document.querySelector('#markdown').innerHTML);
  </script>
  </body>
</html>

