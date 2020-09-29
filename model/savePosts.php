<?php

declare(strict_types=1);

class savePosts
{
  private $post = array();

  public function __construct()
  {
    $this->post = array(
      'title' => htmlspecialchars($_POST['title']),
      'content' => htmlspecialchars($_POST['content']),
      'author' => htmlspecialchars($_POST['author']),
      'date' => htmlspecialchars($_POST['date']),
    );
  }

  public function getPost(): array
  {
    return $this->post;
  }

  function storePost(): string
  {
    try {
      // Saving location entries
      $path = "./data/entries.json";
      // Get previous entries
      $entries = file_get_contents($path);
      $entries = json_decode($entries, true);
      // Add new entry
      $entries[] = $this->post;
      // Encode entries
      $entries = json_encode($entries, JSON_PRETTY_PRINT);
      // Save entries
      file_put_contents($path, $entries);
      return "Entry saved";
    } catch (\Throwable $th) {
      return 'Error: ' .  $th . "<br />";
    }
  }
}
