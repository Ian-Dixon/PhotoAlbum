@extends ('layouts/master')

@section ('styles')
  <link rel="stylesheet" href="{{ url('css/carousel.css') }}" />
@endsection

@section ('content')
  <div class="content">
    <div class="album">
      <div class="carousel" id="downtown"></div>
    </div>

    <div class="album">
      <div class="carousel" id="dorm"></div>
    </div>

    <div class="album">
      <div class="carousel" id="sognsvann"></div>
    </div>
  </div>
@endsection

@section ('scripts')
  <script src="{{ url('js/carousel.js') }}" type="text/javascript"></script>
  <script>
    var downtownImg = [{
      img: "{{ url('images/albums/downtown/oslofjordSunset.jpg') }}",
      caption: "&nbsp;" //"Oslofjord"
    }, {
      img: "{{ url('images/albums/downtown/oslofjord.jpg') }}",
      caption: "&nbsp;" //"Oslofjord"
    }];

    var dormImg = [{
      img: "{{ url('images/albums/dorm/building.jpg') }}",
      caption: "My Building"
    }, {
      img: "{{ url('images/albums/dorm/room.jpg') }}",
      caption: "My Room"
    }, {
      img: "{{ url('images/albums/dorm/bathroom.jpg') }}",
      caption: "The bathroom floor is heated, and I even almost fit in the shower."
    }, {
      img: "{{ url('images/albums/dorm/toeCrusher.jpg') }}",
      caption: "The only thing I really don't like about my room: the toe crusher."
    }];

    var sognsvannImg = [{
      img: "{{ url('images/albums/sognsvann/1.jpg') }}",
      caption: "10 minute walk from Kringsjå"
    }, {
      img: "{{ url('images/albums/sognsvann/2.jpg') }}"
    }, {
      img: "{{ url('images/albums/sognsvann/3.jpg') }}",
      caption: "Yep. I went outside."
    }, {
      img: "{{ url('images/albums/sognsvann/4.jpg') }}"
    }];

    var downtownCarousel = new Carousel('downtownCarousel', 'downtown', downtownImg, {
      title: "Oslofjord" //"Downtown Oslo"
    });

    var dormCarousel = new Carousel('dormCarousel', 'dorm', dormImg, {
      title: "My Dorm"
    });

    var sognsvannCarousel = new Carousel('sognsvannCarousel', 'sognsvann', sognsvannImg, {
      title: "Sognsvann"
    });
  </script>
@endsection
