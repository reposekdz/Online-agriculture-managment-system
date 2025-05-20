<?php
include("header.php");
?>

  <!-- ======= Hero Section ======= -->
   <style>
    .hh1 {
            font-size: 3.5rem;
            background: linear-gradient(90deg, #ff8a00, #e52e71);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-align: center;
            padding: 20px;
            cursor: pointer;
            position: relative;
            text-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            
            /* Animation */
            animation: bounce 2s infinite alternate;
        }
        
        h1:hover {
            animation: bigBounce 0.8s ease;
            transform: scale(1.05);
        }
        
        @keyframes bounce {
            0% {
                transform: translateY(0) scale(1);
            }
            100% {
                transform: translateY(-20px) scale(1.02);
            }
        }
        
        @keyframes bigBounce {
            0%, 100% {
                transform: translateY(0) scale(1.05);
            }
            50% {
                transform: translateY(-30px) scale(1.1);
            }
        }
        
        /* Modern decorative elements */
        h1::before, h1::after {
            content: "";
            position: absolute;
            width: 50px;
            height: 50px;
            background: rgba(229, 46, 113, 0.2);
            border-radius: 50%;
            z-index: -1;
            filter: blur(20px);
        }
        
        h1::before {
            top: -10px;
            left: -10px;
        }
        
        h1::after {
            bottom: -10px;
            right: -10px;
            background: rgba(255, 138, 0, 0.2);
        }
   </style>
  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <h1 class="hh1">Terimbere Muhinzi-mworozi, Nawe mucuruzi</h1>
      <h2>Gahunda yo gucunga ubuhinzi igamije gufasha abahinzi, batanga amakuru yose ajyanye n'ubuhinzi,kugurisha imyakayabo n'ibindi ku rubuga...</h2>
      <a href="customerreglogin.php" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->
  <section id="counts" class="counts">
    <div class="container"></div></section>

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container">

        <div class="row">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="100">
            <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="200">
            <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="300">
            <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="400">
            <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="500">
            <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="600">
            <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
<img src="images/pja1.jpg" style="width: 100%;">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
            <p class="font-italic"><b>Inshingano:</b>Gutanga ikoranabuhanga na serivisi ku bahinzi, abacuruzi n'abakozi bo mu mirima kugira ngo bibafashe kwagura ubucuruzi bwabo no kubaka isoko ryagutse. Kandi kugira ngo habeho kunoza imikorere y'ubuhinzi bw'ubuhinzi no gutanga ubumenyi ku bibazo by'ubuhinzi biherutse kuba.
            </p>
            <p class="font-italic"><b>Icyerekezo:</b> Gufasha abahinzi n'abakozi bo mu mirima mu kuzamura imibereho yabo hifashishijwe ikoranabuhanga, bityo, bigateza imbere urwego rw'ubuhinzi mu bukungu bw'igihugu cyu Rwanda.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i>"TMMZ" ni icyitegererezo cy'urubuga rw'ubuhinzi / imicungire y'ubuhinzi..</li>
              <li><i class="ri-check-double-line"></i> "TMMZ" itanga igishushanyo mbonera cy'ubucuruzi bw'ubuhinzi ku bayikoresha.</li>
              <li><i class="ri-check-double-line"></i>"TMMZ" ifasha abacuruzi bacuruza n'abagurisha ku giti cyabo kugura ibikomoka ku bahinzi benshi.</li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
    <section id="counts" class="counts">
    <div class="container"></div></section>
    
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">

          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon-box mt-4 mt-xl-0">
                    <h4>Customer</h4>
                    <i class="bx bx-group"></i>
                    <p>Are you willing to purchase products from Farmer's?<br> <b>Login / Register as Customer</b></p>
					<div class="text-center"><button type="button" class="btn btn-info" onclick="window.location='customerreglogin.php'">Click Here</button></div>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                  <div class="icon-box mt-4 mt-xl-0">
                    <h4>Farmer/Seller</h4>
                    <i class="bx bx-donate-heart"></i>
                    <p>Online Market where you can Sell fruits & vegetables, agri products, etc...<br>
					<b>Login / Register as Farmer or Seller</b></p>
					<div class="text-center"><button type="button" class="btn btn-info" onclick="window.location='farmerreglogin.php'">Click Here</button></div>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                  <div class="icon-box mt-4 mt-xl-0">
                    <h4>Worker</h4>
                    <i class="bx bx-walk"></i>
                    <p>Find Agriculture Jobs and opportunities.. Farm Worker jobs available here...<br> <b>Login / Register as Worker</b></p>
					<div class="text-center"><button type="button" class="btn btn-info" onclick="window.location='workerreglogin.php'">Click Here</button></div>
                  </div></div></div></div><!-- End .content-->
          </div></div></div>
    </section><!-- End Why Us Section -->
 </main><!-- End #main -->
  
<?php
include("footer.php");
?>