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
    <model-viewer id="three" src="dino.glb" alt="Real-time satellite footage of the earth" camera-controls auto-rotate auto-rotate-delay="0" skybox-image="https://ipsyconh.sirv.com/Images/des/hdr.png?format=webp&w=2560&webp.fallback=jpg"exposure="0.6" camera-orbit="-75deg 85deg 105%"></model-viewer>
    <?php echo $nav; ?>
    <?php echo $footer; ?>
  </body>
</html>
