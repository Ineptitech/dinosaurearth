<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    include '../template.php';
    echo $header;
    ?>
		<link href="/css/gallery.css" rel="stylesheet">
    <title>Dinosaur Earth Society | Artwork and Evidence Gallery</title>
  </head>
  <body>
    <div class="bg"></div>
    <div class="spacer"></div>
    <?php echo $nav; ?>
    <main>
      <section id="categories">
        <div class="container">
          <?php
            include 'lib.inc';
            $categories = getCategories();
            for ($i = 0; $i <= sizeof($categories)-1; $i++) {
              $thumbnail = getCategoryThumbnail($categories[$i]['idcategory'])[0]['src'];
              echo <<<HTML
              <a href="posts.php?category={$categories[$i]['idcategory']}" class="item">
                <h2>{$categories[$i]['name']}</h2>
                <div class="item-thumbnail" style="background-image: url('{$thumbnail}')"></div>
              </a>
              HTML;
            }
          ?>
        </div>
      </section>
    </main>
  </body>
</html>
