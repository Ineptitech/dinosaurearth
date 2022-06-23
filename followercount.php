<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    include 'template.php';
    echo $header;
    ?>
    <title>Dinosaur Earth Society | Real Time Follower Count Tracker</title>
  </head>
  <body>
    <div class="bg"></div>
    <?php echo $nav; ?>
    <div class="spacer"></div>
    <main>
      <div class="canvas-container">
        <canvas id="canvas"></canvas>
      </div>
      <div class="follower-counts">
        <div class="follower-count-container">
          <a href="https://twitter.com/DinosaurEarth" target="_blank" class="follower-count-label">@DinosaurEarth</a>
          <span id="des-count" class="follower-count"></span>
        </div>
        

        <div class="follower-count-container">
          <a href="https://twitter.com/FlatEarthOrg" target="_blank" class="follower-count-label">@FlatEarthOrg</a>
          <span id="fes-count" class="follower-count"></span>
        </div>
      </div>
      <div id="percentage">0.00%</div>
      <div class="explanation">
        <h3>What is this?</h3>
        <p>
          This graph depicts the Twitter following of the Dinosaur Earth Society compared to that of the Flat Earth Society as a percentage, based on statistics from the Twitter API. It updates every 5 seconds.
        </p>
      </div>
    </main>
    <script>
      let sw = Math.min(screen.width, screen.height);
      if (sw > 500) {
        sw = 500;
      }
      const canvas = document.getElementById("canvas");
      const ctx = canvas.getContext('2d');
      ctx.save();
      canvas.width = sw;
      canvas.height = sw;
      var x = sw / 2;
      var y = sw / 2;
      var radius = (sw - 4) / 2;

      let fesLoaded = false;
      const fes = document.createElement('IMG');
      function showFes() {
        const fespath = new Path2D();
        ctx.beginPath(fespath);
        ctx.restore();
        fespath.arc(x,y,radius,0,2*Math.PI,true);
        ctx.closePath(fespath);
        ctx.clip(fespath);
        ctx.drawImage(fes,0,0,fes.width, fes.height,0,0,fes.width*(sw / fes.width),fes.height*(sw / fes.height));
      }
      
      let desLoaded = false;
      const des = document.createElement('IMG');
      function showDes() {
        const despath = new Path2D();
        ctx.beginPath(despath);
        ctx.restore();
        var endAngle = followerDecimal * 2 * Math.PI;
        despath.arc(x,y,radius,0,endAngle);
        despath.lineTo(x,y);
        ctx.closePath(despath);
        ctx.clip(despath);
        ctx.drawImage(des,0,0,des.width, des.height,0,0,des.width*(sw / des.width),des.height*(sw / des.height)); 
      }
      function showBoth() {
        if ((fesLoaded == true) && (desLoaded == true)) {
          showFes();
          showDes();
        }
      }
      fes.onload = function(){
            fesLoaded = true;  showBoth();
      }
      des.onload = function(){
        desLoaded = true; showBoth();
      }
      function setPercentage(val) {
        perc = (val * 100).toFixed(3);
        document.getElementById("percentage").innerText = perc + "%";
        if ((val.toFixed(0) % 10) == 0) {
          //Celebrate
        }
      }


      //Calculate follower difference
      let followerDecimal = 0;
      function setGraph(){
        return fetch("scrape.php").then(
        function(response){
          return response.json();
        }).then(function(json){
          followerDecimal = json[0] / json[1];
          //Template these in PHP so that it doesn't rely on JS
          document.getElementById("des-count").innerText = json[0];
          document.getElementById("fes-count").innerText = json[1];
          //Init FES
          fes.src = "https://ipsyconh.sirv.com/Images/des/fes.png?w=720";
          //Init DES
          des.src = "https://ipsyconh.sirv.com/Images/des/pfp.png?w=720";
          setPercentage(followerDecimal);
        })
      }
      setGraph();
      setInterval(setGraph,5000);
    </script>
  </body>
</html>
