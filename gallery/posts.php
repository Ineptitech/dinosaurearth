<!DOCTYPE html>
<html>
  <head lang="en">
    <?php
    include '../template.php';
    echo $header;


    include 'lib.inc';
    $categoryid = filter_var($_GET['category'], FILTER_SANITIZE_NUMBER_INT);
    if ( !isset($categoryid) || !is_numeric($categoryid) ) {
      header('Location: index.php');
    }
    ?>
    <title>Dinosaur Earth Society | Gallery</title>
		<link href="/css/gallery.css" rel="stylesheet">
  </head>
  <body>
    <div class="bg"></div>
    <div class="spacer"></div>
    <?php echo $nav; ?>
    <section id="posts">
      <div class="container">
        <!--
          generate these with PHP, then insert json_encode($items) with PHP 
        -->
        <?php

          $posts = getPosts($categoryid);
          //For each post in $posts,
          for ($i = 0; $i <= sizeof($posts) -1; $i++) {
            $post = $posts[$i];
            $j = $i + 1;
            echo "
              <div class=\"item\" onclick=\"openPost(this)\" data-id=\"".$j."\">
                <div class=\"item-thumbnail\" style=\"background-image: url('".$post['src']."');\"></div>
                <p class=\"item-comment\">".$post['comment']."</p>
              </div>";
          }
        ?>
      <div id="post-view" onclick="closePost()">
        <div class="post-caption ui-element">
          <div class="caption-container">
            <span id="post-comment">#Comment</span>
            <a href="#Credit-Link" target="_blank" id="post-credit">#Credit-Text</a>
          </div>
        </div>
        <div class="close">&times;</div>
      </div>
      <script>
        const postData = <?php echo json_encode(getPosts($categoryid), true); ?>

        const viewer = document.getElementById("post-view");
        let viewerVisible = false;
        viewer.addEventListener("click", closePost);

        function openPost(el) {
          const post = postData[el.dataset.id-1];
          viewer.style.display = "block";
          viewer.style.backgroundImage = "url(\""+post.src+"\")";
          document.getElementById("post-comment").innerText = post.comment;
          document.getElementById("post-credit").innerText = post.credittext;
          document.getElementById("post-credit").href = post.creditlink;
          
          viewerVisible = true;
        }


        function closePost() {
          viewer.style.display = "none";
          viewerVisible = false;
        }
        function next() {
          //Switch to next image in the array, templated in by PHP
        }
        function previous() {
          //Switch to previous image
        }
      </script>
      <script>
        if (screen.width <= 768 ) {
          exit;
        }
        const uiElems = document.getElementsByClassName("ui-element");
        let uiTimeout = 0;
        function resetTimer() {
          uiTimeout = 0;
          for (el of uiElems) {
              el.style.opacity = "1";
            }
        }
        setInterval(function(){
          uiTimeout++;
          if (uiTimeout >= 3) {
            for (el of uiElems) {
              el.style.opacity = "0";
            }
          }
        },1000);

        viewer.addEventListener("mousemove",function(){resetTimer();});
      </script>
    </section>
  </body>
</html>
