<?php

use logic\Path;

function view(string $viewName, array $params = [])
{
  $viewFileName = $viewName . '.view.php';
  $path = Path::getApp() . 'Views/' . $viewFileName;

  if (file_exists($path))
  {
    $template = file_get_contents($path);

    foreach ($params as $key => $value)
    {
      $regex = '/{{ \$' . $key . ' }}/';
      $template = preg_replace($regex, $value, $template);
    }

    $regex = '/{{.*?}}/';
    $template = preg_replace($regex, "", $template);

    return $template;
  }
  else
  {
    echo "Framework Error: View template not found! (Missing: $viewFileName)";
  }
}
