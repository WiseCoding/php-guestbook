<?php

declare(strict_types=1);
session_start();

// MODEL
include "./model/script.php";
include "./model/entry.php";

// CONTROLLER
include "./controller/controller.php";

// VIEW
include "./view/view.php";

// DEBUG
debug();
