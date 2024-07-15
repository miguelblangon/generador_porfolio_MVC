<!DOCTYPE html>
<html lang="en">

@include('plantilla.plantillas_aplicacion.iPortfolio.includes.head',['title'=>'iPortfolio - detaill'])

<body>

@include('plantilla.plantillas_aplicacion.iPortfolio.includes.menu')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Detalles del curso</h2>
          <ol>
            <li><a href="{{ route('porfolio.show',['porfolio'=>$curso->plantilla_usuario_id]) }}">Profolio</a></li>
            <li>{{ Str::limit($curso->nombre, 30, '...')}} </li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            @include('componentes.card',[ 'ancho'=>'80%','titulo'=>$curso->nombre,'descripcion'=>$curso->descripcion ,'mostrar'=>true, 'tit_limi'=>2000 ])
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Información del curso</h3>
              <ul>
                <li><strong>Categoría</strong>: {{ $curso->categoria }}</li>
                <li><strong>Tutor</strong>: {{ $curso->tutor }}</li>
                <li><strong>Fecha de finalización</strong>: {{ $curso->year_fin }}</li>
                <li><strong>Url del curso</strong>: <a href="{{ $curso->url  }}" target="_blank" rel="noopener noreferrer">Enlace</a></li>
              </ul>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>iPortfolio</span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('plantilla.plantillas_aplicacion.iPortfolio.includes.js')

</body>

</html>
