<?php

declare(strict_types=1);


if (isset($_POST['submit'])) {
  saveEntry();
  //clearPost();
}

function saveEntry()
{
  try {
    $path = "./data/entries.json";

    // Instantiate new Post
    $post = new Post();
    $new_entry = $post->getPost();

    $old_entries = file_get_contents($path);
    $entries = json_decode($old_entries, true);
    if ($entries !== null) {
      array_push($entries, $new_entry);
    } else {
      $entries = $new_entry;
    }

    // Encode all entries
    $new_entries = json_encode($entries, JSON_PRETTY_PRINT);

    // Save entries
    file_put_contents($path, $new_entries);

    // ECHO
    echo "success";
  } catch (\Throwable $th) {
    echo 'Error: ' .  $th . "<br />";
  }
}

function clearPost()
{
  $_POST = array();
  echo 'post cleared';
}
