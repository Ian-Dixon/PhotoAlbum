@extends ('layouts/master')

@section ('styles')
  <link rel="stylesheet" href="{{ url('css/carousel.css') }}" />
@endsection

@section ('content')
  <?php $i = 0; ?>
  @foreach ($albums as $album)
  <div class="album">
    <div class="carousel" id="c_{{ $i++ }}"></div>
  </div>
  @endforeach
@endsection

@section ('scripts')
  <script src="{{ url('js/carousel.js') }}" type="text/javascript"></script>

  <script>
  <?php $i = 0; ?>
  @foreach ($albums as $album)

    var c_{{ $i }} = new Carousel("c_{{ $i }}", "c_{{ $i++ }}", [
    @foreach ($album->photos as $photo)
      {img: "{{ $photo->url }}", caption: "{!! $photo->caption !!}"},
    @endforeach
    ], {
      title: "{{ $album->title }}"
    });
  @endforeach
  </script>
@endsection
