<!DOCTYPE html>
<html class="wide wow-animation" lang="pt-Br">
<?php require_once ('./config/db.php'); 
//Endereço e Telfone
$mysqli = new mysqli($host, $user, $pass, $database);
$fone = "SELECT * FROM enderecosite where Column1=1";
       $result = $mysqli->query($fone); 
       while($p_fone = $result->fetch_array())
        { 
          $fones[] = $p_fone;
       
        }
?>
  <head>
    <title>Sulplan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
   
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/fonts.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
      </div>
    </div>

    <div class="page">
      <header class="section page-header">
        <!--RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
            <div class="rd-navbar-aside-outer rd-navbar-collapse bg-gray-700">
            <?php foreach ($fones as  $value) { ?>
              <div class="rd-navbar-aside">
                <ul class="list-inline list-inline-md">
                  <li>
                    <div class="unit unit-spacing-xs align-items-center">
                      <div class="unit-left"><span class="icon text-middle fa-phone"></span></div>
                      <div class="unit-body"><a href="tel:#"><?php echo $value['tele']; ?></a></div>
                    </div>
                  </li>
                  <li>
                    <div class="unit unit-spacing-xs align-items-center">
                      <div class="unit-left"><span class="icon text-middle fa-envelope"></span></div>
                      <div class="unit-body"><a href="mailto:#"><?php echo utf8_decode($value['email']); ?></a></div>
                    </div>
                  </li>
                  <li>
                    <div class="unit unit-spacing-xs align-items-center">
                      <div class="unit-left"><span class="icon text-middle fa-map-marker"></span></div>
                      <div class="unit-body"><a href="#"><?php echo $value['endereco']; ?></a></div>
                    </div>
                  </li>
                </ul>
              </div>
              <?php } ?>
            </div>
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <!--RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!--RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!--RD Navbar Brand-->
                  <div class="rd-navbar-brand">
                    <!--Brand--><a class="brand" href="index.php"><img class="brand-logo-dark" src="images/logo-sulplan.jpg" alt="" width="251" height="70"/><img class="brand-logo-light" src="images/logo-inverse-251x70.png" alt="" width="251" height="70"/></a>
                  </div>
                </div>
                <div class="rd-navbar-main-element">
                  <div class="rd-navbar-nav-wrap">
                    <ul class="rd-navbar-nav">
                      <li class="rd-nav-item active"><a class="rd-nav-link" href="index.php">Home</a>
                      </li>

                      <li class="rd-nav-item active"><a class="rd-nav-link" href="creditorural.php">Crédito Rural</a></li>
                      <li class="rd-nav-item active"><a class="rd-nav-link" href="topografia.php">Topografia</a></li>
                      <li class="rd-nav-item active"><a class="rd-nav-link" href="ambiental.php">Ambiental</a></li>
                      <li class="rd-nav-item active"><a class="rd-nav-link" href="custeioagricola.php">Custeio Agrícola</a></li>
                      <li class="rd-nav-item active"><a class="rd-nav-link" href="custeiopecuario.php">Custeio Pecuário</a></li>


                      <li class="rd-nav-item" >
                      <a class="rd-nav-link" href="twitter.php">
                        <img src="images/twitter.png"  width="50" height="50">
                      </a>
                      </li>

                    </ul>
                  </div>
                  <!-- RD Navbar Search-->

                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
<?php 



//Baners Principal
$query = "SELECT * FROM img_banners";
$result = $mysqli->query($query);

while($row = $result->fetch_array())
{
$rows[] = $row;
}
//Metas
$mysqli = new mysqli($host, $user, $pass, $database);
$metas = "SELECT texto FROM inicial where id=2";
       $result = $mysqli->query($metas); 
       while($p_metas = $result->fetch_array())
        { 
          $meta[] = $p_metas;
       
        }

//Perfil
$mysqliperfil = new mysqli($host, $user, $pass, $database);
$perfil = "SELECT texto FROM inicial where id=3";
       $result = $mysqliperfil->query($perfil); 
       while($perfil_metas = $result->fetch_array())
        { 
          $exibe_perfil[] = $perfil_metas;
       
        }
