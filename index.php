<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    include 'template.php';
    echo $header;
    ?>
    <title>Dinosaur Earth Society | Home</title>
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
  </head>
  <body>
<<<<<<< HEAD
    <model-viewer id="three" src="scene.gltf" alt="Real-time satellite footage of the earth" camera-controls auto-rotate auto-rotate-delay="0" skybox-image="https://ipsyconh.sirv.com/Images/des/hdr.png?format=webp&w=2560&webp.fallback=jpg" environment-image="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAAAAAA6fptVAAAACklEQVR4nGPaDwAAxQDCq3EVhQAAAABJRU5ErkJggg==" max-field-of-view="50deg" field-of-view="50deg" exposure="0.6" camera-orbit="-75deg 85deg 105%"></model-viewer>
    <?php echo $nav; ?>
    <?php 
    if ((intval(date("Ymd")) <= 20201219) && !isset($_COOKIE['fuckoff'])) {
      echo <<<HTML
      <div href="#" id="modal" class="modal">
        <div id="modal-content">
          <span id="modal-x">&times;</span>
          <h2>New Merch!</h2>
          <p>Dinosaur Earth plushies are now available for a limited time!
            <a href="https://teespring.com/dinosaur-earth-plushie">
              Order Now!
              <br>
              <img src="https://ipsyconh.sirv.com/Images/des/plush.jpg?w=256" width="256" height="256" srcset="https://ipsyconh.sirv.com/Images/des/plush.jpg?w=256 1x, https://ipsyconh.sirv.com/Images/des/plush.jpg?w=512 2x" alt="Dinosaur Plush Toy" />
            </a>
            <a href="javascript:fuckOff()" class="fuckoff">Don't show this again</a>
          </p>
        </div>
      </div>
      <script>
        function fuckOff() {document.cookie = 'fuckoff=true;sameSite=strict';}
      </script>
      <script>
        const modal = document.getElementById("modal");
        const modalContent = document.getElementById("modal-content");
        modalContent.addEventListener("animationiteration",function(){
          modalContent.style.animationPlayState = "paused";
          modal.onclick = function(){
            modalContent.style.animationPlayState = "running";
            modal.onclick = "";
          }
        })
        modalContent.addEventListener("animationend",function(){
          modal.classList.add("modal-close");
        })
      </script>
      HTML;
    }
    ?>
    <?php echo $footer; ?>
  </body>
    <script async>
    var redir = "https://wedontsupportinternetexplorer.com/";
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf('MSIE ');
    var trident = ua.indexOf('Trident/');
    if ((msie > 0) || (trident > 0)) {
      window.location = redir;
    }
    </script>
=======
    <model-viewer id="three" src="dino.glb" alt="Real-time satellite footage of the earth" camera-controls auto-rotate auto-rotate-delay="0" skybox-image="https://ipsyconh.sirv.com/Images/des/hdr.png?format=webp&w=2560&webp.fallback=jpg"exposure="0.6" camera-orbit="-75deg 85deg 105%"></model-viewer>
    <?php echo $nav; ?>
    <?php echo $footer; ?>
  </body>
>>>>>>> master
</html>
