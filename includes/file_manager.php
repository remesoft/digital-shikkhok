<?php

// Delete file
function delete_file($directory, $name)
{
  $file_path = $directory . $name;
  if (file_exists($file_path)) {
    unlink($file_path);
  }
}
