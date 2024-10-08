<!DOCTYPE html>
<html lang="en">

@include('plantilla.plantillas_aplicacion.iPortfolio.includes.head',['title'=>'iPortfolio - Index'])
<body>
@include('plantilla.plantillas_aplicacion.iPortfolio.includes.menu')


  <!-- ======= Hero Section ======= -->
  <section id="hero" style="background-image: url('{{ isset($introduccion)? asset($introduccion->ver_imagen):asset('storage/iPortfolio/assets/img/hero-bg.jpg') }}'); background-attachment: fixed; background-size: cover;"  class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1> {{ $introduccion->nombre??'Alex Smith'  }} </h1>
      <p><span class="typed" data-typed-items=" {{ $introduccion->frase_introductoria??'Designer, Developer, Freelancer, Photographer' }}"></span></p>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>{{ __('Información Personal') }}</h2>
            @if (isset($secciones))
                @foreach ($secciones as $item)
                    @if ($item->seccion =='about')
                        <p> {!! $item->texto !!}</p>
                    @endif
                @endforeach
            @else
             <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            @endif
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="{{  isset($about)? asset($about->ver_imagen) :asset('storage/iPortfolio/assets/img/profile-img.jpg') }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>  {{ $introduccion->nombre?? 'UI/UX Designer &amp; Web Developer'}}.  </h3>

            <div class="row mt-4">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>{{ __('Nombre') }}:</strong> <span>{{  $about->nombre_completo??'Alex Smith' }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>{{ __('Cumpleaños') }}:</strong> <span>{{  $about->nacimiento??'1 May 1995' }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>{{ __('Provincia') }}:</strong> <span> {{ isset($about)?  provincia($about->provincial):'Honululu'  }} </span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>{{ __('Contacto') }}:</strong> <span>{{ $about->num_contacto??'+123 456 7890'}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>{{ __('Movilidad Geografica') }}:</strong> <span>{{ $about->disponibilidad??'NO lo se'}}</span></li>
                </ul>
            </div>
            <div class="col-lg-6 pt-5">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>{{ __('Edad') }}:</strong> <span>{{ $about->edad??'30'}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>{{ __('Ciudad') }}:</strong> <span>{{ isset($about)? municipio($about->poblacion):'No Disponible' }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>{{ __('Email') }}:</strong> <span>{{ $about->email??'asdasdasdd@asd.com'}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>{{ __('Incorporación') }}:</strong> <span>{{ $about->incorporacion??'Error 404' }}</span></li>
                </ul>
              </div>
            </div>
            <p>
              {{ $about->texto2??'Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
              Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque. Aliquid amet quidem ut quaerat cupiditate. Ab et eum qui repellendus omnis culpa magni laudantium dolores.'}}
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills section-bg">
      <div class="container">

        <div class="section-title">
          <h2>{{ __('Habilidades') }}</h2>
        @if (isset($secciones))
                @foreach ($secciones as $item)
                    @if ($item->seccion =='habilidad')
                        <p> {!! $item->texto !!}</p>
                    @endif
                @endforeach
            @else
             <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            @endif
        </div>

        <div class="row @isset($habilidades)  'g-2' @endisset skills-content">
        @if (isset($habilidades))
            @foreach ($habilidades as $item)
            <div class="col-lg-6">
                <div class="progress">
                  <span class="skill">{{ $item->nombre }} <i class="val">{{ $item->valor }}%</i></span>
                  <div class="progress-bar-wrap">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $item->valor }}" aria-valuemin="0" aria-valuemax="{{ $item->valor >100? $item->valor:'100' }}"></div>
                  </div>
                </div>
            </div>
            @endforeach
        @else
        <div class="col-lg-6" data-aos="fade-up">

          <div class="progress">
            <span class="skill">HTML <i class="val">100%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">CSS <i class="val">90%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">JavaScript <i class="val">75%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

        </div>
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

          <div class="progress">
            <span class="skill">PHP <i class="val">80%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">WordPress/CMS <i class="val">90%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">Photoshop <i class="val">55%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

        </div>

      </div>

        @endif

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container">

        <div class="section-title">
          <h2>Resumén</h2>
         @if (isset($secciones))
                @foreach ($secciones as $item)
                    @if ($item->seccion =='resumen')
                        <p> {!! $item->texto !!}</p>
                    @endif
                @endforeach
            @else
             <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            @endif
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-up">
            <h3 class="resume-title">Educación</h3>
            @if (isset($estudios))
                @foreach ($estudios as $item)
                <div class="resume-item">
                    <h4>{{ $item->nombre }}</h4>
                    <h5>{{ $item->year_inicio }} - {{ $item->year_fin }}</h5>
                    <p><em>{{ $item->centro }}</em></p>
                    <p>{!! $item->contenido !!}</p>
                </div>
                @endforeach
            @else
                <div class="resume-item">
                <h4>Master of Fine Arts &amp; Graphic Design</h4>
                <h5>2015 - 2016</h5>
                <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
                <p>Qui deserunt veniam. Et sed aliquam labore tempore sed quisquam iusto autem sit. Ea vero voluptatum qui ut dignissimos deleniti nerada porti sand markend</p>
                </div>
                <div class="resume-item">
                <h4>Bachelor of Fine Arts &amp; Graphic Design</h4>
                <h5>2010 - 2014</h5>
                <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
                <p>Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis et quis Eius vel ratione eius unde vitae rerum voluptates asperiores voluptatem Earum molestiae consequatur neque etlon sader mart dila</p>
                </div>

            @endif
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3 class="resume-title">Experiencia Profesional</h3>

            @if (isset($experiencias))
                @foreach ($experiencias as $item)
                <div class="resume-item">
                    <h4>{{ $item->nombre }}</h4>
                    <h5>{{ $item->year_inicio }} - {{ $item->year_fin }}</h5>
                    <p><em>{{ $item->centro }}</em></p>
                    <p>{!! $item->contenido !!}</p>
                </div>
                @endforeach
            @else
            <div class="resume-item">
              <h4>Senior graphic design specialist</h4>
              <h5>2019 - Present</h5>
              <p><em>Experion, New York, NY </em></p>
              <ul>
                <li>Lead in the design, development, and implementation of the graphic, layout, and production communication materials</li>
                <li>Delegate tasks to the 7 members of the design team and provide counsel on all aspects of the project. </li>
                <li>Supervise the assessment of all graphic materials in order to ensure quality and accuracy of the design</li>
                <li>Oversee the efficient use of production project budgets ranging from $2,000 - $25,000</li>
              </ul>
            </div>
            <div class="resume-item">
              <h4>Graphic design specialist</h4>
              <h5>2017 - 2018</h5>
              <p><em>Stepping Stone Advertising, New York, NY</em></p>
              <ul>
                <li>Developed numerous marketing programs (logos, brochures,infographics, presentations, and advertisements).</li>
                <li>Managed up to 5 projects or tasks at a given time while under pressure</li>
                <li>Recommended and consulted with clients on the most appropriate graphic design</li>
                <li>Created 4+ design presentations and proposals a month for clients and account managers</li>
              </ul>
            </div>
            @endif
          </div>
        </div>

      </div>
    </section><!-- End Resume Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Cursos</h2>
         @if (isset($secciones))
                @foreach ($secciones as $item)
                    @if ($item->seccion =='curso')
                        <p> {!! $item->texto !!}</p>
                    @endif
                @endforeach
            @else
             <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            @endif
        </div>
        @isset($categorias)
            <div class="row" data-aos="fade-up">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
                @foreach ($categorias as $item)
                    <li data-filter=".filter-{{ $item['categoria'] }}">{{ $item['categoria'] }}</li>
                @endforeach
                </ul>
            </div>
            </div>
        @endisset

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
            @if (isset($cursos))
                @foreach ($cursos as $item)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $item->categoria }}">
                        @include('componentes.card',['titulo'=>$item->nombre,'descripcion'=>$item->descripcion,'enlace_nombre'=>'Enlace al curso',
                                                    'ruta'=>'plantillas.detalles','parametros'=>['plantilla'=>$item->plantillaUsuario->plantilla->id,'detalle'=>$item->id] ])
                    </div>
                @endforeach
            @else
                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-wrap">
                    <img src="{{ asset('storage/iPortfolio/assets/img/portfolio/portfolio-9.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-links">
                    <a href="{{ asset('storage/iPortfolio/assets/img/portfolio/portfolio-9.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                    <a href="{{ route('plantillas.detalles',['plantilla'=>13,'detalle'=>1 ]) }}" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>
                </div>
            @endif
        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Servicios</h2>
        @if (isset($secciones))
                @foreach ($secciones as $item)
                    @if ($item->seccion =='servicio')
                        <p> {!! $item->texto !!}</p>
                    @endif
                @endforeach
            @else
             <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            @endif
        </div>

        <div class="row">
            @if (isset($servicios))
                @foreach ($servicios as $item)
                    <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
                        <div class="icon"><i class="{{ $item->icono }}"></i></div>
                        <h4 class="title"><a href="">{{ $item->nombre }}</a></h4>
                        <p class="description">{!! $item->descripcion !!} </p>
                    </div>
                @endforeach


            @else
            <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
                <div class="icon"><i class="bi bi-briefcase"></i></div>
                <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              </div>
              <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                <div class="icon"><i class="bi bi-card-checklist"></i></div>
                <h4 class="title"><a href="">Dolor Sitema</a></h4>
                <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
              </div>
              <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                <div class="icon"><i class="bi bi-bar-chart"></i></div>
                <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
              </div>
              <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                <div class="icon"><i class="bi bi-binoculars"></i></div>
                <h4 class="title"><a href="">Magni Dolores</a></h4>
                <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
              </div>
              <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                <div class="icon"><i class="bi bi-brightness-high"></i></div>
                <h4 class="title"><a href="">Nemo Enim</a></h4>
                <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
              </div>
              <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                <div class="icon"><i class="bi bi-calendar4-week"></i></div>
                <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
                <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
              </div>
            @endif

        </div>

      </div>
    </section><!-- End Services Section -->

    {{-- <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="fade-up">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{ asset('storage/iPortfolio/assets/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="fade-up" data-aos-delay="100">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{ asset('storage/iPortfolio/assets/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="fade-up" data-aos-delay="200">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{ asset('storage/iPortfolio/assets/img/testimonials/testimonials-3.jpg') }}" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="fade-up" data-aos-delay="300">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{ asset('storage/iPortfolio/assets/img/testimonials/testimonials-4.jpg') }}" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="fade-up" data-aos-delay="400">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{ asset('storage/iPortfolio/assets/img/testimonials/testimonials-5.jpg') }}" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section --> --}}

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contacto</h2>
         @if (isset($secciones))
                @foreach ($secciones as $item)
                    @if ($item->seccion =='contacto')
                        <p> {!! $item->texto !!}</p>
                    @endif
                @endforeach
            @else
             <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            @endif
        </div>

        <div class="row" data-aos="fade-in">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
               {{-- @if () @else @endif --}}
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Localizacion:</h4>
                <p>   {{  isset($about)? municipio($about->poblacion).','.provincia($about->provincial):'A108 Adam Street, New York, NY 535022' }} </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>{{ $about->email??'asdasdasdd@asd.com'}}</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Contacto:</h4>
                <p>{{ $about->num_contacto??'+123 456 7890'}}</p>
              </div>

              {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe> --}}
            </div>

          </div>

          {{-- <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div> --}}

        </div>

      </div>
    </section><!-- End Contact Section -->

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
