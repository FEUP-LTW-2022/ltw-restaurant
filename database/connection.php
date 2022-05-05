<?php

  function getDatabaseConnection() {
    return new PDO('sqlite:database/news.db');
  }

?>