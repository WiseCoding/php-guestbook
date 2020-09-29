<?php

declare(strict_types=1);

// FORM SUBMIT NEW ENTRY
if (isset($_POST['submit']) && $_POST['submit'] === 'submit') {
  // INSTANTIATE POST
  $post = new savePosts();

  // SAVE POST
  $post->storePost();
}

// GET & SHOW OLD POSTS
$showPosts = new showPosts();

// SHOW # AMOUNT OF POSTS
if (isset($_POST['reviews'])) {
  $seeAmount = (int)$_POST['reviews'];
} else {
  $seeAmount = 10;
}
