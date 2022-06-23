<?php
    $header = <<<HTML
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="57x57" href="/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
    <link rel="manifest" href="/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!--General SEO and embeds-->
    <meta name="title" content="Dinosaur Earth Society">
    <meta name="description" content="In the age of disinformation and pseudoscience, there's only one organization that you can trust - the Dinosaur Earth Society.">
    <meta name="keywords" content="Dinosaur,Earth,Society,Flat,Earth,Society,Twitter,Cult,Government,Lies,NASA,Memes">
    <meta name="author" content="Ineptitech.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--OpenGraph-->
    <meta property="og:title" content="Dinosaur Earth Society">
    <meta property="og:site_name" content="Dinosaur Earth Society">
    <meta property="og:url" content="https://dinosaurearthsociety.com">
    <meta property="og:description" content="In the age of disinformation and pseudoscience, there's only one organization that you can trust - the Dinosaur Earth Society.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://dinosaurearthsociety.com/img/preview.webp">
    <!--Twitter Cards-->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Dinosaur Earth Society">
    <meta name="twitter:site" content="@DinosaurEarth">
    <meta name="twitter:creator" content="@Ineptitech">
    <meta name="twitter:description" content="In the age of disinformation and pseudoscience, there's only one organization that you can trust - the Dinosaur Earth Society.">
    <meta property="og:image" content="https://dinosaurearthsociety.com/img/preview.webp">
    <!--CSS-->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
    <link href="/css/icons.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    HTML;

    $nav = <<<HTML
      <nav>
        <a href="/" class="nav-item">
          <span class="ws-label">Home</span>
          <span class="icon-home"></span>
        </a>
        <a href="/followercount.php" class="nav-item">
          <span class="ws-label">Followers</span>
          <span class="icon-pie-chart"></span>
        </a>
        <a href="/faq.php" class="nav-item">
          <span class="ws-label">FAQ</span>
          <span class="icon-info"></span>
        </a>
        <a href="/shop" rel="noopener noreferrer" class="nav-item">
          <span class="ws-label">Merch</span>
          <span class="icon-cart"></span>
        </a>
        <a href="/gallery" class="nav-item">
          <span class="ws-label">Gallery</span>
          <span class="icon-images"></span>
        </a>
        <div class="nav-item" id="social-nav-item">
          <span class="ws-label">Social</span>
          <span class="icon-share"></span>
          <script>
<<<<<<< HEAD
            function hoverGradient(item) {
              let bgDiam = Math.min(item.offsetWidth, item.firstElementChild.offsetWidth * 2.5) + "px";
              item.style.setProperty('--text-width', bgDiam);
            }
            function desktopNav() {
              //Make the background gradient a little bit larger than the text in diameter
              const navItems = document.getElementsByClassName("nav-item");
              const socialItems = document.getElementsByClassName("social-item");
              for (i = 0; i < navItems.length; i++) {
                hoverGradient(navItems[i]);
              }
              for ( i = 0; i < socialItems.length; i++) {
                hoverGradient(socialItems[i]);
              }
            }
            function mobileNav() {
              document.getElementById("social-nav-item").addEventListener("click", function(){
                this.classList.toggle('social-expanded')
              });
            }
            (window.matchMedia("(any-hover)").matches) ? (desktopNav()) : (mobileNav());
          </script>
          <a href="/twitter" target="_blank" rel="noopener noreferrer" class="social-item">
            <span class="ws-label">Twitter</span>
            <span class="icon-twitter"></span>
          </a>
          <a href="/youtube" target="_blank" rel="noopener noreferrer" class="social-item">
            <span class="ws-label">YouTube</span>
            <span class="icon-youtube"></span>
          </a>
          <a href="/discord" target="_blank" rel="noopener noreferrer" class="social-item">
            <span class="ws-label">Discord</span>
            <span class="icon-discord"></span>
          </a>
          <a href="/instagram" target="_blank" rel="noopener noreferrer" class="social-item">
            <span class="ws-label">Instagram</span>
            <span class="icon-instagram"></span>
          </a>
          <a href="/reddit" target="_blank" rel="noopener noreferrer" class="social-item">
            <span class="ws-label">Reddit</span>
            <span class="icon-reddit"></span>
          </a>
          <a href="/spotify" target="_blank" rel="noopener noreferrer" class="social-item">
=======
            function mobileNav() {
              document.getElementById("social-nav-item").addEventListener("click", () =>  {this.classList.toggle('social-expanded')});
            }
            if (window.matchMedia("(any-hover)").matches) mobileNav();
          </script>
          <a href="/twitter" target="_blank" rel="noopener noreferrer" class="social-item" style="
          --ripple-color: hsla(212, 100%, 56%, 0.8);
          --slide-in-delay: 75ms;">
            <span class="ws-label">Twitter</span>
            <span class="icon-twitter"></span>
          </a>
          <a href="/youtube" target="_blank" rel="noopener noreferrer" class="social-item" style="
          --ripple-color: hsla(0, 100%, 50%, 0.8);
          --slide-in-delay: 150ms;
          ">
            <span class="ws-label">YouTube</span>
            <span class="icon-youtube"></span>
          </a>
          <a href="/discord" target="_blank" rel="noopener noreferrer" class="social-item" style="
          --ripple-color: hsla(227, 58%, 65%, 0.8);
          --slide-in-delay: 225ms;
          ">
            <span class="ws-label">Discord</span>
            <span class="icon-discord"></span>
          </a>
          <a href="/instagram" target="_blank" rel="noopener noreferrer" class="social-item" style="
          --ripple-color: rgba(227,46,86,0.8);
          --slide-in-delay: 300ms;
          ">
            <span class="ws-label">Instagram</span>
            <span class="icon-instagram"></span>
          </a>
          <a href="/reddit" target="_blank" rel="noopener noreferrer" class="social-item" style="
          --ripple-color: rgba(255,69,0,0.8);
          --slide-in-delay: 375ms;
          ">
            <span class="ws-label">Reddit</span>
            <span class="icon-reddit"></span>
          </a>
          <a href="/spotify" target="_blank" rel="noopener noreferrer" class="social-item" style="
          --ripple-color: rgba(30, 215, 96, 0.8);
          --slide-in-delay: 450ms;
          ">
>>>>>>> master
            <span class="ws-label">Spotify</span>
            <span class="icon-spotify"></span>
          </a>
        </div>  
      </nav>
    HTML;

    $footer = <<<HTML
    <footer>
      Created with &lt;3 by <a href="https://ineptitech.com" target="_blank">Ineptitech</a>
    </footer>
    HTML;
?>