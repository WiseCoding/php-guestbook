<?php

declare(strict_types=1);

class showPosts
{
  private $posts;

  public function __construct()
  {
    $this->posts = $this->openPosts();
  }

  public function openPosts()
  {
    try {
      // Posts location
      $path = "./data/entries.json";
      // Get entries
      $entries = file_get_contents($path);
      // Decode entries
      return json_decode($entries, true);
    } catch (\Throwable $th) {
      return 'Error: ' .  $th . "<br />";
    }
  }

  public function printPosts($amount)
  {
    $posts = $this->posts;
    $high = count($posts);

    if ((count($posts) - $amount) < 0) {
      $low = 0;
    } else {
      $low = count($posts) - $amount;
    }

    for ($i = $high - 1; $i >= $low; $i--) {
      echo '<div class="p-4 mx-8 my-4 text-white bg-gray-700 rounded-lg shadow-md">';
      echo  '<p class="mb-2 font-mono text-lg font-bold">' . $posts[$i]['title'] . '</p>';
      echo  '<p class="text-justify text-gray-400">' . $posts[$i]['content'] . '</p>';
      echo  '<div class="flex justify-around mt-3">';
      echo   '<p class="font-mono italic text-green-300">' . $posts[$i]['author'] . '</p>';
      echo   '<p class="font-mono italic text-blue-300">' . $posts[$i]['date'] . '</p>';
      echo  '</div>';
      echo '</div>';
    }
  }
}
