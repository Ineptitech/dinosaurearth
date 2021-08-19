<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
  include 'lib.inc';
  if (($_SERVER['REQUEST_METHOD'] = 'POST') && (isset($_POST['submit']))) {

    switch ($_POST['type']) {
      case "upload-image":
        //Validate and sanitize ALL variables
        $image = $_FILES['image'];
        $categoryid = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
        $comment = filter_var($_POST['comment'], FILTER_SANITIZE_SPECIAL_CHARS);
        $credittext = filter_var($_POST['credittext'], FILTER_SANITIZE_SPECIAL_CHARS);
        $creditlink = filter_var($_POST['creditlink'], FILTER_SANITIZE_URL);
        if (!getimagesize($image["tmp_name"])) {
          $response = "Invalid file.";
         break;
        }
        $filename = date('m-d-Y-H-i-s', time())."-".$image['name'];
        $target_path = $folder.$filename;
        if (createPost($categoryid, $target_path, $comment, $credittext, $creditlink) && move_uploaded_file($image['tmp_name'], $target_path)) {
          //This check doesn't seem to actually do what it's supposed to, needs to fail safely and unless everything works, undo everything.
          $response = "Uploaded!";
        } else {
          $response = "Something went wrong, please contact an administrator.";
        }
      break;
      case "delete-post": //Sanitize
        if (deletePost($_POST['post'])) {
          echo "Post ".$_POST['post']." has been deleted";
        } else {
          $response = "Something went wrong, please contact an administrator.";
        }
      break;
      case "create-category": //Sanitize
        if (createCategory($_POST['categoryname'])) {
          $response = "Category \"".$_POST['categoryname']."\" created!";
        } else {
          $response = "Something went wrong, please contact an administrator.";
        }
      break;
      case "delete-category": //Sanitize
        if (deleteCategory($_POST['categoryid'])) {
          $response = "Category \"".$_POST['categoryid']."\" has been deleted.";
        } else {
          $response = "Something went wrong, please contact an administrator.";
        }
      break;
    }
  } else {
    $response = "";
  }

  $categories = getCategories();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Upload New Evidence</title>
		<link rel="shortcut icon" href="">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Ineptitech.com">
    <meta property="og:image" content="">
		<link rel="stylesheet" href="/css/uploader.css">
  </head>
  <body>
    <div class="uploader">
      <?php echo $response ?>
      <fieldset id="upload-image">
        <legend>Post an Image</legend>
        <img src="" alt="" id="image-preview">
          <form action="<?php $_PHP_SELF ?>" method="post" class="container" enctype="multipart/form-data">
            <input type="hidden" name="type" value="upload-image">
            <input type="file" id="image-input" class="form-input" name="image" required>
            <select name="category" id="category" class="form-input" required>
              <option value="" selected="selected" disabled="disabled" hidden="hidden">Category</option>
              <!--Template the categories here-->
              <?php
                foreach ($categories as $category) {
                  echo <<<OPTION
                  <option value="{$category['idcategory']}">{$category['name']}</option>
                  OPTION;
                }
              ?>
            </select>
            <input type="text" name="comment" id="comment" class="form-input" placeholder="Comment" required>
            <input type="text" name="credittext" id="credittext" class="form-input" placeholder="Credit Text" required>
            <input type="url" name="creditlink" id="creditlink" class="form-input" placeholder="Credit Link" required>
            <input type="submit" name="submit" class="form-input" value="Submit">                
          </form>
      
          <script>
            function preview() {
              const fileReader = new FileReader();
              const image = URL.createObjectURL(document.getElementById("image-input").files[0]);
              document.getElementById("image-preview").src = image;
            }
            document.getElementById("image-input").addEventListener("change",preview);
          </script>
      </fieldset>

      <fieldset id="delete-image">
        <legend>Delete Post</legend>
        <form action="<?php $_PHP_SELF ?>" method="post" class="container">
            <input type="hidden" name="type" value="delete-post">
            <select class="form-input" name="post" required>
            <?php
              foreach ($categories as $category) {
                  echo <<<HTML
                  <optgroup label="{$category['name']}">
                  HTML;

                  $posts = getPosts($category['idcategory']);
                  foreach($posts as $post) {
                    echo <<<HTML
                    <option value="{$post['idpost']}">{$post['comment']}</option>
                    HTML;
                  }

                  echo "</optgroup>";
              }
            ?>
            </select>
            <input type="submit" name="submit" class="form-input" value="Submit">
        </form>
      </fieldset>

      <fieldset id="create-category">
        <legend>Create Category</legend>
        <form action="<?php $_PHP_SELF ?>" method="post" class="container">
            <input type="hidden" name="type" value="create-category">
            <input type="text" name="categoryname" class="form-input" placeholder="Category Name" required>
            <input type="submit" name="submit" class="form-input" value="Submit">
        </form>
      </fieldset>
      
      <fieldset id="delete-category">
        <legend>Delete Category</legend>
        <form action="<?php $_PHP_SELF ?>" method="post" class="container">
          <input type="hidden" name="type" value="delete-category">
          <select class="form-input" name="categoryid" required>
          <?php
              foreach ($categories as $category) {
                echo <<<HTML
                <option value="{$category['idcategory']}">{$category['name']}</option>
                HTML;
              }
          ?>
          <input type="submit" name="submit" class="form-input" value="Submit">
        </form>
      </fieldset>
    </div>
  </body>
</html>
