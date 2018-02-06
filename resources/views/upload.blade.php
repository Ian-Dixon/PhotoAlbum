@extends ('layouts/master')

@section ('content')
  <br />

  <div class="row text-center">
    <div class="col-xs-12 col-md-8 offset-md-2">
      <form action="{{ url('/upload') }}" method="post">
        {{ csrf_field() }}
        <label>Album Title</label>
        <input type="text" name="albumTitle" />
        <br />
        <label>Batch</label>
        <input type="text" name="batch" value="{{ $batch }}" />
        <hr />

        <div id="photos">
          <div class="photoItem">
            <label>Photo URL</label>
            <input type="text" name="photos[0][url]" />
            <br />
            <label>Photo Caption</label>
            <input type="text" name="photos[0][caption]" />
            <hr />
          </div>
        </div>

        <button type="button" class="btn btn-success" onclick="addPhoto()">+</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
@endsection

@section ('scripts')
  <script>
    var photoCount = 1;

    var addPhoto = function() {
      var node = document.createElement("DIV");
      node.innerHTML = '<label>Photo URL</label> ' +
                       '<input type="text" name="photos[' + photoCount + '][url]" />' +
                       '<br />' +
                       '<label>Photo Caption</label> ' +
                       '<input type="text" name="photos[' + photoCount + '][caption]" />' +
                       '<hr />'
      node.setAttribute('class', 'photoItem');
      document.getElementById('photos').appendChild(node);
      ++photoCount;
    };
  </script>
@endsection
