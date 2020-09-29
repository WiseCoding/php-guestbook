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
    for ($i = 0; $i < count($posts); $i++) {
      echo '<div class="p-4 mx-8 my-4 text-white bg-gray-700 rounded-lg shadow-md">';
      echo '<p class="mb-2 font-mono text-lg font-bold">' . $posts[$i]['title'] . '</p>';
      echo '<p class="text-justify text-gray-400">' . $posts[$i]['content'] . '</p>';
      echo '<div class="flex justify-around mt-3">';
      echo '<p class="font-mono italic text-green-300">' . $posts[$i]['author'] . '</p>';
      echo '<p class="font-mono italic text-blue-300">' . $posts[$i]['date'] . '</p>';
      echo '</div>';
      echo '</div>';
    }
    /* foreach ($this->posts as $post) {
      echo '<div class="card">';
      echo   '<p class="mb-2 font-mono text-lg font-bold">' . $post['title'] . '</p>';
      echo   '<p class="text-justify text-gray-400">' . $post['content'] . '</p>';
      echo   '<div class="flex justify-around mt-3">';
      echo     '<p class="font-mono italic text-green-300">' . $post['author'] . '</p>';
      echo     '<p class="font-mono italic text-blue-300">' . $post['date'] . '</p>';
      echo   '</div>';
      echo '</div>';
    }*/
  }

  //TODO: Only 20 posts should show
  //TODO: Should show last post first
}
