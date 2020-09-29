<?php

declare(strict_types=1);

class Post
{
  private $post = array();

  public function __construct()
  {
    //TODO: check if all posts are filled in! if not produce error.
    // construct post
    $this->constructPost();
  }

  public function constructPost()
  {
    $this->post = array(
      'title' => $_POST['title'],
      'content' => $_POST['content'],
      'author' => $_POST['author'],
      'date' => $_POST['date'],
    );
  }

  public function getPost()
  {
    return $this->post;
  }
}
