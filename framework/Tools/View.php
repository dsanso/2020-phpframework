<?php

namespace framework\Tools;

class View
{
  public static function get(string $name, array $variables = [])
  {
    $fileName = $name . '.view.html';
    $path = Path::getApp() . 'Views/' . $fileName;

    if (!file_exists($path))
    {
      echo "Framework Error: View template not found! (Missing: $fileName)";
      exit();
    }

    $html = file_get_contents($path);

    $lastComponentName = '';

    while (preg_match_all('/{{.*?}}/', $html, $matches, PREG_OFFSET_CAPTURE))
    {
      $snippets = $matches[0];
      $offset_difference = 0;

      foreach ($snippets as $snippet)
      {
        $snippetText = substr($snippet[0], 2, -2);
        $snippetOffset = $snippet[1];

        $replacementContent = '';

        if (isset($variables[$snippetText]) && is_string($variables[$snippetText]))
        {
          $replacementContent = htmlspecialchars($variables[$snippetText], ENT_QUOTES, 'UTF-8', true);
        }
        elseif (preg_match('/^!.*!$/', $snippetText))
        {
          $snippetText = substr($snippetText, 1, -1);

          if (isset($variables[$snippetText]) && is_string($variables[$snippetText]))
          {
            $replacementContent = $variables[$snippetText];
          }
        }
        elseif (substr($snippetText, 0, 1) == '@')
        {
          $snippetText = substr($snippetText, 1);

          if ($lastComponentName != $snippetText)
          {

            $componentFileName = $snippetText . '.component.html';
            $componentPath = Path::getApp() . 'Views/Components/' . $componentFileName;

            if (!file_exists($componentPath))
            {
              echo "Framework Error: View component not found! (Missing: $componentFileName)";
              exit();
            }

            $replacementContent = file_get_contents($componentPath);
            $replacementContent = preg_replace('/(^\n+|\n+$)/', '', $replacementContent);
          }
        }

        $html = substr_replace($html, $replacementContent, $snippetOffset + $offset_difference, strlen($snippet[0]));
        $offset_difference += strlen($replacementContent) - strlen($snippet[0]);
      }

      $lastComponentName = $snippetText;
    }

    return $html;
  }
}
