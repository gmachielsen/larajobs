<!DOCTYPE html>
<html lang="en">
  <head>
    <title>IT zoeker &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('partials.head')

    
  </head>
  <body>
  
  @include('partials.nav')
  
  @include('partials.hero')
    

  @include('partials.category')



    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
            <h2 class="mb-5 h3">Recente vacatures</h2>
            <div class="rounded border jobs-wrap">
                  @foreach($jobs as $job)
              <a href="{{route('jobs.show', [$job->id, $job->slug])}}" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                <div class="company-logo blank-logo text-center text-md-left pl-3">
                    @if(!empty($job->company->logo))
                      <img src="{{asset('avatar/man.jpg')}}" alt="Image" class="img-fluid mx-auto">
                    @else
                    <img src="{{asset('uploads/logo')}}/{{$job->company->logo}}" alt="Image" class="img-fluid mx-auto">
                    @endif                </div>
                <div class="job-details h-100">
                  <div class="p-3 align-self-center">
                    <h3>{{ $job->position }}</h3>
                    <div class="d-block d-lg-flex">
                      <div class="mr-3"><span class="icon-suitcase mr-1"></span>{{ $job->company->cname }}</div>
                      <div class="mr-3"><span class="icon-room mr-1"></span> {{ str_limit($job->address, 20) }}</div>
                      <div><span class="icon-money mr-1"></span>{{ $job->salary }}</div>
                    </div>
                  </div>
                </div>
                <div class="job-category align-self-center">
                  @if($job->type=='fulltime')
                  <div class="p-3">
                    <span class="text-info p-2 rounded border border-info">{{ $job->type }}</span>
                  </div>
                  @elseif($job->type=='partime')
                  <div class="p-3">
                    <span class="text-danger p-2 rounded border border-danger">{{ $job->type }}</span>
                  </div>
                  @else 
                  <div class="p-3">
                    <span class="text-warning p-2 rounded border border-warning">{{ $job->type }}</span>
                  </div>
                  @endif
                </div>  
              </a>
              @endforeach
             


            </div>

            <div class="col-md-12 text-center mt-5">
              <a href="{{ route('alljobs')}}" class="btn btn-primary rounded py-3 px-5"><span class="icon-plus-circle"></span> Zoek op nog meer vacatures</a>
            </div>
          </div>

        </div>
      </div>
    </div>

  @include('partials.testimonial')


    <div class="site-blocks-cover overlay inner-page" style="background-image: url('images/hero_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 text-center" data-aos="fade">
            <h1 class="h3 mb-0">IT-droombaan?</h1>
            <p class="h3 text-white mb-5">Deze wacht op jou!</p>
            <p><a href="/register" class="btn btn-outline-success py-3 px-4">Vind jouw baan</a> <a href="{{ route('employer.register')}}" class="btn btn-outline-warning py-3 px-4">Wergever</a></p>
            
          </div>
        </div>
      </div>
    </div>

    

    <div class="site-section site-block-feature bg-light">
      <div class="container">
        
        <div class="text-center mb-5 section-heading">
          <h2>Waarom voor ons kiezen?</h2>
        </div>

        <div class="d-block d-md-flex border-bottom">
          <div class="text-center p-4 item border-right" data-aos="fade">
            <span class="flaticon-calculator display-3 mb-3 d-block text-primary"></span>

            <h2 class="h4">Gratis voor werkgevers en werknemers</h2>
            <p>Ben jij als werkgever die dure recruitmentbureaus ook zat? Wij gaan voor het belang van de werkgever en de werknemer! </p>
            <!-- <p><a href="#"> <span class="icon-arrow-right small"></span></a></p> -->
          </div>
          <div class="text-center p-4 item" data-aos="fade">
            <span class="flaticon-worker display-3 mb-3 d-block text-primary"></span>

            <h2 class="h4">Geen website voor recruitmentbureaus, maar enkel voor werkgevers en werkzoekenden.</h2>
            <p>Wij geloven dat het juist de bedrijven de expertise hebben om de geschikte mensen aan te nemen</p>
            <!-- <p><a href="#"> <span class="icon-arrow-right small"></span></a></p> -->
          </div>
        </div>
        <div class="d-block d-md-flex">
          <div class="text-center p-4 item border-right" data-aos="fade">
          <span class="flaticon-wrench display-3 mb-3 d-block text-primary"></span>
            <h2 class="h4">Scheppen van ruime keuze</h2>
            <p>Wij willen het platform zijn waar IT'ers een baan kunnen vinden. Dat houdt in dat wij vacatures willen aanbieden van front end tot en met de backend en de cybersecurity</p>
            <!-- <p><a href="#"> <span class="icon-arrow-right small"></span></a></p> -->
          </div>
          <div class="text-center p-4 item" data-aos="fade">
            <span class="flaticon-stethoscope display-3 mb-3 d-block text-primary"></span>
            <h2 class="h4">Wij blijven ontwikkelen</h2>
            <p>Wij zijn een website gerund voor en door programmeurs! Omdat wij plezier hebben om met deze website een bijdrage te kunnen leveren aan de maatschappij.</p>
            <!-- <p><a href="#"> <span class="icon-arrow-right small"></span></a></p> -->
          </div>
        </div>
      </div>
    </div>

    


@include('partials.blog')

    
@include('partials.footer')
  </body>
</html>