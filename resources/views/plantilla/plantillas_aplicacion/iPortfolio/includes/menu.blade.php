 <!-- ======= Mobile nav toggle button ======= -->
 <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
 <!-- ======= Header ======= -->
 <header id="header">
   <div class="d-flex flex-column">
     <div class="profile">
       <img src="{{ isset($about)? asset($about->ver_imagen)  :asset('storage/iPortfolio/assets/img/profile-img.jpg') }}" alt="" class="img-fluid rounded-circle">
       <h1 class="text-light"><a href="index.html">{{ isset($about)?$about->nombre_completo: 'Alex Smith' }}</a></h1>
       {{-- <div class="social-links mt-3 text-center">
         <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
         <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
         <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
         <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
         <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
       </div> --}}
     </div>

     <nav id="navbar" class="nav-menu navbar">
       <ul>
         <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>{{ __('Home') }}</span></a></li>
         <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span> {{ __('Información Personal') }}</span></a></li>
         <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>{{ __('Resumen') }}</span></a></li>
         <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>{{ __('Crusos') }}</span></a></li>
         <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>{{ __('Servicios') }}</span></a></li>
         <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>{{ __('Contacto') }} </span></a></li>
       </ul>
     </nav><!-- .nav-menu -->
   </div>
 </header><!-- End Header -->