// $perfil = "SELECT texto FROM inicial where id = 3";
// $result = $mysqli->query($perfil);
// while($row = $result->fetch_array())
// {
// $exibe_perfil[] = $row;
// }
//Oque Fazemos
$fazemos = "SELECT texto FROM inicial where id = 4";
$result = $mysqli->query($fazemos);
while($row = $result->fetch_array())
{
$oque_fazemos[] = $row;
}
?>
      <!-- BANNER -->
      <section class="section swiper-container swiper-slider" data-swiper='{"autoplay":{"delay":4567},"effect":"fade"}'>
    <div class="swiper-wrapper text-center">
     <?php foreach ($rows as  $value) { ?>
      
  <?php } ?>
    </div>
    <!--Swiper Pagination-->
    <div class="swiper-pagination"></div>
  </section>
      <!-- END BNNER -->

            <!-- twiterr -->
            <!-- <section class="section swiper-container swiper-slider"> -->
    <!-- <div class="swiper-wrapper text-center"> -->

    <div class="swiper-slide-caption section-md">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-xl-10">
                
              <a class="twitter-timeline" data-lang="pt" data-width="2048" data-height="800" data-theme="light" href="https://twitter.com/sulplan?ref_src=twsrc%5Etfw">Tweets by sulplan</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>


              </div>
            </div>
          </div>
        </div>
    <!-- </div> -->
  <!-- </section> -->
 
      <section class="section section-md section-last bg-gray-100">
    <div class="container">
      <div class="row row-30 box-ordered">
        <div class="col-sm-2 col-lg-1 wow fadeInLeft"></div>
        <div class="col-sm-3 col-lg-2 wow fadeInLeft" data-wow-delay=".3s">
          <article class="box-icon-modern">
            <div class="box-icon-modern-header">
              <div class="box-icon-modern-svg">
                <svg x="0px" y="0px" width="75px" height="70px" viewBox="0 0 75 70" enable-background="new 0 0 75 70">
                  <g>
                    <g>
                      <lineargradient id="SVGID_1_1_" gradientUnits="userSpaceOnUse" x1="10.3334" y1="-0.0127" x2="10.3334" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_1_1_)" d="M10.969,51.195H9.697c0-3.072-0.543-5.33-3.322-7.78c-0.15-0.132-0.458-0.362-0.814-0.628c-1.463-1.092-4.187-3.125-5.51-5.405l-0.088-0.151V27.111l1.184,2.041c1.191,2.053,3.778,3.984,5.168,5.021c0.41,0.306,0.706,0.527,0.895,0.694c1.633,1.44,2.585,2.846,3.122,4.339c0.537-1.492,1.489-2.899,3.122-4.339c0.188-0.166,0.484-0.387,0.894-0.693c1.39-1.038,3.978-2.969,5.17-5.022l1.184-2.041V37.23l-0.088,0.151c-1.323,2.28-4.047,4.313-5.511,5.406c-0.356,0.266-0.664,0.496-0.813,0.627C11.513,45.865,10.969,48.123,10.969,51.195zM1.236,36.876c1.226,1.997,3.723,3.861,5.08,4.874c0.41,0.306,0.707,0.528,0.895,0.694c1.633,1.44,2.585,2.846,3.122,4.339c0.537-1.492,1.489-2.899,3.123-4.339c0.188-0.166,0.484-0.387,0.894-0.693c1.357-1.013,3.855-2.877,5.081-4.875v-5.451c-1.397,1.6-3.222,2.962-4.327,3.787c-0.356,0.266-0.664,0.495-0.813,0.627c-2.778,2.451-3.322,4.708-3.322,7.78H9.697c0-3.072-0.543-5.33-3.322-7.78c-0.15-0.132-0.457-0.362-0.814-0.628c-1.105-0.825-2.929-2.186-4.326-3.786V36.876z"></path>
                      <lineargradient id="SVGID_2_1_" gradientUnits="userSpaceOnUse" x1="10.3334" y1="-0.0127" x2="10.3334" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_2_1_)" d="M5.589,35.075c-0.274,0-0.527-0.181-0.609-0.461c-0.857-2.917-0.997-5.575,1.103-9.065c0.13-0.215,0.345-0.514,0.641-0.927c0.839-1.167,2.243-3.119,3.019-5.065l0.59-1.478l0.59,1.478c0.777,1.946,2.181,3.899,3.02,5.066c0.297,0.413,0.511,0.711,0.641,0.925c2.1,3.491,1.96,6.149,1.104,9.066c-0.1,0.341-0.455,0.536-0.791,0.434c-0.337-0.101-0.528-0.46-0.428-0.801c0.782-2.662,0.892-4.933-0.97-8.027c-0.102-0.169-0.325-0.479-0.583-0.838c-0.693-0.963-1.755-2.44-2.582-4.054c-0.827,1.613-1.888,3.09-2.581,4.053c-0.258,0.359-0.481,0.67-0.584,0.84c-1.862,3.094-1.751,5.365-0.97,8.026c0.1,0.341-0.092,0.7-0.428,0.801C5.71,35.066,5.649,35.075,5.589,35.075z"></path>
                      <lineargradient id="SVGID_3_1_" gradientUnits="userSpaceOnUse" x1="10.3333" y1="-0.0127" x2="10.3333" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_3_1_)" d="M13.097,36.732c-0.28,0-0.537-0.189-0.613-0.476c-0.241-0.9-0.648-1.82-1.246-2.813c-0.104-0.172-0.33-0.488-0.593-0.854c-0.095-0.133-0.2-0.279-0.312-0.435c-0.111,0.157-0.216,0.303-0.312,0.436c-0.263,0.366-0.489,0.681-0.593,0.853c-0.598,0.992-1.005,1.912-1.246,2.813c-0.092,0.343-0.441,0.546-0.78,0.453c-0.339-0.093-0.54-0.447-0.448-0.79c0.272-1.02,0.726-2.049,1.387-3.147c0.13-0.217,0.348-0.52,0.65-0.941c0.244-0.339,0.52-0.724,0.818-1.159l0.522-0.76l0.522,0.76c0.299,0.435,0.575,0.819,0.818,1.158c0.302,0.421,0.52,0.724,0.651,0.941c0.661,1.098,1.115,2.127,1.387,3.147c0.092,0.343-0.109,0.697-0.448,0.79C13.208,36.725,13.152,36.732,13.097,36.732z"></path>
                      <lineargradient id="SVGID_4_1_" gradientUnits="userSpaceOnUse" x1="10.3334" y1="-0.0127" x2="10.3334" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_4_1_)" d="M10.969,58.772H9.697c0-3.072-0.543-5.33-3.322-7.78c-0.15-0.132-0.458-0.362-0.814-0.628c-1.463-1.092-4.187-3.125-5.51-5.405l-0.088-0.151V34.688l1.184,2.041c1.191,2.053,3.778,3.984,5.168,5.021c0.41,0.306,0.706,0.527,0.895,0.694c1.633,1.44,2.585,2.846,3.122,4.339c0.537-1.492,1.489-2.899,3.122-4.339c0.188-0.166,0.484-0.387,0.894-0.693c1.39-1.038,3.978-2.969,5.17-5.022l1.184-2.041v10.119l-0.088,0.151c-1.323,2.28-4.047,4.313-5.511,5.406c-0.356,0.266-0.664,0.496-0.813,0.628C11.513,53.442,10.969,55.7,10.969,58.772zM1.236,44.452c1.226,1.997,3.723,3.861,5.08,4.874c0.41,0.306,0.707,0.528,0.895,0.694c1.633,1.44,2.585,2.846,3.122,4.339c0.537-1.492,1.489-2.899,3.123-4.339c0.188-0.166,0.484-0.387,0.894-0.693c1.357-1.013,3.855-2.877,5.081-4.875v-5.451c-1.397,1.6-3.222,2.961-4.327,3.787c-0.356,0.266-0.664,0.495-0.813,0.627c-2.778,2.451-3.322,4.708-3.322,7.78H9.697c0-3.072-0.543-5.33-3.322-7.78c-0.15-0.132-0.457-0.362-0.814-0.628c-1.105-0.825-2.929-2.186-4.326-3.786V44.452z"></path>
                      <lineargradient id="SVGID_5_1_" gradientUnits="userSpaceOnUse" x1="10.3334" y1="-0.0127" x2="10.3334" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_5_1_)" d="M10.969,66.348H9.697c0-3.072-0.543-5.33-3.322-7.78c-0.15-0.132-0.458-0.362-0.815-0.629c-0.722-0.539-1.71-1.276-2.7-2.16c-1.841-1.642-2.897-4.01-2.897-6.496v-7.02l1.184,2.041c1.191,2.053,3.778,3.984,5.168,5.021c0.41,0.306,0.706,0.527,0.895,0.694c1.633,1.44,2.585,2.846,3.122,4.339c0.537-1.492,1.489-2.899,3.123-4.339c0.188-0.166,0.484-0.387,0.894-0.693c1.39-1.038,3.978-2.969,5.17-5.022l1.184-2.041v7.02c0,2.486-1.056,4.854-2.897,6.496c-0.991,0.884-1.979,1.621-2.701,2.16c-0.357,0.266-0.665,0.496-0.814,0.628C11.513,61.018,10.969,63.276,10.969,66.348zM1.236,46.578v2.706c0,2.116,0.899,4.132,2.466,5.529c0.949,0.846,1.911,1.565,2.614,2.089c0.411,0.306,0.707,0.528,0.896,0.694c1.633,1.44,2.585,2.846,3.122,4.339c0.537-1.492,1.489-2.899,3.123-4.339c0.188-0.166,0.485-0.387,0.895-0.694c0.703-0.525,1.666-1.243,2.615-2.09c1.567-1.397,2.466-3.413,2.466-5.529v-2.706c-1.397,1.6-3.222,2.962-4.327,3.787c-0.356,0.266-0.664,0.495-0.813,0.627c-2.778,2.45-3.322,4.708-3.322,7.78H9.697c0-3.072-0.543-5.33-3.322-7.78c-0.15-0.132-0.457-0.362-0.814-0.628C4.456,49.539,2.632,48.177,1.236,46.578z"></path>
                      <lineargradient id="SVGID_6_1_" gradientUnits="userSpaceOnUse" x1="0.5997" y1="-0.0127" x2="0.5997" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_6_1_)" d="M0.6,30.123c-0.351,0-0.636-0.288-0.636-0.644V16.408c0-0.356,0.285-0.644,0.636-0.644				c0.351,0,0.636,0.288,0.636,0.644v13.071C1.236,29.834,0.951,30.123,0.6,30.123z"></path>
                      <lineargradient id="SVGID_7_1_" gradientUnits="userSpaceOnUse" x1="10.3332" y1="-0.0127" x2="10.3332" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_7_1_)" d="M10.333,20.443c-0.351,0-0.636-0.288-0.636-0.644v-7.678c0-0.356,0.285-0.644,0.636-0.644				c0.351,0,0.636,0.288,0.636,0.644v7.678C10.969,20.154,10.685,20.443,10.333,20.443z"></path>
                      <lineargradient id="SVGID_8_1_" gradientUnits="userSpaceOnUse" x1="20.0672" y1="-0.0127" x2="20.0672" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_8_1_)" d="M20.067,30.123c-0.351,0-0.636-0.288-0.636-0.644V16.408c0-0.356,0.285-0.644,0.636-0.644				c0.351,0,0.636,0.288,0.636,0.644v13.071C20.703,29.834,20.419,30.123,20.067,30.123z"></path>
                      <lineargradient id="SVGID_9_1_" gradientUnits="userSpaceOnUse" x1="10.3332" y1="-0.0127" x2="10.3332" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_9_1_)" d="M10.333,70.025c-0.351,0-0.636-0.288-0.636-0.644V42.222c0-0.356,0.285-0.644,0.636-0.644				c0.351,0,0.636,0.288,0.636,0.644v27.159C10.969,69.737,10.685,70.025,10.333,70.025z"></path>
                    </g>
                    <g>
                      <lineargradient id="SVGID_10_1_" gradientUnits="userSpaceOnUse" x1="37.4636" y1="-0.0127" x2="37.4636" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_10_1_)" d="M38.1,47.558h-1.272c0-3.724-0.659-6.461-4.03-9.433c-0.183-0.162-0.537-0.426-0.985-0.76c-1.748-1.305-5.003-3.735-6.578-6.448l-0.088-0.151V19.131l1.184,2.041c1.443,2.486,4.561,4.814,6.236,6.064c0.471,0.352,0.843,0.629,1.065,0.825c2.069,1.824,3.218,3.603,3.831,5.51c0.613-1.906,1.762-3.685,3.83-5.51c0.222-0.196,0.594-0.474,1.065-0.825c1.675-1.25,4.794-3.578,6.237-6.064l1.184-2.041v11.634l-0.088,0.151c-1.575,2.713-4.829,5.143-6.578,6.448c-0.448,0.334-0.801,0.598-0.985,0.76C38.759,41.097,38.1,43.834,38.1,47.558zM26.419,30.412c1.478,2.43,4.506,4.691,6.148,5.916c0.471,0.352,0.843,0.629,1.066,0.826c2.069,1.824,3.218,3.603,3.831,5.509c0.613-1.907,1.762-3.685,3.83-5.51c0.222-0.196,0.594-0.474,1.065-0.826c1.642-1.226,4.67-3.486,6.148-5.916v-6.923c-1.691,2.021-4.013,3.754-5.394,4.785c-0.448,0.334-0.801,0.598-0.984,0.76c-3.37,2.973-4.03,5.71-4.03,9.434h-1.272c0-3.724-0.659-6.461-4.03-9.433c-0.183-0.162-0.537-0.426-0.984-0.76c-1.382-1.031-3.703-2.764-5.394-4.785V30.412z"></path>
                      <lineargradient id="SVGID_11_1_" gradientUnits="userSpaceOnUse" x1="37.4636" y1="-0.0127" x2="37.4636" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_11_1_)" d="M43.157,28.085c-0.06,0-0.121-0.009-0.182-0.027c-0.337-0.101-0.528-0.46-0.428-0.801c0.948-3.228,1.082-5.982-1.177-9.736c-0.125-0.208-0.382-0.564-0.706-1.016c-0.86-1.197-2.198-3.057-3.199-5.07c-1.002,2.014-2.339,3.874-3.2,5.07c-0.324,0.451-0.581,0.808-0.707,1.017c-2.259,3.753-2.125,6.508-1.177,9.735c0.1,0.341-0.092,0.7-0.428,0.801c-0.336,0.101-0.691-0.093-0.791-0.434c-1.019-3.467-1.186-6.627,1.31-10.774c0.153-0.254,0.423-0.629,0.764-1.104c1.01-1.405,2.701-3.756,3.638-6.105l0.59-1.478l0.59,1.478c0.937,2.349,2.628,4.701,3.638,6.105c0.341,0.475,0.611,0.85,0.764,1.103c2.496,4.148,2.329,7.307,1.311,10.775C43.684,27.904,43.431,28.085,43.157,28.085z"></path>
                      <lineargradient id="SVGID_12_1_" gradientUnits="userSpaceOnUse" x1="37.4636" y1="-0.0127" x2="37.4636" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_12_1_)" d="M40.78,30.074c-0.28,0-0.537-0.189-0.613-0.476c-0.292-1.092-0.786-2.207-1.509-3.409c-0.127-0.21-0.387-0.572-0.716-1.031c-0.144-0.2-0.306-0.426-0.479-0.67c-0.172,0.243-0.334,0.468-0.478,0.668c-0.329,0.459-0.59,0.821-0.717,1.032c-0.724,1.202-1.217,2.317-1.509,3.409c-0.092,0.344-0.441,0.546-0.78,0.453c-0.339-0.093-0.54-0.447-0.448-0.79c0.323-1.211,0.863-2.435,1.651-3.743c0.154-0.255,0.428-0.637,0.774-1.119c0.293-0.408,0.625-0.87,0.984-1.393l0.522-0.76l0.522,0.76c0.36,0.524,0.692,0.987,0.985,1.395c0.346,0.482,0.619,0.862,0.773,1.118c0.787,1.307,1.327,2.532,1.651,3.743c0.092,0.343-0.109,0.697-0.448,0.79C40.891,30.066,40.835,30.074,40.78,30.074z"></path>
                      <lineargradient id="SVGID_13_1_" gradientUnits="userSpaceOnUse" x1="37.4636" y1="-0.0127" x2="37.4636" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_13_1_)" d="M38.1,56.65h-1.272c0-3.724-0.659-6.461-4.03-9.433c-0.183-0.162-0.537-0.426-0.985-0.76c-1.748-1.305-5.003-3.735-6.578-6.448l-0.088-0.151V28.223l1.184,2.041c1.443,2.486,4.561,4.814,6.236,6.064c0.471,0.351,0.843,0.629,1.065,0.825c2.069,1.824,3.218,3.603,3.831,5.509c0.613-1.906,1.762-3.685,3.83-5.51c0.222-0.196,0.594-0.474,1.065-0.825c1.675-1.25,4.794-3.578,6.237-6.064l1.184-2.041v11.634l-0.088,0.151c-1.575,2.713-4.829,5.143-6.578,6.448c-0.448,0.334-0.802,0.598-0.985,0.76C38.759,50.189,38.1,52.926,38.1,56.65zM26.419,39.503c1.478,2.43,4.506,4.69,6.148,5.916c0.471,0.352,0.843,0.63,1.066,0.826c2.069,1.824,3.218,3.603,3.831,5.509c0.613-1.907,1.762-3.685,3.83-5.51c0.222-0.196,0.594-0.474,1.066-0.826c1.642-1.226,4.67-3.486,6.148-5.916V32.58c-1.691,2.021-4.013,3.754-5.394,4.785c-0.448,0.334-0.801,0.598-0.984,0.76c-3.37,2.973-4.03,5.71-4.03,9.433h-1.272c0-3.724-0.659-6.461-4.03-9.433c-0.183-0.162-0.537-0.426-0.984-0.76c-1.382-1.031-3.703-2.764-5.394-4.785V39.503z"></path>
                      <lineargradient id="SVGID_14_1_" gradientUnits="userSpaceOnUse" x1="37.4636" y1="-0.0127" x2="37.4636" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_14_1_)" d="M38.1,65.742h-1.272c0-3.724-0.659-6.461-4.03-9.433c-0.183-0.162-0.537-0.426-0.985-0.76c-0.864-0.645-2.048-1.528-3.232-2.585c-2.182-1.946-3.433-4.752-3.433-7.698v-7.95l1.184,2.041c1.443,2.486,4.561,4.814,6.236,6.064c0.471,0.351,0.843,0.629,1.065,0.825c2.069,1.824,3.218,3.603,3.831,5.509c0.613-1.906,1.762-3.685,3.83-5.51c0.222-0.196,0.594-0.474,1.065-0.825c1.675-1.25,4.794-3.578,6.237-6.064l1.184-2.041v7.95c0,2.946-1.251,5.752-3.433,7.698c-1.185,1.057-2.368,1.94-3.232,2.585c-0.448,0.334-0.802,0.598-0.985,0.76C38.759,59.281,38.1,62.018,38.1,65.742z M26.419,41.672v3.593c0,2.577,1.094,5.03,3.002,6.731c1.143,1.02,2.301,1.884,3.146,2.515c0.471,0.352,0.844,0.63,1.066,0.826c2.069,1.824,3.218,3.603,3.83,5.509c0.613-1.907,1.762-3.685,3.83-5.51c0.222-0.196,0.594-0.474,1.066-0.826c0.845-0.631,2.003-1.495,3.146-2.515c1.908-1.701,3.002-4.155,3.002-6.731v-3.593c-1.691,2.021-4.013,3.754-5.394,4.785c-0.448,0.334-0.801,0.598-0.984,0.76c-3.37,2.972-4.03,5.71-4.03,9.433h-1.272c0-3.724-0.659-6.461-4.03-9.433c-0.183-0.162-0.537-0.426-0.984-0.76C30.432,45.426,28.11,43.693,26.419,41.672z"></path>
                      <lineargradient id="SVGID_15_1_" gradientUnits="userSpaceOnUse" x1="25.7832" y1="-0.0127" x2="25.7832" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_15_1_)" d="M25.783,22.143c-0.351,0-0.636-0.288-0.636-0.644V5.813c0-0.356,0.285-0.644,0.636-0.644				s0.636,0.288,0.636,0.644v15.685C26.419,21.854,26.135,22.143,25.783,22.143z"></path>
                      <lineargradient id="SVGID_16_1_" gradientUnits="userSpaceOnUse" x1="37.4637" y1="-0.0127" x2="37.4637" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_16_1_)" d="M37.464,10.527c-0.351,0-0.636-0.288-0.636-0.644V0.669c0-0.356,0.285-0.644,0.636-0.644				S38.1,0.313,38.1,0.669v9.214C38.1,10.239,37.815,10.527,37.464,10.527z"></path>
                      <lineargradient id="SVGID_17_1_" gradientUnits="userSpaceOnUse" x1="49.1441" y1="-0.0127" x2="49.1441" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_17_1_)" d="M49.144,22.143c-0.351,0-0.636-0.288-0.636-0.644V5.813c0-0.356,0.285-0.644,0.636-0.644				c0.351,0,0.636,0.288,0.636,0.644v15.685C49.78,21.854,49.495,22.143,49.144,22.143z"></path>
                      <lineargradient id="SVGID_18_1_" gradientUnits="userSpaceOnUse" x1="37.4637" y1="-0.0127" x2="37.4637" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_18_1_)" d="M37.464,70.025c-0.351,0-0.636-0.288-0.636-0.644v-32.59c0-0.356,0.285-0.644,0.636-0.644				s0.636,0.288,0.636,0.644v32.59C38.1,69.737,37.815,70.025,37.464,70.025z"></path>
                    </g>
                    <g>
                      <lineargradient id="SVGID_19_1_" gradientUnits="userSpaceOnUse" x1="64.5938" y1="-0.0127" x2="64.5938" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_19_1_)" d="M65.23,51.195h-1.272c0-3.072-0.543-5.33-3.322-7.78c-0.149-0.132-0.457-0.362-0.814-0.628c-1.463-1.092-4.187-3.125-5.511-5.406l-0.088-0.151V27.111l1.184,2.041c1.192,2.053,3.779,3.984,5.17,5.022c0.41,0.306,0.705,0.526,0.894,0.693c1.633,1.44,2.585,2.847,3.122,4.339c0.537-1.493,1.489-2.899,3.123-4.339c0.188-0.166,0.484-0.387,0.894-0.693c1.39-1.037,3.977-2.969,5.168-5.021l1.184-2.041V37.23l-0.088,0.151c-1.323,2.28-4.046,4.313-5.51,5.405c-0.357,0.266-0.665,0.496-0.814,0.628C65.774,45.865,65.23,48.123,65.23,51.195zM55.496,36.876c1.227,1.998,3.724,3.862,5.081,4.875c0.41,0.306,0.706,0.527,0.894,0.693c1.633,1.44,2.585,2.846,3.122,4.339c0.537-1.493,1.489-2.899,3.123-4.339c0.188-0.166,0.485-0.388,0.895-0.694c1.357-1.013,3.854-2.877,5.08-4.874v-5.451c-1.397,1.599-3.221,2.961-4.326,3.786c-0.357,0.266-0.664,0.496-0.814,0.628c-2.778,2.45-3.322,4.708-3.322,7.78h-1.272c0-3.072-0.543-5.33-3.322-7.78c-0.149-0.132-0.457-0.361-0.813-0.627c-1.105-0.825-2.93-2.187-4.327-3.787V36.876z"></path>
                      <lineargradient id="SVGID_20_1_" gradientUnits="userSpaceOnUse" x1="64.594" y1="-0.0127" x2="64.594" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_20_1_)" d="M69.338,35.075c-0.06,0-0.121-0.009-0.182-0.027c-0.337-0.101-0.528-0.46-0.428-0.801c0.782-2.661,0.892-4.932-0.97-8.027c-0.102-0.169-0.325-0.48-0.584-0.839c-0.692-0.963-1.754-2.44-2.581-4.053c-0.827,1.614-1.889,3.091-2.582,4.054c-0.258,0.359-0.481,0.669-0.584,0.839c-1.861,3.094-1.751,5.365-0.969,8.026c0.1,0.341-0.092,0.7-0.428,0.801c-0.336,0.102-0.691-0.093-0.791-0.434c-0.857-2.917-0.997-5.575,1.103-9.065c0.13-0.215,0.344-0.513,0.641-0.926c0.839-1.167,2.243-3.12,3.02-5.066l0.59-1.478l0.59,1.478c0.777,1.946,2.181,3.899,3.019,5.065c0.297,0.413,0.512,0.711,0.641,0.926c2.101,3.491,1.96,6.149,1.103,9.066C69.865,34.894,69.612,35.075,69.338,35.075z"></path>
                      <lineargradient id="SVGID_21_1_" gradientUnits="userSpaceOnUse" x1="64.5941" y1="-0.0127" x2="64.5941" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_21_1_)" d="M67.358,36.732c-0.28,0-0.537-0.189-0.613-0.476c-0.241-0.9-0.648-1.82-1.246-2.813c-0.103-0.172-0.33-0.487-0.592-0.852c-0.096-0.133-0.201-0.28-0.312-0.436c-0.112,0.157-0.217,0.304-0.313,0.437c-0.262,0.365-0.488,0.68-0.592,0.852c-0.598,0.993-1.005,1.913-1.245,2.813c-0.092,0.344-0.441,0.546-0.78,0.454c-0.339-0.093-0.54-0.447-0.448-0.79c0.272-1.019,0.726-2.048,1.387-3.147c0.13-0.217,0.348-0.52,0.649-0.939c0.244-0.34,0.521-0.725,0.82-1.16l0.522-0.76l0.522,0.76c0.299,0.435,0.575,0.82,0.819,1.159c0.301,0.42,0.519,0.723,0.65,0.94c0.661,1.098,1.115,2.127,1.387,3.147c0.092,0.343-0.109,0.697-0.448,0.79C67.469,36.725,67.413,36.732,67.358,36.732z"></path>
                      <lineargradient id="SVGID_22_1_" gradientUnits="userSpaceOnUse" x1="64.5938" y1="-0.0127" x2="64.5938" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_22_1_)" d="M65.23,58.772h-1.272c0-3.072-0.543-5.33-3.322-7.78c-0.149-0.132-0.457-0.362-0.814-0.628c-1.463-1.092-4.187-3.125-5.511-5.406l-0.088-0.151V34.688l1.184,2.041c1.192,2.053,3.779,3.984,5.17,5.022c0.41,0.306,0.705,0.526,0.894,0.693c1.633,1.44,2.585,2.847,3.122,4.339c0.537-1.493,1.489-2.899,3.123-4.339c0.188-0.166,0.484-0.387,0.894-0.693c1.39-1.037,3.977-2.969,5.168-5.021l1.184-2.041v10.119l-0.088,0.151c-1.323,2.28-4.046,4.313-5.51,5.405c-0.357,0.266-0.665,0.496-0.814,0.628C65.774,53.441,65.23,55.699,65.23,58.772zM55.496,44.452c1.227,1.998,3.724,3.862,5.081,4.875c0.41,0.306,0.706,0.527,0.894,0.693c1.633,1.44,2.585,2.846,3.122,4.339c0.537-1.493,1.489-2.899,3.123-4.339c0.188-0.166,0.485-0.388,0.895-0.694c1.357-1.013,3.854-2.877,5.08-4.874v-5.451c-1.397,1.599-3.221,2.961-4.326,3.786c-0.357,0.266-0.664,0.496-0.814,0.628c-2.778,2.45-3.322,4.708-3.322,7.78h-1.272c0-3.072-0.543-5.33-3.322-7.78c-0.149-0.132-0.457-0.361-0.813-0.627c-1.105-0.825-2.93-2.187-4.327-3.787V44.452z"></path>
                      <lineargradient id="SVGID_23_1_" gradientUnits="userSpaceOnUse" x1="64.5938" y1="-0.0127" x2="64.5938" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_23_1_)" d="M65.23,66.348h-1.272c0-3.072-0.543-5.33-3.322-7.78c-0.15-0.132-0.458-0.362-0.814-0.628c-0.722-0.539-1.71-1.276-2.701-2.16c-1.841-1.642-2.897-4.01-2.897-6.496v-7.02l1.184,2.041c1.192,2.053,3.779,3.984,5.17,5.022c0.41,0.306,0.705,0.526,0.894,0.693c1.633,1.44,2.585,2.846,3.122,4.339c0.537-1.493,1.489-2.899,3.123-4.339c0.188-0.166,0.484-0.387,0.894-0.693c1.39-1.037,3.977-2.969,5.168-5.021l1.184-2.041v7.02c0,2.486-1.056,4.854-2.897,6.496c-0.991,0.884-1.979,1.621-2.701,2.16c-0.357,0.266-0.664,0.496-0.814,0.628C65.774,61.018,65.23,63.276,65.23,66.348zM55.496,46.578v2.706c0,2.116,0.899,4.132,2.466,5.529c0.949,0.847,1.912,1.565,2.615,2.09c0.41,0.306,0.707,0.527,0.895,0.694c1.633,1.44,2.585,2.846,3.122,4.339c0.537-1.493,1.489-2.899,3.123-4.339c0.188-0.166,0.484-0.387,0.894-0.693c0.703-0.525,1.666-1.243,2.615-2.09c1.567-1.397,2.466-3.413,2.466-5.529v-2.706c-1.397,1.599-3.221,2.961-4.326,3.786c-0.357,0.266-0.664,0.496-0.814,0.628c-2.778,2.45-3.322,4.708-3.322,7.78h-1.272c0-3.072-0.543-5.33-3.322-7.78c-0.149-0.132-0.457-0.361-0.813-0.627C58.718,49.539,56.893,48.178,55.496,46.578z"></path>
                      <lineargradient id="SVGID_24_1_" gradientUnits="userSpaceOnUse" x1="54.8601" y1="-0.0127" x2="54.8601" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_24_1_)" d="M54.86,30.123c-0.351,0-0.636-0.288-0.636-0.644V16.408c0-0.356,0.285-0.644,0.636-0.644				s0.636,0.288,0.636,0.644v13.071C55.496,29.834,55.211,30.123,54.86,30.123z"></path>
                      <lineargradient id="SVGID_25_1_" gradientUnits="userSpaceOnUse" x1="64.5941" y1="-0.0127" x2="64.5941" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_25_1_)" d="M64.594,20.443c-0.351,0-0.636-0.288-0.636-0.644v-7.678c0-0.356,0.285-0.644,0.636-0.644				s0.636,0.288,0.636,0.644v7.678C65.23,20.154,64.945,20.443,64.594,20.443z"></path>
                      <lineargradient id="SVGID_26_1_" gradientUnits="userSpaceOnUse" x1="74.3276" y1="-0.0127" x2="74.3276" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_26_1_)" d="M74.328,30.123c-0.351,0-0.636-0.288-0.636-0.644V16.408c0-0.356,0.285-0.644,0.636-0.644				s0.636,0.288,0.636,0.644v13.071C74.964,29.834,74.679,30.123,74.328,30.123z"></path>
                      <lineargradient id="SVGID_27_1_" gradientUnits="userSpaceOnUse" x1="64.5941" y1="-0.0127" x2="64.5941" y2="70.0193">
                        <stop offset="0" stop-color="#E9DA5B"></stop>
                        <stop offset="1" stop-color="#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_27_1_)" d="M64.594,70.025c-0.351,0-0.636-0.288-0.636-0.644V42.222c0-0.356,0.285-0.644,0.636-0.644				s0.636,0.288,0.636,0.644v27.159C65.23,69.737,64.945,70.025,64.594,70.025z"></path>
                    </g>
                  </g>
                </svg>
              </div>
            </div>
            <h5 class="box-icon-modern-title"><a href="creditorural.php">Crédito Rural</a></h5>
            <p class="box-icon-modern-text"></p>
          </article>
        </div>
        <div class="col-sm-3 col-lg-2 wow fadeInLeft" data-wow-delay=".2s">
          <article class="box-icon-modern">
            <div class="box-icon-modern-header">
              <div class="box-icon-modern-svg">
                <svg x="0px" y="0px" width="70px" height="74px" viewBox="0 0 70 74" enable-background="new 0 0 70 74">
                  <g>
                    <g>
                      <lineargradient id="SVGID_1_2_" gradientUnits="userSpaceOnUse" x1="27.0126" y1="0.1849" x2="27.0126" y2="73.8946">
                        <stop offset="0" style="stop-color:#E9DA5B"></stop>
                        <stop offset="1" style="stop-color:#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_1_2_)" d="M29.677,24.171c-0.226,0-0.446-0.112-0.575-0.316c-0.199-0.315-0.102-0.731,0.215-0.928				c0.757-0.471,1.404-1.089,1.921-1.838c0.983-1.432,1.348-3.159,1.026-4.863c-0.323-1.707-1.294-3.185-2.735-4.162				c-1.442-0.978-3.181-1.34-4.897-1.02c-1.202,0.225-2.31,0.776-3.204,1.594c-0.275,0.252-0.704,0.234-0.958-0.039				c-0.253-0.273-0.236-0.699,0.039-0.951c1.081-0.989,2.42-1.656,3.872-1.927c2.071-0.386,4.17,0.051,5.911,1.232				c1.741,1.18,2.914,2.965,3.303,5.025c0.389,2.057-0.051,4.143-1.24,5.872c-0.624,0.903-1.404,1.649-2.32,2.218				C29.924,24.138,29.8,24.171,29.677,24.171z"></path>
                      <lineargradient id="SVGID_2_2_" gradientUnits="userSpaceOnUse" x1="34.5209" y1="0.1849" x2="34.5209" y2="73.8946">
                        <stop offset="0" style="stop-color:#E9DA5B"></stop>
                        <stop offset="1" style="stop-color:#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_2_2_)" d="M32.93,16.776c-0.32,0-0.604-0.226-0.665-0.549c-0.069-0.365,0.173-0.717,0.541-0.786l3.18-0.594				c0.366-0.069,0.722,0.172,0.791,0.537c0.069,0.365-0.173,0.717-0.541,0.786l-3.18,0.594C33.014,16.772,32.972,16.776,32.93,16.776				z"></path>
                      <lineargradient id="SVGID_3_2_" gradientUnits="userSpaceOnUse" x1="33.1323" y1="0.1849" x2="33.1323" y2="73.8946">
                        <stop offset="0" style="stop-color:#E9DA5B"></stop>
                        <stop offset="1" style="stop-color:#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_3_2_)" d="M34.467,23.958c-0.132,0-0.265-0.038-0.382-0.118l-2.671-1.814				c-0.309-0.21-0.388-0.629-0.177-0.936c0.211-0.307,0.632-0.386,0.942-0.176l2.671,1.814c0.309,0.21,0.388,0.629,0.177,0.936				C34.896,23.856,34.684,23.958,34.467,23.958z"></path>
                      <lineargradient id="SVGID_4_2_" gradientUnits="userSpaceOnUse" x1="24.209" y1="0.1849" x2="24.209" y2="73.8946">
                        <stop offset="0" style="stop-color:#E9DA5B"></stop>
                        <stop offset="1" style="stop-color:#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_4_2_)" d="M24.507,11.056c-0.32,0-0.604-0.226-0.665-0.549l-0.598-3.159				c-0.069-0.365,0.173-0.717,0.541-0.786c0.368-0.069,0.722,0.172,0.791,0.537l0.598,3.159c0.069,0.365-0.173,0.717-0.541,0.786				C24.591,11.053,24.549,11.056,24.507,11.056z"></path>
                      <lineargradient id="SVGID_5_2_" gradientUnits="userSpaceOnUse" x1="30.8246" y1="0.1849" x2="30.8246" y2="73.8946">
                        <stop offset="0" style="stop-color:#E9DA5B"></stop>
                        <stop offset="1" style="stop-color:#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_5_2_)" d="M29.911,12.183c-0.132,0-0.265-0.038-0.382-0.117c-0.309-0.21-0.388-0.629-0.177-0.936l1.826-2.654				C31.389,8.169,31.811,8.09,32.12,8.3c0.309,0.21,0.388,0.629,0.177,0.936l-1.826,2.654C30.34,12.08,30.127,12.183,29.911,12.183z"></path>
                      <lineargradient id="SVGID_6_2_" gradientUnits="userSpaceOnUse" x1="15.3905" y1="0.1849" x2="15.3905" y2="73.8946">
                        <stop offset="0" style="stop-color:#E9DA5B"></stop>
                        <stop offset="1" style="stop-color:#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_6_2_)" d="M25.247,30.848H5.504c-3.014,0-5.467-2.436-5.467-5.431c0-2.843,2.211-5.183,5.014-5.408				c-0.329-2.627,0.425-5.262,2.123-7.339c1.87-2.287,4.644-3.599,7.61-3.599c5.406,0,9.805,4.37,9.805,9.741				c0,0.387-0.024,0.776-0.071,1.163c0.246-0.034,0.494-0.051,0.742-0.051c3.025,0,5.485,2.451,5.485,5.463				C30.744,28.398,28.278,30.848,25.247,30.848z M5.495,21.337c-2.262,0-4.103,1.83-4.103,4.08c0,2.252,1.844,4.085,4.112,4.085				h19.743c2.284,0,4.142-1.846,4.142-4.115c0-2.27-1.853-4.117-4.13-4.117c-0.46,0-0.919,0.078-1.365,0.231l-1.158,0.398				l0.277-1.186c0.146-0.626,0.22-1.266,0.22-1.902c0-4.629-3.79-8.394-8.449-8.394c-2.556,0-4.946,1.131-6.558,3.102				c-1.613,1.973-2.237,4.531-1.713,7.02l0.184,0.873l-0.895-0.063C5.698,21.341,5.596,21.337,5.495,21.337z"></path>
                    </g>
                    <lineargradient id="SVGID_7_2_" gradientUnits="userSpaceOnUse" x1="41.1902" y1="0.1849" x2="41.1902" y2="73.8946">
                      <stop offset="0" style="stop-color:#E9DA5B"></stop>
                      <stop offset="1" style="stop-color:#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_7_2_)" d="M13.593,74.058c-0.22,0-0.436-0.107-0.567-0.303c-0.206-0.311-0.119-0.728,0.193-0.933			l55.196-36.111c0.313-0.205,0.733-0.119,0.939,0.192c0.206,0.311,0.119,0.728-0.193,0.933L13.965,73.947			C13.85,74.022,13.721,74.058,13.593,74.058z"></path>
                    <lineargradient id="SVGID_8_2_" gradientUnits="userSpaceOnUse" x1="49.9813" y1="0.1849" x2="49.9813" y2="73.8946">
                      <stop offset="0" style="stop-color:#E9DA5B"></stop>
                      <stop offset="1" style="stop-color:#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_8_2_)" d="M31.175,74.058c-0.22,0-0.436-0.107-0.567-0.303c-0.206-0.311-0.119-0.728,0.193-0.933			l37.613-24.609c0.313-0.205,0.733-0.119,0.939,0.192c0.206,0.311,0.119,0.728-0.193,0.933L31.547,73.947			C31.432,74.022,31.303,74.058,31.175,74.058z"></path>
                    <lineargradient id="SVGID_9_2_" gradientUnits="userSpaceOnUse" x1="58.7706" y1="0.1849" x2="58.7706" y2="73.8946">
                      <stop offset="0" style="stop-color:#E9DA5B"></stop>
                      <stop offset="1" style="stop-color:#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_9_2_)" d="M48.754,74.058c-0.22,0-0.436-0.107-0.567-0.303c-0.206-0.311-0.119-0.728,0.193-0.933			l20.035-13.108c0.313-0.205,0.733-0.119,0.939,0.192c0.206,0.311,0.119,0.728-0.193,0.933L49.126,73.947			C49.011,74.022,48.882,74.058,48.754,74.058z"></path>
                    <lineargradient id="SVGID_10_2_" gradientUnits="userSpaceOnUse" x1="22.0334" y1="0.1849" x2="22.0334" y2="73.8946">
                      <stop offset="0" style="stop-color:#E9DA5B"></stop>
                      <stop offset="1" style="stop-color:#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_10_2_)" d="M42.317,55.266c-0.067,0-0.135-0.01-0.203-0.031L1.547,42.603			c-0.357-0.111-0.556-0.489-0.444-0.844c0.112-0.355,0.491-0.552,0.849-0.441L42.52,53.95c0.357,0.111,0.556,0.489,0.444,0.844			C42.873,55.082,42.606,55.266,42.317,55.266z"></path>
                    <lineargradient id="SVGID_11_2_" gradientUnits="userSpaceOnUse" x1="18.4126" y1="0.1849" x2="18.4126" y2="73.8946">
                      <stop offset="0" style="stop-color:#E9DA5B"></stop>
                      <stop offset="1" style="stop-color:#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_11_2_)" d="M31.894,62.085c-0.067,0-0.135-0.01-0.203-0.031L4.729,53.658			c-0.357-0.111-0.556-0.489-0.444-0.844c0.112-0.355,0.492-0.552,0.849-0.441l26.961,8.395c0.357,0.111,0.556,0.489,0.444,0.844			C32.449,61.9,32.182,62.085,31.894,62.085z"></path>
                    <lineargradient id="SVGID_12_2_" gradientUnits="userSpaceOnUse" x1="14.7904" y1="0.1849" x2="14.7904" y2="73.8946">
                      <stop offset="0" style="stop-color:#E9DA5B"></stop>
                      <stop offset="1" style="stop-color:#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_12_2_)" d="M21.466,68.907c-0.067,0-0.135-0.01-0.203-0.031L7.912,64.717			c-0.357-0.111-0.556-0.489-0.444-0.844c0.112-0.355,0.492-0.552,0.849-0.441l13.352,4.159c0.357,0.111,0.556,0.489,0.444,0.844			C22.022,68.722,21.755,68.907,21.466,68.907z"></path>
                    <g>
                      <lineargradient id="SVGID_13_2_" gradientUnits="userSpaceOnUse" x1="46.3627" y1="0.1849" x2="46.3627" y2="73.8946">
                        <stop offset="0" style="stop-color:#E9DA5B"></stop>
                        <stop offset="1" style="stop-color:#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_13_2_)" d="M46.503,41.771c-1.18,0-2.311-0.438-3.184-1.233c-2.9-2.654-6.356-6.598-6.356-10.324				c0-5.742,8.568-22.94,8.933-23.67l0.607-1.213l0.607,1.214c0.035,0.069,3.503,7.02,6.082,13.544l0.047,0.119v0.127				c0,0.372-0.303,0.675-0.678,0.675c-0.302,0-0.559-0.196-0.646-0.467c-1.91-4.828-4.308-9.885-5.412-12.161				c-1.99,4.104-8.185,17.253-8.185,21.833c0,3.409,3.708,7.31,5.918,9.333c0.621,0.566,1.426,0.878,2.267,0.878				c0.84,0,1.645-0.311,2.264-0.875c2.126-1.945,4.836-4.862,5.667-7.711c0.104-0.357,0.479-0.563,0.84-0.459				c0.36,0.103,0.566,0.477,0.462,0.834c-0.918,3.148-3.798,6.266-6.052,8.328C48.813,41.335,47.683,41.771,46.503,41.771z"></path>
                      <lineargradient id="SVGID_14_2_" gradientUnits="userSpaceOnUse" x1="46.5028" y1="0.1849" x2="46.5028" y2="73.8946">
                        <stop offset="0" style="stop-color:#E9DA5B"></stop>
                        <stop offset="1" style="stop-color:#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_14_2_)" d="M46.503,52.529c-0.374,0-0.678-0.301-0.678-0.673V41.098c0-0.372,0.303-0.673,0.678-0.673				s0.678,0.301,0.678,0.673v10.757C47.181,52.227,46.877,52.529,46.503,52.529z"></path>
                      <lineargradient id="SVGID_15_2_" gradientUnits="userSpaceOnUse" x1="49.3196" y1="0.1849" x2="49.3196" y2="73.8946">
                        <stop offset="0" style="stop-color:#E9DA5B"></stop>
                        <stop offset="1" style="stop-color:#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_15_2_)" d="M49.32,31.407c-0.374,0-0.678-0.301-0.678-0.673v-2.852c0-0.372,0.303-0.673,0.678-0.673				c0.374,0,0.678,0.301,0.678,0.673v2.852C49.997,31.105,49.694,31.407,49.32,31.407z"></path>
                      <lineargradient id="SVGID_16_2_" gradientUnits="userSpaceOnUse" x1="44.9514" y1="0.1849" x2="44.9514" y2="73.8946">
                        <stop offset="0" style="stop-color:#E9DA5B"></stop>
                        <stop offset="1" style="stop-color:#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_16_2_)" d="M44.951,31.407c-0.374,0-0.678-0.301-0.678-0.673v-2.852c0-0.372,0.303-0.673,0.678-0.673				c0.374,0,0.678,0.301,0.678,0.673v2.852C45.629,31.105,45.326,31.407,44.951,31.407z"></path>
                      <lineargradient id="SVGID_17_2_" gradientUnits="userSpaceOnUse" x1="45.9498" y1="0.1849" x2="45.9498" y2="73.8946">
                        <stop offset="0" style="stop-color:#E9DA5B"></stop>
                        <stop offset="1" style="stop-color:#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_17_2_)" d="M45.95,21.984c-0.374,0-0.678-0.301-0.678-0.673v-2.852c0-0.372,0.303-0.673,0.678-0.673				c0.374,0,0.678,0.301,0.678,0.673v2.852C46.627,21.682,46.324,21.984,45.95,21.984z"></path>
                    </g>
                    <g>
                      <lineargradient id="SVGID_18_2_" gradientUnits="userSpaceOnUse" x1="60.498" y1="0.1849" x2="60.498" y2="73.8946">
                        <stop offset="0" style="stop-color:#E9DA5B"></stop>
                        <stop offset="1" style="stop-color:#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_18_2_)" d="M60.5,36.5c-1.181,0-2.312-0.438-3.185-1.235c-2.899-2.647-6.356-6.586-6.356-10.322				c0-5.741,8.567-22.942,8.932-23.672l0.607-1.214l0.607,1.214c0.365,0.729,8.932,17.93,8.932,23.671				c0,3.737-3.458,7.678-6.359,10.326C62.808,36.063,61.679,36.5,60.5,36.5z M60.498,3.11c-1.99,4.106-8.184,17.255-8.184,21.834				c0,3.418,3.707,7.313,5.917,9.33c0.621,0.567,1.427,0.88,2.268,0.88c0.839,0,1.642-0.311,2.261-0.876				c2.211-2.018,5.921-5.915,5.921-9.334C68.681,20.364,62.488,7.215,60.498,3.11z"></path>
                      <lineargradient id="SVGID_19_2_" gradientUnits="userSpaceOnUse" x1="60.4987" y1="0.1849" x2="60.4987" y2="73.8946">
                        <stop offset="0" style="stop-color:#E9DA5B"></stop>
                        <stop offset="1" style="stop-color:#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_19_2_)" d="M60.499,43.371c-0.374,0-0.678-0.301-0.678-0.673v-6.87c0-0.372,0.303-0.673,0.678-0.673				s0.678,0.301,0.678,0.673v6.87C61.176,43.069,60.873,43.371,60.499,43.371z"></path>
                      <lineargradient id="SVGID_20_2_" gradientUnits="userSpaceOnUse" x1="63.3152" y1="0.1849" x2="63.3152" y2="73.8946">
                        <stop offset="0" style="stop-color:#E9DA5B"></stop>
                        <stop offset="1" style="stop-color:#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_20_2_)" d="M63.315,26.137c-0.374,0-0.678-0.301-0.678-0.673v-2.852c0-0.372,0.303-0.673,0.678-0.673				c0.374,0,0.678,0.301,0.678,0.673v2.852C63.993,25.835,63.69,26.137,63.315,26.137z"></path>
                      <lineargradient id="SVGID_21_2_" gradientUnits="userSpaceOnUse" x1="58.947" y1="0.1849" x2="58.947" y2="73.8946">
                        <stop offset="0" style="stop-color:#E9DA5B"></stop>
                        <stop offset="1" style="stop-color:#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_21_2_)" d="M58.947,26.137c-0.374,0-0.678-0.301-0.678-0.673v-2.852c0-0.372,0.303-0.673,0.678-0.673				c0.374,0,0.678,0.301,0.678,0.673v2.852C59.625,25.835,59.321,26.137,58.947,26.137z"></path>
                      <lineargradient id="SVGID_22_2_" gradientUnits="userSpaceOnUse" x1="59.9454" y1="0.1849" x2="59.9454" y2="73.8946">
                        <stop offset="0" style="stop-color:#E9DA5B"></stop>
                        <stop offset="1" style="stop-color:#76A86F"></stop>
                      </lineargradient>
                      <path fill="url(#SVGID_22_2_)" d="M59.945,16.713c-0.374,0-0.678-0.301-0.678-0.673v-2.852c0-0.372,0.303-0.673,0.678-0.673				c0.374,0,0.678,0.301,0.678,0.673v2.852C60.623,16.412,60.32,16.713,59.945,16.713z"></path>
                    </g>
                  </g>
                </svg>
              </div>
            </div>
            <h5 class="box-icon-modern-title"><a href="topografia.php">Topografia</a></h5>
            <p class="box-icon-modern-text"></p>
          </article>
        </div>

        <div class="col-sm-4 col-lg-2 wow fadeInLeft" data-wow-delay=".1s">
          <article class="box-icon-modern">
            <div class="box-icon-modern-header">
              <div class="box-icon-modern-svg">
                <svg x="0px" y="0px" width="72px" height="67px" viewBox="0 0 72 67" enable-background="new 0 0 72 67">
                  <g>
                    <lineargradient id="SVGID_1_3_" gradientUnits="userSpaceOnUse" x1="36.0002" y1="0.0548" x2="36.0002" y2="67.1024">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_1_3_)" d="M51.652,67H20.348V42.571h31.305V67z M21.571,65.768H50.43V43.803H21.571V65.768z"></path>
                    <lineargradient id="SVGID_2_3_" gradientUnits="userSpaceOnUse" x1="36.0002" y1="0.0548" x2="36.0002" y2="67.1024">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_2_3_)" d="M36,67c-0.206,0-0.399-0.105-0.512-0.279L20.447,43.524c-0.185-0.285-0.105-0.666,0.178-0.853			c0.283-0.186,0.662-0.106,0.846,0.179L36,65.258L50.529,42.85c0.184-0.285,0.564-0.365,0.846-0.179			c0.283,0.186,0.362,0.568,0.178,0.853L36.512,66.721C36.399,66.895,36.206,67,36,67z"></path>
                    <lineargradient id="SVGID_3_3_" gradientUnits="userSpaceOnUse" x1="36.0002" y1="0.0548" x2="36.0002" y2="67.1024">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_3_3_)" d="M51.042,67c-0.2,0-0.395-0.098-0.512-0.279L36,44.314L21.471,66.721			c-0.184,0.285-0.563,0.365-0.846,0.179c-0.283-0.186-0.362-0.568-0.178-0.853L35.488,42.85c0.113-0.174,0.306-0.279,0.512-0.279			s0.399,0.105,0.512,0.279l15.041,23.197c0.185,0.285,0.105,0.666-0.178,0.853C51.272,66.968,51.156,67,51.042,67z"></path>
                    <lineargradient id="SVGID_4_3_" gradientUnits="userSpaceOnUse" x1="36" y1="0.0548" x2="36" y2="67.1024">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_4_3_)" d="M36,67c-0.338,0-0.611-0.276-0.611-0.616V43.187c0-0.34,0.274-0.616,0.611-0.616			s0.611,0.276,0.611,0.616v23.197C36.611,66.724,36.338,67,36,67z"></path>
                    <lineargradient id="SVGID_5_3_" gradientUnits="userSpaceOnUse" x1="36" y1="0.0548" x2="36" y2="67.1024">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_5_3_)" d="M41.041,27.211H30.959v-7.353h10.082V27.211z M32.182,25.979h7.636V21.09h-7.636V25.979z"></path>
                    <lineargradient id="SVGID_6_3_" gradientUnits="userSpaceOnUse" x1="14.1638" y1="0.0548" x2="14.1638" y2="67.1024">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_6_3_)" d="M21.571,67H6.756V30.444c0-0.34,0.274-0.616,0.611-0.616s0.611,0.276,0.611,0.616v35.324h12.37			v-22.58c0-0.34,0.274-0.616,0.611-0.616c0.338,0,0.611,0.276,0.611,0.616V67z"></path>
                    <lineargradient id="SVGID_7_3_" gradientUnits="userSpaceOnUse" x1="57.8365" y1="0.0548" x2="57.8365" y2="67.1024">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_7_3_)" d="M65.244,67H50.429V43.188c0-0.34,0.274-0.616,0.611-0.616c0.338,0,0.611,0.276,0.611,0.616v22.58			h12.369V30.444c0-0.34,0.274-0.616,0.611-0.616c0.338,0,0.611,0.276,0.611,0.616V67z"></path>
                    <lineargradient id="SVGID_8_3_" gradientUnits="userSpaceOnUse" x1="36" y1="0.0548" x2="36" y2="67.1024">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_8_3_)" d="M67.793,37.395L54.987,14.341L36,5.364l-18.987,8.977L4.207,37.395L0,35.023l13.563-24.415L36,0			l22.438,10.608L72,35.023L67.793,37.395z M36,4.004l19.862,9.391l12.401,22.324l2.072-1.168L57.563,11.555L36,1.361L14.438,11.555			L1.664,34.55l2.072,1.168l12.401-22.324L36,4.004z"></path>
                    <lineargradient id="SVGID_9_3_" gradientUnits="userSpaceOnUse" x1="36" y1="0.0548" x2="36" y2="67.1024">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_9_3_)" d="M36,18.312c-0.338,0-0.611-0.276-0.611-0.616V8.393c0-0.34,0.274-0.616,0.611-0.616			s0.611,0.276,0.611,0.616v9.303C36.611,18.036,36.338,18.312,36,18.312z"></path>
                    <lineargradient id="SVGID_10_3_" gradientUnits="userSpaceOnUse" x1="36" y1="0.0548" x2="36" y2="67.1024">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_10_3_)" d="M36,40.421c-0.338,0-0.611-0.276-0.611-0.616v-9.092c0-0.34,0.274-0.616,0.611-0.616			s0.611,0.276,0.611,0.616v9.092C36.611,40.145,36.338,40.421,36,40.421z"></path>
                    <lineargradient id="SVGID_11_3_" gradientUnits="userSpaceOnUse" x1="28.2748" y1="0.0548" x2="28.2748" y2="67.1024">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_11_3_)" d="M28.275,40.421c-0.338,0-0.611-0.276-0.611-0.616V12.622c0-0.34,0.274-0.616,0.611-0.616			c0.338,0,0.611,0.276,0.611,0.616v27.183C28.886,40.145,28.613,40.421,28.275,40.421z"></path>
                    <lineargradient id="SVGID_12_3_" gradientUnits="userSpaceOnUse" x1="43.7252" y1="0.0548" x2="43.7252" y2="67.1024">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_12_3_)" d="M43.725,40.421c-0.338,0-0.611-0.276-0.611-0.616V12.622c0-0.34,0.274-0.616,0.611-0.616			s0.611,0.276,0.611,0.616v27.183C44.337,40.145,44.063,40.421,43.725,40.421z"></path>
                    <lineargradient id="SVGID_13_3_" gradientUnits="userSpaceOnUse" x1="21.559" y1="0.0548" x2="21.559" y2="67.1024">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_13_3_)" d="M21.559,40.421c-0.338,0-0.611-0.276-0.611-0.616V16.218c0-0.34,0.274-0.616,0.611-0.616			c0.338,0,0.611,0.276,0.611,0.616v23.587C22.17,40.145,21.897,40.421,21.559,40.421z"></path>
                    <lineargradient id="SVGID_14_3_" gradientUnits="userSpaceOnUse" x1="50.441" y1="0.0548" x2="50.441" y2="67.1024">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_14_3_)" d="M50.441,40.421c-0.338,0-0.611-0.276-0.611-0.616V16.218c0-0.34,0.274-0.616,0.611-0.616			c0.338,0,0.611,0.276,0.611,0.616v23.587C51.052,40.145,50.779,40.421,50.441,40.421z"></path>
                    <lineargradient id="SVGID_15_3_" gradientUnits="userSpaceOnUse" x1="14.8438" y1="0.0548" x2="14.8438" y2="67.1024">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_15_3_)" d="M14.844,64.101c-0.338,0-0.611-0.276-0.611-0.616v-39.95c0-0.34,0.274-0.616,0.611-0.616			c0.338,0,0.611,0.276,0.611,0.616v39.95C15.455,63.825,15.182,64.101,14.844,64.101z"></path>
                    <lineargradient id="SVGID_16_3_" gradientUnits="userSpaceOnUse" x1="57.1568" y1="0.0548" x2="57.1568" y2="67.1024">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_16_3_)" d="M57.157,64.101c-0.338,0-0.611-0.276-0.611-0.616v-39.95c0-0.34,0.274-0.616,0.611-0.616			c0.338,0,0.611,0.276,0.611,0.616v39.95C57.768,63.825,57.495,64.101,57.157,64.101z"></path>
                  </g>
                </svg>
              </div>
            </div>
            <h5 class="box-icon-modern-title"><a href="ambiental.php">Ambiental</a></h5>
            <p class="box-icon-modern-text"></p>
          </article>
        </div>
        <div class="col-sm-4 col-lg-2 wow fadeInLeft">
          <article class="box-icon-modern">
            <div class="box-icon-modern-header">
              <div class="box-icon-modern-svg">
                <svg x="0px" y="0px" width="72px" height="72px" viewBox="0 0 72 72" enable-background="new 0 0 72 72">
                  <g>
                    <lineargradient id="SVGID_1_4_" gradientUnits="userSpaceOnUse" x1="47.3798" y1="-0.0376" x2="47.3798" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_1_4_)" d="M47.395,26.605c-0.156,0-0.312-0.056-0.436-0.169c-0.265-0.241-0.285-0.651-0.044-0.917			c4.517-4.971,6.563-11.747,5.594-18.344c-1.346,1.262-2.787,2.151-4.19,3.017c-2.455,1.515-4.774,2.945-6.361,6.239			c-0.102,0.226-0.328,0.383-0.592,0.383c-0.358,0-0.649-0.29-0.649-0.648v-0.149l0.064-0.133c1.752-3.647,4.347-5.248,6.856-6.797			c1.644-1.014,3.344-2.063,4.808-3.702l0.86-0.963l0.259,1.265c1.512,7.38-0.614,15.12-5.689,20.705			C47.748,26.533,47.572,26.605,47.395,26.605z"></path>
                    <lineargradient id="SVGID_2_4_" gradientUnits="userSpaceOnUse" x1="45.1335" y1="-0.0376" x2="45.1335" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_2_4_)" d="M44.008,23.739c-0.11,0-0.222-0.028-0.324-0.087c-0.31-0.179-0.417-0.576-0.237-0.886l2.249-3.896			c0.179-0.31,0.576-0.417,0.886-0.237c0.31,0.179,0.417,0.576,0.237,0.886l-2.249,3.896C44.451,23.623,44.233,23.739,44.008,23.739z			"></path>
                    <lineargradient id="SVGID_3_4_" gradientUnits="userSpaceOnUse" x1="58.3442" y1="-0.0376" x2="58.3442" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_3_4_)" d="M50.894,33.648c-0.275,0-0.529-0.176-0.618-0.451c-0.109-0.341,0.079-0.706,0.42-0.816			c1.672-0.535,3.296-1.277,4.827-2.204l0.132-0.08c4.105-2.535,7.282-6.335,9.054-10.804c-1.799,0.421-3.487,0.469-5.131,0.516			c-2.878,0.083-5.596,0.161-8.653,2.236c-0.297,0.201-0.7,0.124-0.901-0.172c-0.201-0.296-0.124-0.7,0.172-0.901			c3.37-2.289,6.407-2.376,9.344-2.46c1.924-0.055,3.914-0.112,6.008-0.801l1.227-0.404l-0.408,1.225			c-1.771,5.314-5.383,9.843-10.169,12.754L56.04,31.38c-1.572,0.936-3.236,1.688-4.948,2.236			C51.026,33.638,50.959,33.648,50.894,33.648z"></path>
                    <lineargradient id="SVGID_4_4_" gradientUnits="userSpaceOnUse" x1="51.3397" y1="-0.0376" x2="51.3397" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_4_4_)" d="M49.393,29.473c-0.224,0-0.442-0.116-0.563-0.325c-0.179-0.31-0.073-0.707,0.238-0.886l3.895-2.248			c0.311-0.179,0.707-0.073,0.886,0.238c0.179,0.31,0.073,0.707-0.238,0.886l-3.895,2.248C49.614,29.445,49.503,29.473,49.393,29.473			z"></path>
                    <lineargradient id="SVGID_5_4_" gradientUnits="userSpaceOnUse" x1="60.876" y1="-0.0376" x2="60.876" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_5_4_)" d="M55.274,42.02c-1.672,0-3.351-0.177-5.011-0.538c-0.35-0.076-0.572-0.422-0.496-0.772			c0.076-0.35,0.422-0.572,0.772-0.496c6.557,1.427,13.447-0.19,18.678-4.328c-1.762-0.534-3.256-1.339-4.71-2.121			c-2.551-1.374-4.961-2.671-8.595-2.386l-0.051,0.002c-0.358,0-0.649-0.29-0.649-0.649c0-0.346,0.27-0.628,0.611-0.648			c4.009-0.311,6.698,1.137,9.3,2.538c1.704,0.918,3.467,1.867,5.613,2.314L72,35.2l-0.967,0.857			C66.665,39.93,61.02,42.02,55.274,42.02z"></path>
                    <lineargradient id="SVGID_6_4_" gradientUnits="userSpaceOnUse" x1="53.4335" y1="-0.0376" x2="53.4335" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_6_4_)" d="M55.683,37.132h-4.499c-0.358,0-0.649-0.291-0.649-0.649c0-0.358,0.29-0.649,0.649-0.649h4.499			c0.358,0,0.649,0.29,0.649,0.649C56.332,36.841,56.041,37.132,55.683,37.132z"></path>
                    <lineargradient id="SVGID_7_4_" gradientUnits="userSpaceOnUse" x1="56.4901" y1="-0.0376" x2="56.4901" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_7_4_)" d="M61.567,54.045c-3.955,0-7.876-0.989-11.381-2.91l-0.054-0.029c-1.464-0.777-3.148-1.977-4.518-3.22			c-0.265-0.241-0.285-0.651-0.045-0.917c0.241-0.265,0.651-0.285,0.916-0.044c1.311,1.189,2.92,2.334,4.305,3.061l0.093,0.052			c4.267,2.313,9.164,3.174,13.939,2.471c-1.262-1.345-2.151-2.786-3.017-4.189c-1.516-2.457-2.948-4.777-6.254-6.367l-0.113-0.054			l-0.084-0.092c-0.242-0.264-0.225-0.676,0.039-0.918c0.213-0.195,0.52-0.222,0.757-0.088c3.623,1.754,5.218,4.338,6.76,6.837			c1.014,1.643,2.062,3.342,3.702,4.806l0.964,0.861l-1.266,0.259C64.742,53.886,63.152,54.045,61.567,54.045z"></path>
                    <lineargradient id="SVGID_8_4_" gradientUnits="userSpaceOnUse" x1="50.8568" y1="-0.0376" x2="50.8568" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_8_4_)" d="M52.804,46.908c-0.11,0-0.222-0.028-0.324-0.087l-3.896-2.25c-0.31-0.179-0.417-0.576-0.237-0.886			c0.179-0.31,0.576-0.417,0.886-0.237l3.896,2.25c0.31,0.179,0.417,0.576,0.237,0.886C53.247,46.792,53.029,46.908,52.804,46.908z"></path>
                    <lineargradient id="SVGID_9_4_" gradientUnits="userSpaceOnUse" x1="46.5222" y1="-0.0376" x2="46.5222" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_9_4_)" d="M54.692,66.777l-1.226-0.409c-7.145-2.382-12.783-8.092-15.082-15.274			c-0.109-0.341,0.079-0.706,0.42-0.816c0.342-0.109,0.706,0.079,0.816,0.42c2.047,6.396,6.896,11.557,13.098,14.016			c-0.371-1.684-0.456-3.483-0.539-5.233c-0.152-3.219-0.295-6.262-2.096-8.402c-1.452-0.778-3.114-1.964-4.469-3.193			c-0.265-0.241-0.285-0.651-0.045-0.917c0.241-0.265,0.651-0.285,0.916-0.044c1.311,1.189,2.92,2.334,4.305,3.061l0.114,0.061			l0.08,0.092c2.168,2.485,2.331,5.94,2.488,9.281c0.099,2.102,0.201,4.276,0.812,6.129L54.692,66.777z"></path>
                    <lineargradient id="SVGID_10_4_" gradientUnits="userSpaceOnUse" x1="44.299" y1="-0.0376" x2="44.299" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_10_4_)" d="M45.424,53.937c-0.224,0-0.442-0.116-0.563-0.325l-2.248-3.895			c-0.179-0.31-0.073-0.707,0.238-0.886c0.311-0.179,0.707-0.073,0.886,0.238l2.248,3.895c0.179,0.31,0.073,0.707-0.238,0.886			C45.645,53.909,45.534,53.937,45.424,53.937z"></path>
                    <lineargradient id="SVGID_11_4_" gradientUnits="userSpaceOnUse" x1="35.9732" y1="-0.0376" x2="35.9732" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_11_4_)" d="M36.8,72l-0.857-0.966c-4.993-5.629-7.022-13.393-5.427-20.769l0.111-0.512h0.524			c0.358,0,0.65,0.29,0.65,0.649c0,0.059-0.008,0.116-0.023,0.171c-1.407,6.556,0.211,13.431,4.338,18.647			c0.533-1.749,1.339-3.254,2.124-4.718c1.386-2.585,2.695-5.027,2.383-8.584c-0.031-0.357,0.233-0.672,0.589-0.703			c0.36-0.03,0.672,0.233,0.703,0.59c0.346,3.943-1.117,6.672-2.532,9.311c-0.923,1.721-1.876,3.5-2.319,5.621L36.8,72z"></path>
                    <lineargradient id="SVGID_12_4_" gradientUnits="userSpaceOnUse" x1="35.5162" y1="-0.0376" x2="35.5162" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_12_4_)" d="M35.516,56.333c-0.358,0-0.649-0.291-0.649-0.649v-4.499c0-0.358,0.29-0.649,0.649-0.649			s0.649,0.291,0.649,0.649v4.499C36.165,56.042,35.875,56.333,35.516,56.333z"></path>
                    <lineargradient id="SVGID_13_4_" gradientUnits="userSpaceOnUse" x1="24.617" y1="-0.0376" x2="24.617" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_13_4_)" d="M18.692,67.576l-0.259-1.265c-1.119-5.467-0.267-11.172,2.4-16.071l0.028-0.053			c0.822-1.535,2.011-3.204,3.261-4.578c0.241-0.265,0.651-0.285,0.916-0.043c0.265,0.241,0.284,0.651,0.043,0.917			c-1.143,1.257-2.23,2.771-3,4.176v0.002l-0.08,0.147c-2.344,4.278-3.221,9.21-2.514,14.017c1.346-1.262,2.786-2.15,4.187-3.013			c2.455-1.513,4.774-2.943,6.372-6.257c0.155-0.323,0.543-0.458,0.866-0.303c0.323,0.156,0.458,0.543,0.303,0.866			c-1.763,3.656-4.354,5.253-6.86,6.798c-1.641,1.012-3.338,2.058-4.804,3.698L18.692,67.576z"></path>
                    <lineargradient id="SVGID_14_4_" gradientUnits="userSpaceOnUse" x1="26.8636" y1="-0.0376" x2="26.8636" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_14_4_)" d="M25.739,53.453c-0.11,0-0.222-0.028-0.324-0.087c-0.31-0.179-0.417-0.576-0.238-0.886l2.248-3.895			c0.179-0.31,0.576-0.417,0.886-0.238c0.31,0.179,0.417,0.576,0.238,0.886l-2.248,3.895C26.182,53.337,25.963,53.453,25.739,53.453z			"></path>
                    <lineargradient id="SVGID_15_4_" gradientUnits="userSpaceOnUse" x1="13.6523" y1="-0.0376" x2="13.6523" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_15_4_)" d="M5.222,54.692l0.408-1.226c1.771-5.313,5.382-9.841,10.17-12.753			c1.591-0.963,3.281-1.738,5.025-2.305c0.34-0.111,0.707,0.076,0.818,0.416c0.111,0.341-0.075,0.707-0.416,0.818			c-1.649,0.536-3.248,1.27-4.753,2.181c-4.168,2.535-7.394,6.368-9.185,10.883c1.798-0.42,3.491-0.469,5.138-0.517			c2.885-0.084,5.609-0.163,8.641-2.231c0.296-0.202,0.7-0.125,0.902,0.17c0.202,0.296,0.126,0.7-0.17,0.902			c-3.346,2.283-6.391,2.371-9.335,2.457c-1.93,0.056-3.925,0.114-6.015,0.802L5.222,54.692z"></path>
                    <lineargradient id="SVGID_16_4_" gradientUnits="userSpaceOnUse" x1="20.6426" y1="-0.0376" x2="20.6426" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_16_4_)" d="M18.712,46.072c-0.224,0-0.442-0.116-0.563-0.325c-0.179-0.31-0.073-0.707,0.238-0.886l3.863-2.23			c0.311-0.179,0.707-0.073,0.886,0.238c0.179,0.31,0.073,0.707-0.238,0.886l-3.863,2.23C18.933,46.045,18.822,46.072,18.712,46.072z			"></path>
                    <lineargradient id="SVGID_17_4_" gradientUnits="userSpaceOnUse" x1="11.1232" y1="-0.0376" x2="11.1232" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_17_4_)" d="M15.094,41.959c-3.427,0-5.857-1.31-8.216-2.58c-1.704-0.918-3.466-1.867-5.614-2.315L0,36.801			l0.966-0.857c4.188-3.716,9.579-5.833,15.18-5.961c1.875-0.042,3.756,0.138,5.589,0.535c0.35,0.076,0.573,0.421,0.497,0.772			c-0.076,0.35-0.422,0.573-0.771,0.497c-1.734-0.376-3.511-0.546-5.285-0.506c-4.878,0.111-9.587,1.819-13.394,4.834			c1.764,0.534,3.258,1.339,4.712,2.122c2.549,1.373,4.958,2.669,8.593,2.385c0.357-0.028,0.67,0.239,0.697,0.596			c0.028,0.357-0.239,0.67-0.596,0.697C15.812,41.945,15.448,41.959,15.094,41.959z"></path>
                    <lineargradient id="SVGID_18_4_" gradientUnits="userSpaceOnUse" x1="18.5331" y1="-0.0376" x2="18.5331" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_18_4_)" d="M20.752,36.166h-4.437c-0.358,0-0.649-0.291-0.649-0.649s0.29-0.649,0.649-0.649h4.437			c0.358,0,0.649,0.291,0.649,0.649S21.11,36.166,20.752,36.166z"></path>
                    <lineargradient id="SVGID_19_4_" gradientUnits="userSpaceOnUse" x1="13.2856" y1="-0.0376" x2="13.2856" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_19_4_)" d="M16.161,31.282c-0.109,0-0.218-0.027-0.316-0.083c-3.628-1.763-5.22-4.344-6.76-6.84			c-1.013-1.641-2.06-3.339-3.702-4.804l-0.964-0.86l1.266-0.259c5.486-1.123,11.215-0.262,16.128,2.427			c0.314,0.172,0.43,0.566,0.258,0.881c-0.172,0.314-0.566,0.43-0.881,0.258c-4.279-2.342-9.212-3.217-14.017-2.51			c1.263,1.346,2.151,2.786,3.016,4.187c1.513,2.453,2.943,4.77,6.253,6.369l0.093,0.045l0.074,0.071			c0.259,0.248,0.269,0.66,0.021,0.919C16.503,31.215,16.332,31.282,16.161,31.282z"></path>
                    <lineargradient id="SVGID_20_4_" gradientUnits="userSpaceOnUse" x1="23.7312" y1="-0.0376" x2="23.7312" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_20_4_)" d="M25.955,25.251c-0.156,0-0.312-0.056-0.437-0.169c-1.3-1.183-2.714-2.191-4.324-3.08			c-0.314-0.173-0.427-0.568-0.254-0.882c0.174-0.313,0.568-0.427,0.882-0.254c1.7,0.939,3.194,2.004,4.57,3.256			c0.265,0.241,0.284,0.652,0.043,0.917C26.307,25.18,26.131,25.251,25.955,25.251z"></path>
                    <lineargradient id="SVGID_21_4_" gradientUnits="userSpaceOnUse" x1="21.1413" y1="-0.0376" x2="21.1413" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_21_4_)" d="M23.089,28.64c-0.11,0-0.222-0.028-0.324-0.087l-3.896-2.25c-0.31-0.179-0.417-0.576-0.237-0.886			c0.179-0.31,0.576-0.417,0.886-0.238l3.896,2.25c0.31,0.179,0.417,0.576,0.237,0.886C23.531,28.523,23.313,28.64,23.089,28.64z"></path>
                    <lineargradient id="SVGID_22_4_" gradientUnits="userSpaceOnUse" x1="25.468" y1="-0.0376" x2="25.468" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_22_4_)" d="M21.503,22.081c-0.208,0-0.412-0.1-0.538-0.285c-2.283-3.369-2.369-6.403-2.453-9.338			c-0.055-1.924-0.112-3.914-0.801-6.007l-0.404-1.227l1.226,0.409c7.139,2.38,12.771,8.073,15.067,15.23			c0.109,0.341-0.078,0.706-0.42,0.816c-0.341,0.11-0.706-0.078-0.816-0.42C30.32,14.89,25.483,9.748,19.293,7.29			c0.421,1.798,0.469,3.487,0.516,5.13c0.082,2.876,0.16,5.592,2.23,8.648c0.201,0.297,0.124,0.7-0.173,0.901			C21.755,22.045,21.628,22.081,21.503,22.081z"></path>
                    <lineargradient id="SVGID_23_4_" gradientUnits="userSpaceOnUse" x1="27.694" y1="-0.0376" x2="27.694" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_23_4_)" d="M28.814,23.237c-0.224,0-0.442-0.116-0.562-0.325l-2.238-3.875			c-0.179-0.31-0.073-0.707,0.237-0.886c0.311-0.179,0.707-0.073,0.886,0.237l2.238,3.875c0.179,0.31,0.073,0.707-0.237,0.886			C29.035,23.209,28.924,23.237,28.814,23.237z"></path>
                    <lineargradient id="SVGID_24_4_" gradientUnits="userSpaceOnUse" x1="36.0276" y1="-0.0376" x2="36.0276" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_24_4_)" d="M40.848,22.247c-0.046,0-0.092-0.005-0.138-0.015c-0.35-0.076-0.572-0.422-0.496-0.772			c0.376-1.728,0.55-3.553,0.504-5.276l-0.001-0.021l0.001-0.021c0.003-0.072,0.191-7.011-4.833-13.361			c-0.533,1.753-1.341,3.258-2.126,4.722c-1.385,2.582-2.693,5.02-2.381,8.58c0.031,0.357-0.233,0.672-0.59,0.703			c-0.354,0.031-0.672-0.233-0.703-0.59c-0.346-3.945,1.116-6.671,2.53-9.306c0.923-1.721,1.877-3.5,2.32-5.626L35.199,0l0.857,0.966			c6.101,6.877,5.977,14.635,5.959,15.203c0.047,1.82-0.138,3.744-0.534,5.566C41.415,22.04,41.147,22.247,40.848,22.247z"></path>
                    <lineargradient id="SVGID_25_4_" gradientUnits="userSpaceOnUse" x1="36.4821" y1="-0.0376" x2="36.4821" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_25_4_)" d="M36.482,21.442c-0.358,0-0.649-0.291-0.649-0.649v-4.478c0-0.358,0.29-0.649,0.649-0.649			c0.358,0,0.649,0.291,0.649,0.649v4.478C37.131,21.152,36.84,21.442,36.482,21.442z"></path>
                    <lineargradient id="SVGID_26_4_" gradientUnits="userSpaceOnUse" x1="35.9645" y1="-0.0376" x2="35.9645" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_26_4_)" d="M35.97,51.839c-4.555,0-8.876-1.957-11.857-5.369c-0.821-0.928-1.531-1.926-2.106-2.962			c-1.374-2.472-2.032-5.246-1.903-8.022c0.244-5.592,3.462-10.753,8.397-13.467c2.279-1.253,4.75-1.889,7.345-1.889			c1.321,0,2.665,0.168,3.996,0.5c0.404,0.1,0.813,0.218,1.213,0.353c1.144,0.382,2.253,0.906,3.297,1.556			c0.951,0.589,1.846,1.286,2.658,2.071c0.308,0.297,0.603,0.607,0.876,0.919c0.807,0.914,1.508,1.921,2.08,2.989			c1.312,2.439,1.958,5.201,1.868,7.986c-0.087,2.788-0.908,5.502-2.375,7.849C46.551,49.04,41.508,51.839,35.97,51.839z			M35.845,21.428c-2.373,0-4.634,0.582-6.72,1.728c-4.472,2.46-7.504,7.323-7.726,12.389c-0.118,2.537,0.484,5.072,1.741,7.333			c0.53,0.955,1.185,1.875,1.946,2.735c2.737,3.133,6.702,4.928,10.882,4.928c5.086,0,9.717-2.57,12.387-6.875			c1.346-2.154,2.099-4.645,2.179-7.204c0.082-2.558-0.511-5.093-1.715-7.331c-0.525-0.98-1.169-1.904-1.912-2.746			c-0.251-0.287-0.52-0.569-0.802-0.842c-0.746-0.721-1.567-1.361-2.441-1.902c-0.959-0.598-1.976-1.078-3.024-1.428			c-0.367-0.123-0.742-0.232-1.114-0.324C38.298,21.583,37.06,21.428,35.845,21.428z"></path>
                    <lineargradient id="SVGID_27_4_" gradientUnits="userSpaceOnUse" x1="30.0561" y1="-0.0376" x2="30.0561" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_27_4_)" d="M30.058,35.064c-1.669,0-3.359-1.145-3.359-3.335c0-1.851,1.506-3.357,3.357-3.357			c1.851,0,3.357,1.506,3.357,3.357C33.413,33.918,31.726,35.064,30.058,35.064z M30.056,29.67c-1.136,0-2.06,0.924-2.06,2.059			c0,1.407,1.036,2.037,2.062,2.037c1.024,0,2.058-0.63,2.058-2.037C32.116,30.594,31.192,29.67,30.056,29.67z"></path>
                    <lineargradient id="SVGID_28_4_" gradientUnits="userSpaceOnUse" x1="40.6649" y1="-0.0376" x2="40.6649" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_28_4_)" d="M40.665,33.653c-1.851,0-3.357-1.506-3.357-3.357c0-2.189,1.689-3.334,3.358-3.334			c1.668,0,3.356,1.145,3.356,3.334C44.022,32.147,42.516,33.653,40.665,33.653z M40.666,28.259c-1.026,0-2.061,0.63-2.061,2.037			c0,1.136,0.924,2.06,2.06,2.06c1.136,0,2.06-0.924,2.06-2.06C42.725,28.889,41.691,28.259,40.666,28.259z"></path>
                    <lineargradient id="SVGID_29_4_" gradientUnits="userSpaceOnUse" x1="35.4731" y1="-0.0376" x2="35.4731" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_29_4_)" d="M35.473,43.973c-1.851,0-3.357-1.506-3.357-3.357c0-1.851,1.506-3.357,3.357-3.357			c1.851,0,3.357,1.506,3.357,3.357C38.83,42.467,37.324,43.973,35.473,43.973z M35.473,38.556c-1.136,0-2.06,0.924-2.06,2.059			c0,1.136,0.924,2.06,2.06,2.06c1.136,0,2.06-0.924,2.06-2.06C37.533,39.48,36.609,38.556,35.473,38.556z"></path>
                  </g>
                </svg>
              </div>
            </div>
            <h5 class="box-icon-modern-title"><a href="custeioagricola.php">Custeio Agrícola</a></h5>
            <p class="box-icon-modern-text"> </p>
          </article>
        </div>
        <div class="col-sm-4 col-lg-2 wow fadeInLeft">
          <article class="box-icon-modern">
            <div class="box-icon-modern-header">
              <div class="box-icon-modern-svg">
                <svg x="0px" y="0px" width="72px" height="72px" viewBox="0 0 72 72" enable-background="new 0 0 72 72">
                  <g>
                    <lineargradient id="SVGID_1_4_" gradientUnits="userSpaceOnUse" x1="47.3798" y1="-0.0376" x2="47.3798" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_1_4_)" d="M47.395,26.605c-0.156,0-0.312-0.056-0.436-0.169c-0.265-0.241-0.285-0.651-0.044-0.917			c4.517-4.971,6.563-11.747,5.594-18.344c-1.346,1.262-2.787,2.151-4.19,3.017c-2.455,1.515-4.774,2.945-6.361,6.239			c-0.102,0.226-0.328,0.383-0.592,0.383c-0.358,0-0.649-0.29-0.649-0.648v-0.149l0.064-0.133c1.752-3.647,4.347-5.248,6.856-6.797			c1.644-1.014,3.344-2.063,4.808-3.702l0.86-0.963l0.259,1.265c1.512,7.38-0.614,15.12-5.689,20.705			C47.748,26.533,47.572,26.605,47.395,26.605z"></path>
                    <lineargradient id="SVGID_2_4_" gradientUnits="userSpaceOnUse" x1="45.1335" y1="-0.0376" x2="45.1335" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_2_4_)" d="M44.008,23.739c-0.11,0-0.222-0.028-0.324-0.087c-0.31-0.179-0.417-0.576-0.237-0.886l2.249-3.896			c0.179-0.31,0.576-0.417,0.886-0.237c0.31,0.179,0.417,0.576,0.237,0.886l-2.249,3.896C44.451,23.623,44.233,23.739,44.008,23.739z			"></path>
                    <lineargradient id="SVGID_3_4_" gradientUnits="userSpaceOnUse" x1="58.3442" y1="-0.0376" x2="58.3442" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_3_4_)" d="M50.894,33.648c-0.275,0-0.529-0.176-0.618-0.451c-0.109-0.341,0.079-0.706,0.42-0.816			c1.672-0.535,3.296-1.277,4.827-2.204l0.132-0.08c4.105-2.535,7.282-6.335,9.054-10.804c-1.799,0.421-3.487,0.469-5.131,0.516			c-2.878,0.083-5.596,0.161-8.653,2.236c-0.297,0.201-0.7,0.124-0.901-0.172c-0.201-0.296-0.124-0.7,0.172-0.901			c3.37-2.289,6.407-2.376,9.344-2.46c1.924-0.055,3.914-0.112,6.008-0.801l1.227-0.404l-0.408,1.225			c-1.771,5.314-5.383,9.843-10.169,12.754L56.04,31.38c-1.572,0.936-3.236,1.688-4.948,2.236			C51.026,33.638,50.959,33.648,50.894,33.648z"></path>
                    <lineargradient id="SVGID_4_4_" gradientUnits="userSpaceOnUse" x1="51.3397" y1="-0.0376" x2="51.3397" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_4_4_)" d="M49.393,29.473c-0.224,0-0.442-0.116-0.563-0.325c-0.179-0.31-0.073-0.707,0.238-0.886l3.895-2.248			c0.311-0.179,0.707-0.073,0.886,0.238c0.179,0.31,0.073,0.707-0.238,0.886l-3.895,2.248C49.614,29.445,49.503,29.473,49.393,29.473			z"></path>
                    <lineargradient id="SVGID_5_4_" gradientUnits="userSpaceOnUse" x1="60.876" y1="-0.0376" x2="60.876" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_5_4_)" d="M55.274,42.02c-1.672,0-3.351-0.177-5.011-0.538c-0.35-0.076-0.572-0.422-0.496-0.772			c0.076-0.35,0.422-0.572,0.772-0.496c6.557,1.427,13.447-0.19,18.678-4.328c-1.762-0.534-3.256-1.339-4.71-2.121			c-2.551-1.374-4.961-2.671-8.595-2.386l-0.051,0.002c-0.358,0-0.649-0.29-0.649-0.649c0-0.346,0.27-0.628,0.611-0.648			c4.009-0.311,6.698,1.137,9.3,2.538c1.704,0.918,3.467,1.867,5.613,2.314L72,35.2l-0.967,0.857			C66.665,39.93,61.02,42.02,55.274,42.02z"></path>
                    <lineargradient id="SVGID_6_4_" gradientUnits="userSpaceOnUse" x1="53.4335" y1="-0.0376" x2="53.4335" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_6_4_)" d="M55.683,37.132h-4.499c-0.358,0-0.649-0.291-0.649-0.649c0-0.358,0.29-0.649,0.649-0.649h4.499			c0.358,0,0.649,0.29,0.649,0.649C56.332,36.841,56.041,37.132,55.683,37.132z"></path>
                    <lineargradient id="SVGID_7_4_" gradientUnits="userSpaceOnUse" x1="56.4901" y1="-0.0376" x2="56.4901" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_7_4_)" d="M61.567,54.045c-3.955,0-7.876-0.989-11.381-2.91l-0.054-0.029c-1.464-0.777-3.148-1.977-4.518-3.22			c-0.265-0.241-0.285-0.651-0.045-0.917c0.241-0.265,0.651-0.285,0.916-0.044c1.311,1.189,2.92,2.334,4.305,3.061l0.093,0.052			c4.267,2.313,9.164,3.174,13.939,2.471c-1.262-1.345-2.151-2.786-3.017-4.189c-1.516-2.457-2.948-4.777-6.254-6.367l-0.113-0.054			l-0.084-0.092c-0.242-0.264-0.225-0.676,0.039-0.918c0.213-0.195,0.52-0.222,0.757-0.088c3.623,1.754,5.218,4.338,6.76,6.837			c1.014,1.643,2.062,3.342,3.702,4.806l0.964,0.861l-1.266,0.259C64.742,53.886,63.152,54.045,61.567,54.045z"></path>
                    <lineargradient id="SVGID_8_4_" gradientUnits="userSpaceOnUse" x1="50.8568" y1="-0.0376" x2="50.8568" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_8_4_)" d="M52.804,46.908c-0.11,0-0.222-0.028-0.324-0.087l-3.896-2.25c-0.31-0.179-0.417-0.576-0.237-0.886			c0.179-0.31,0.576-0.417,0.886-0.237l3.896,2.25c0.31,0.179,0.417,0.576,0.237,0.886C53.247,46.792,53.029,46.908,52.804,46.908z"></path>
                    <lineargradient id="SVGID_9_4_" gradientUnits="userSpaceOnUse" x1="46.5222" y1="-0.0376" x2="46.5222" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_9_4_)" d="M54.692,66.777l-1.226-0.409c-7.145-2.382-12.783-8.092-15.082-15.274			c-0.109-0.341,0.079-0.706,0.42-0.816c0.342-0.109,0.706,0.079,0.816,0.42c2.047,6.396,6.896,11.557,13.098,14.016			c-0.371-1.684-0.456-3.483-0.539-5.233c-0.152-3.219-0.295-6.262-2.096-8.402c-1.452-0.778-3.114-1.964-4.469-3.193			c-0.265-0.241-0.285-0.651-0.045-0.917c0.241-0.265,0.651-0.285,0.916-0.044c1.311,1.189,2.92,2.334,4.305,3.061l0.114,0.061			l0.08,0.092c2.168,2.485,2.331,5.94,2.488,9.281c0.099,2.102,0.201,4.276,0.812,6.129L54.692,66.777z"></path>
                    <lineargradient id="SVGID_10_4_" gradientUnits="userSpaceOnUse" x1="44.299" y1="-0.0376" x2="44.299" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_10_4_)" d="M45.424,53.937c-0.224,0-0.442-0.116-0.563-0.325l-2.248-3.895			c-0.179-0.31-0.073-0.707,0.238-0.886c0.311-0.179,0.707-0.073,0.886,0.238l2.248,3.895c0.179,0.31,0.073,0.707-0.238,0.886			C45.645,53.909,45.534,53.937,45.424,53.937z"></path>
                    <lineargradient id="SVGID_11_4_" gradientUnits="userSpaceOnUse" x1="35.9732" y1="-0.0376" x2="35.9732" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_11_4_)" d="M36.8,72l-0.857-0.966c-4.993-5.629-7.022-13.393-5.427-20.769l0.111-0.512h0.524			c0.358,0,0.65,0.29,0.65,0.649c0,0.059-0.008,0.116-0.023,0.171c-1.407,6.556,0.211,13.431,4.338,18.647			c0.533-1.749,1.339-3.254,2.124-4.718c1.386-2.585,2.695-5.027,2.383-8.584c-0.031-0.357,0.233-0.672,0.589-0.703			c0.36-0.03,0.672,0.233,0.703,0.59c0.346,3.943-1.117,6.672-2.532,9.311c-0.923,1.721-1.876,3.5-2.319,5.621L36.8,72z"></path>
                    <lineargradient id="SVGID_12_4_" gradientUnits="userSpaceOnUse" x1="35.5162" y1="-0.0376" x2="35.5162" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_12_4_)" d="M35.516,56.333c-0.358,0-0.649-0.291-0.649-0.649v-4.499c0-0.358,0.29-0.649,0.649-0.649			s0.649,0.291,0.649,0.649v4.499C36.165,56.042,35.875,56.333,35.516,56.333z"></path>
                    <lineargradient id="SVGID_13_4_" gradientUnits="userSpaceOnUse" x1="24.617" y1="-0.0376" x2="24.617" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_13_4_)" d="M18.692,67.576l-0.259-1.265c-1.119-5.467-0.267-11.172,2.4-16.071l0.028-0.053			c0.822-1.535,2.011-3.204,3.261-4.578c0.241-0.265,0.651-0.285,0.916-0.043c0.265,0.241,0.284,0.651,0.043,0.917			c-1.143,1.257-2.23,2.771-3,4.176v0.002l-0.08,0.147c-2.344,4.278-3.221,9.21-2.514,14.017c1.346-1.262,2.786-2.15,4.187-3.013			c2.455-1.513,4.774-2.943,6.372-6.257c0.155-0.323,0.543-0.458,0.866-0.303c0.323,0.156,0.458,0.543,0.303,0.866			c-1.763,3.656-4.354,5.253-6.86,6.798c-1.641,1.012-3.338,2.058-4.804,3.698L18.692,67.576z"></path>
                    <lineargradient id="SVGID_14_4_" gradientUnits="userSpaceOnUse" x1="26.8636" y1="-0.0376" x2="26.8636" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_14_4_)" d="M25.739,53.453c-0.11,0-0.222-0.028-0.324-0.087c-0.31-0.179-0.417-0.576-0.238-0.886l2.248-3.895			c0.179-0.31,0.576-0.417,0.886-0.238c0.31,0.179,0.417,0.576,0.238,0.886l-2.248,3.895C26.182,53.337,25.963,53.453,25.739,53.453z			"></path>
                    <lineargradient id="SVGID_15_4_" gradientUnits="userSpaceOnUse" x1="13.6523" y1="-0.0376" x2="13.6523" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_15_4_)" d="M5.222,54.692l0.408-1.226c1.771-5.313,5.382-9.841,10.17-12.753			c1.591-0.963,3.281-1.738,5.025-2.305c0.34-0.111,0.707,0.076,0.818,0.416c0.111,0.341-0.075,0.707-0.416,0.818			c-1.649,0.536-3.248,1.27-4.753,2.181c-4.168,2.535-7.394,6.368-9.185,10.883c1.798-0.42,3.491-0.469,5.138-0.517			c2.885-0.084,5.609-0.163,8.641-2.231c0.296-0.202,0.7-0.125,0.902,0.17c0.202,0.296,0.126,0.7-0.17,0.902			c-3.346,2.283-6.391,2.371-9.335,2.457c-1.93,0.056-3.925,0.114-6.015,0.802L5.222,54.692z"></path>
                    <lineargradient id="SVGID_16_4_" gradientUnits="userSpaceOnUse" x1="20.6426" y1="-0.0376" x2="20.6426" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_16_4_)" d="M18.712,46.072c-0.224,0-0.442-0.116-0.563-0.325c-0.179-0.31-0.073-0.707,0.238-0.886l3.863-2.23			c0.311-0.179,0.707-0.073,0.886,0.238c0.179,0.31,0.073,0.707-0.238,0.886l-3.863,2.23C18.933,46.045,18.822,46.072,18.712,46.072z			"></path>
                    <lineargradient id="SVGID_17_4_" gradientUnits="userSpaceOnUse" x1="11.1232" y1="-0.0376" x2="11.1232" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_17_4_)" d="M15.094,41.959c-3.427,0-5.857-1.31-8.216-2.58c-1.704-0.918-3.466-1.867-5.614-2.315L0,36.801			l0.966-0.857c4.188-3.716,9.579-5.833,15.18-5.961c1.875-0.042,3.756,0.138,5.589,0.535c0.35,0.076,0.573,0.421,0.497,0.772			c-0.076,0.35-0.422,0.573-0.771,0.497c-1.734-0.376-3.511-0.546-5.285-0.506c-4.878,0.111-9.587,1.819-13.394,4.834			c1.764,0.534,3.258,1.339,4.712,2.122c2.549,1.373,4.958,2.669,8.593,2.385c0.357-0.028,0.67,0.239,0.697,0.596			c0.028,0.357-0.239,0.67-0.596,0.697C15.812,41.945,15.448,41.959,15.094,41.959z"></path>
                    <lineargradient id="SVGID_18_4_" gradientUnits="userSpaceOnUse" x1="18.5331" y1="-0.0376" x2="18.5331" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_18_4_)" d="M20.752,36.166h-4.437c-0.358,0-0.649-0.291-0.649-0.649s0.29-0.649,0.649-0.649h4.437			c0.358,0,0.649,0.291,0.649,0.649S21.11,36.166,20.752,36.166z"></path>
                    <lineargradient id="SVGID_19_4_" gradientUnits="userSpaceOnUse" x1="13.2856" y1="-0.0376" x2="13.2856" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_19_4_)" d="M16.161,31.282c-0.109,0-0.218-0.027-0.316-0.083c-3.628-1.763-5.22-4.344-6.76-6.84			c-1.013-1.641-2.06-3.339-3.702-4.804l-0.964-0.86l1.266-0.259c5.486-1.123,11.215-0.262,16.128,2.427			c0.314,0.172,0.43,0.566,0.258,0.881c-0.172,0.314-0.566,0.43-0.881,0.258c-4.279-2.342-9.212-3.217-14.017-2.51			c1.263,1.346,2.151,2.786,3.016,4.187c1.513,2.453,2.943,4.77,6.253,6.369l0.093,0.045l0.074,0.071			c0.259,0.248,0.269,0.66,0.021,0.919C16.503,31.215,16.332,31.282,16.161,31.282z"></path>
                    <lineargradient id="SVGID_20_4_" gradientUnits="userSpaceOnUse" x1="23.7312" y1="-0.0376" x2="23.7312" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_20_4_)" d="M25.955,25.251c-0.156,0-0.312-0.056-0.437-0.169c-1.3-1.183-2.714-2.191-4.324-3.08			c-0.314-0.173-0.427-0.568-0.254-0.882c0.174-0.313,0.568-0.427,0.882-0.254c1.7,0.939,3.194,2.004,4.57,3.256			c0.265,0.241,0.284,0.652,0.043,0.917C26.307,25.18,26.131,25.251,25.955,25.251z"></path>
                    <lineargradient id="SVGID_21_4_" gradientUnits="userSpaceOnUse" x1="21.1413" y1="-0.0376" x2="21.1413" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_21_4_)" d="M23.089,28.64c-0.11,0-0.222-0.028-0.324-0.087l-3.896-2.25c-0.31-0.179-0.417-0.576-0.237-0.886			c0.179-0.31,0.576-0.417,0.886-0.238l3.896,2.25c0.31,0.179,0.417,0.576,0.237,0.886C23.531,28.523,23.313,28.64,23.089,28.64z"></path>
                    <lineargradient id="SVGID_22_4_" gradientUnits="userSpaceOnUse" x1="25.468" y1="-0.0376" x2="25.468" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_22_4_)" d="M21.503,22.081c-0.208,0-0.412-0.1-0.538-0.285c-2.283-3.369-2.369-6.403-2.453-9.338			c-0.055-1.924-0.112-3.914-0.801-6.007l-0.404-1.227l1.226,0.409c7.139,2.38,12.771,8.073,15.067,15.23			c0.109,0.341-0.078,0.706-0.42,0.816c-0.341,0.11-0.706-0.078-0.816-0.42C30.32,14.89,25.483,9.748,19.293,7.29			c0.421,1.798,0.469,3.487,0.516,5.13c0.082,2.876,0.16,5.592,2.23,8.648c0.201,0.297,0.124,0.7-0.173,0.901			C21.755,22.045,21.628,22.081,21.503,22.081z"></path>
                    <lineargradient id="SVGID_23_4_" gradientUnits="userSpaceOnUse" x1="27.694" y1="-0.0376" x2="27.694" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_23_4_)" d="M28.814,23.237c-0.224,0-0.442-0.116-0.562-0.325l-2.238-3.875			c-0.179-0.31-0.073-0.707,0.237-0.886c0.311-0.179,0.707-0.073,0.886,0.237l2.238,3.875c0.179,0.31,0.073,0.707-0.237,0.886			C29.035,23.209,28.924,23.237,28.814,23.237z"></path>
                    <lineargradient id="SVGID_24_4_" gradientUnits="userSpaceOnUse" x1="36.0276" y1="-0.0376" x2="36.0276" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_24_4_)" d="M40.848,22.247c-0.046,0-0.092-0.005-0.138-0.015c-0.35-0.076-0.572-0.422-0.496-0.772			c0.376-1.728,0.55-3.553,0.504-5.276l-0.001-0.021l0.001-0.021c0.003-0.072,0.191-7.011-4.833-13.361			c-0.533,1.753-1.341,3.258-2.126,4.722c-1.385,2.582-2.693,5.02-2.381,8.58c0.031,0.357-0.233,0.672-0.59,0.703			c-0.354,0.031-0.672-0.233-0.703-0.59c-0.346-3.945,1.116-6.671,2.53-9.306c0.923-1.721,1.877-3.5,2.32-5.626L35.199,0l0.857,0.966			c6.101,6.877,5.977,14.635,5.959,15.203c0.047,1.82-0.138,3.744-0.534,5.566C41.415,22.04,41.147,22.247,40.848,22.247z"></path>
                    <lineargradient id="SVGID_25_4_" gradientUnits="userSpaceOnUse" x1="36.4821" y1="-0.0376" x2="36.4821" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_25_4_)" d="M36.482,21.442c-0.358,0-0.649-0.291-0.649-0.649v-4.478c0-0.358,0.29-0.649,0.649-0.649			c0.358,0,0.649,0.291,0.649,0.649v4.478C37.131,21.152,36.84,21.442,36.482,21.442z"></path>
                    <lineargradient id="SVGID_26_4_" gradientUnits="userSpaceOnUse" x1="35.9645" y1="-0.0376" x2="35.9645" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_26_4_)" d="M35.97,51.839c-4.555,0-8.876-1.957-11.857-5.369c-0.821-0.928-1.531-1.926-2.106-2.962			c-1.374-2.472-2.032-5.246-1.903-8.022c0.244-5.592,3.462-10.753,8.397-13.467c2.279-1.253,4.75-1.889,7.345-1.889			c1.321,0,2.665,0.168,3.996,0.5c0.404,0.1,0.813,0.218,1.213,0.353c1.144,0.382,2.253,0.906,3.297,1.556			c0.951,0.589,1.846,1.286,2.658,2.071c0.308,0.297,0.603,0.607,0.876,0.919c0.807,0.914,1.508,1.921,2.08,2.989			c1.312,2.439,1.958,5.201,1.868,7.986c-0.087,2.788-0.908,5.502-2.375,7.849C46.551,49.04,41.508,51.839,35.97,51.839z			M35.845,21.428c-2.373,0-4.634,0.582-6.72,1.728c-4.472,2.46-7.504,7.323-7.726,12.389c-0.118,2.537,0.484,5.072,1.741,7.333			c0.53,0.955,1.185,1.875,1.946,2.735c2.737,3.133,6.702,4.928,10.882,4.928c5.086,0,9.717-2.57,12.387-6.875			c1.346-2.154,2.099-4.645,2.179-7.204c0.082-2.558-0.511-5.093-1.715-7.331c-0.525-0.98-1.169-1.904-1.912-2.746			c-0.251-0.287-0.52-0.569-0.802-0.842c-0.746-0.721-1.567-1.361-2.441-1.902c-0.959-0.598-1.976-1.078-3.024-1.428			c-0.367-0.123-0.742-0.232-1.114-0.324C38.298,21.583,37.06,21.428,35.845,21.428z"></path>
                    <lineargradient id="SVGID_27_4_" gradientUnits="userSpaceOnUse" x1="30.0561" y1="-0.0376" x2="30.0561" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_27_4_)" d="M30.058,35.064c-1.669,0-3.359-1.145-3.359-3.335c0-1.851,1.506-3.357,3.357-3.357			c1.851,0,3.357,1.506,3.357,3.357C33.413,33.918,31.726,35.064,30.058,35.064z M30.056,29.67c-1.136,0-2.06,0.924-2.06,2.059			c0,1.407,1.036,2.037,2.062,2.037c1.024,0,2.058-0.63,2.058-2.037C32.116,30.594,31.192,29.67,30.056,29.67z"></path>
                    <lineargradient id="SVGID_28_4_" gradientUnits="userSpaceOnUse" x1="40.6649" y1="-0.0376" x2="40.6649" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_28_4_)" d="M40.665,33.653c-1.851,0-3.357-1.506-3.357-3.357c0-2.189,1.689-3.334,3.358-3.334			c1.668,0,3.356,1.145,3.356,3.334C44.022,32.147,42.516,33.653,40.665,33.653z M40.666,28.259c-1.026,0-2.061,0.63-2.061,2.037			c0,1.136,0.924,2.06,2.06,2.06c1.136,0,2.06-0.924,2.06-2.06C42.725,28.889,41.691,28.259,40.666,28.259z"></path>
                    <lineargradient id="SVGID_29_4_" gradientUnits="userSpaceOnUse" x1="35.4731" y1="-0.0376" x2="35.4731" y2="72.004">
                      <stop offset="0" stop-color="#E9DA5B"></stop>
                      <stop offset="1" stop-color="#76A86F"></stop>
                    </lineargradient>
                    <path fill="url(#SVGID_29_4_)" d="M35.473,43.973c-1.851,0-3.357-1.506-3.357-3.357c0-1.851,1.506-3.357,3.357-3.357			c1.851,0,3.357,1.506,3.357,3.357C38.83,42.467,37.324,43.973,35.473,43.973z M35.473,38.556c-1.136,0-2.06,0.924-2.06,2.059			c0,1.136,0.924,2.06,2.06,2.06c1.136,0,2.06-0.924,2.06-2.06C37.533,39.48,36.609,38.556,35.473,38.556z"></path>
                  </g>
                </svg>
              </div>
            </div>
            <h5 class="box-icon-modern-title"><a href="custeiopecuario.php">Custeio Pecuário</a></h5>
            <p class="box-icon-modern-text"> </p>
          </article>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-md section-first bg-default text-md-left">
    <div class="container">
      <div class="row row-40 row-md-60 flex-lg-row-reverse justify-content-center align-items-xl-center">
        <div class="col-md-11 col-lg-5">
          <h5 class="text-primary wow fadeInRight">Desde de 1987</h5>
          <!-- <h2 class="wow fadeInRight" data-wow-delay=".1s">Our farm</h2>
          <h3 class="wow fadeInRight" data-wow-delay=".2s">Who we are</h3> -->
          <!-- Bootstrap tabs-->
          <div class="tabs-custom tabs-horizontal tabs-line tabs-line-2" id="tabs-1">
            <!-- Nav tabs-->
            <div class="nav-tabs-wrap">
              <ul class="nav nav-tabs">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-bs-toggle="tab">Nossa Meta</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-bs-toggle="tab">Perfil</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-3" data-bs-toggle="tab">O que fazemos</a></li>
              </ul>
            </div>
            <!-- Tab panes-->
            <div class="tab-content">
              <div class="tab-pane fade show active" id="tabs-1-1">
                <p><?php
                  foreach($meta as $row)
                  { echo $row['texto']; }
                ?>

                </p>
              </div>
              <div class="tab-pane fade" id="tabs-1-2">
                <p><?php 
                  foreach($exibe_perfil as $row)
                  {
                    echo  $row['texto'];
                  }
                ?>

                </p>
              </div>
              <div class="tab-pane fade" id="tabs-1-3">
                <!-- <p>Os serviços prestados pela Sulplan são feitos por uma equipe motivada, competente, profissional e eficiente.</p>
                <p>No crédito rural:Projetos para obtenção de crédito, cadastro para limites, avaliações e dimensionamentos.</p>
                <p>Na Topografia: Serviços topográficos para fins diversos, levantamentos georeferenciados e cadastro georeferenciado, planialtimetria e drenagem.</p>
                <p>Nos Projetos Ambientais:
                  Projetos para homologação de reserva legal, adequação às exigências do código florestal, órgãos de controle e fiscalização do meio ambiente e orientação técnica de sustentabilidade ambiental.
                </p> -->
                <?php 
                  
                  foreach($oque_fazemos as $row)
                  {
                    echo $row['texto'];
                  }
                ?>
              
              </div>
            </div>
          </div> <!--<a class="btn btn-primary wow fadeInUp" href="about.html">Read more</a> -->
        </div>
        <div class="col-md-11 col-lg-7">
          <div class="slick-slider-1 inset-xl-right-35">
            <!-- Slick Carousel-->
            <?php 
                $query = "SELECT * FROM banersecundarios";
                $result = $mysqli->query($query);
                
                while($row = $result->fetch_array())
                {
                $secundario[] = $row;
                }
            ?>
           
            <div class="slick-slider carousel-parent slick-nav-1 slick-nav-2" id="carousel-parent" data-items="1" data-autoplay="true" data-slide-effect="true" data-child="#child-carousel" data-for="#child-carousel" data-arrows="true">
           <?php 
            foreach ($secundario as $value) { ?>
            <div class="item"><img src="./banners/<?=$value['imagem'] ?>" alt="" width="634" height="373"/>
              </div>
              <?php } ?>
            </div>
            
            <div class="slick-slider child-carousel" id="child-carousel" data-items="3" data-sm-items="4" data-md-items="4" data-lg-items="4" data-xl-items="4" data-xxl-items="4" data-for="#carousel-parent">
            <?php foreach ($secundario as $img) { ?>
              <div class="item"><img src="./banners/<?=$img['imagem'] ?>" alt="" width="143" height="114"/>
              </div>
             <?php } ?>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

     

  <?php  include_once('./footer.php');?>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
