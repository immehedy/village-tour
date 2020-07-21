@extends('layouts.master')

@section('content')

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('{{asset('/assets/img/about/cover.jpg')}}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>About Me</h1>
            <span class="subheading">Traveller, Blogger, Programmer</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>I will be adding more photos with the place i have already visited.
        Instead of writing about boring stuff, showing of the beatiful places are more convenient.</p>
        <a href="#">
          <img class="img-fluid" src="/assets/img/about/cycleSunset.jpg" alt="">
        </a>
        <span class="caption text-muted">Dholesshwari River, Rohitpur, Bangladesh</span>
        <p>We stopped at the bank of Dholesshwari River in Rohitpur, Keranigonj.
          The place is 20Km west after crossing the Buriganga River Bridge (1).</p>
          <a href="#">
            <img class="img-fluid" src="/assets/img/about/roadSide.jpg" alt="">
          </a>
          <span class="caption text-muted">Sunset while Passing through Keranigonj, Dhaka, Bangladesh</span>
          <p>You will get the chance to enjoy this scenery while going to the Dholesshwari River.</p>
          <a href="#">
            <img class="img-fluid" src="/assets/img/about/bikeSunset.jpg" alt="">
          </a>
          <span class="caption text-muted">Sunset in my village firm, Manikgonj, Bangladesh</span>
          <p>This is one of the most beatiful sunset i have ever witnessed. The photo was taken in the year 2018.</p>
          <a href="#">
            <img class="img-fluid" src="/assets/img/about/sajekFog.jpg" alt="">
          </a>
          <span class="caption text-muted">Foggy Morning, Sajek Valley, Bangladesh</span>
          <p>The Beautiful morning view from Sajek Valley. Sajek Valley is one of the most popular hill top in Bangladesh.
            I went there in 2017 and blessed to witness this. </p>
            <a href="#">
              <img class="img-fluid" src="/assets/img/about/KhoiyacharaFalls.jpg" alt="">
            </a>
            <span class="caption text-muted">Falls of Khoiyachara, Mirshorai, Chittagong, Bangladesh</span>
            <p>Khoiyachara has 13 different falls but you have to hill track to reach each falls.
            The higher you climb, the more interesting the falls become.</p>
      </div>
    </div>
  </div>

  <hr>

@endsection
