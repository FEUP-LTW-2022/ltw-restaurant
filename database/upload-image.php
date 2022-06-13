<?php

include_once("connection.php");

function upload($file)
{
// Include the database configuration file

  // Database connection
  $dbh = getDatabaseConnection();

  // Insert image data into database
  $mime = pathinfo($file['image']['name'],PATHINFO_EXTENSION);
  $stmt = $dbh->prepare("INSERT INTO photo (extension) VALUES (?)");
  $stmt->execute(array($mime));

  // Get image ID
  $id = $dbh->lastInsertId();

  // Create folders if they don't exist

  if (!is_dir('.images')) mkdir('images');
  if (!is_dir('.images/originals')) mkdir('images/originals');
  if (!is_dir('.images/thumbs_small')) mkdir('images/thumbs_small');
  if (!is_dir('.images/thumbs_medium')) mkdir('images/thumbs_medium');

  // Generate filenames for original, small and medium files

  $originalFileName = "images/originals/$id.$mime";
  $smallFileName = "images/thumbs_small/$id.$mime";
  $mediumFileName = "images/thumbs_medium/$id.$mime";

  // Move the uploaded file to its final destination
  move_uploaded_file($file['image']['tmp_name'], $originalFileName);

  // Crete an image representation of the original image
  $original = @imagecreatefromjpeg($originalFileName);
  if (!$original) $original = @imagecreatefrompng($originalFileName);
  if (!$original) $original = @imagecreatefromgif($originalFileName);

  if (!$original) die();

  $width = imagesx($original);     // width of the original image
  $height = imagesy($original);    // height of the original image
  $square = min($width, $height);  // size length of the maximum square

  // Create and save a small square thumbnail
  $small = imagecreatetruecolor(200, 200);
  imagecopyresized($small, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 200, 200, $square, $square);
  imagejpeg($small, $smallFileName);

  // Calculate width and height of medium sized image (max width: 400)
  $mediumwidth = $width;
  $mediumheight = $height;
  if ($mediumwidth > 400) {
    $mediumwidth = 400;
    $mediumheight = $mediumheight * ( $mediumwidth / $width );
  }

  // Create and save a medium image
  $medium = imagecreatetruecolor($mediumwidth, $mediumheight);
  imagecopyresized($medium, $original, 0, 0, 0, 0, $mediumwidth, $mediumheight, $width, $height);
  imagejpeg($medium, $mediumFileName);

  return $id;
}
function getPath($id){
    $db = getDatabaseConnection();
    $stmt = $db->prepare("SELECT * FROM photo where id = ?");
    $stmt->execute(array($id));

    return $stmt->fetch();
}
function getimage($id): string
{
    return "./images/originals/". $id .".".getPath($id)['extension'];
}

