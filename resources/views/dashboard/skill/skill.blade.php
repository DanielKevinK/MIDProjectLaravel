@extends('dashboard.dash')

@section('content')
    <form action="{{route('skill.update')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">Programming Language & Tools</label>
          <input type="text" 
            class="form-control form-control-sm skill" name="language" id="judul" aria-describedby="helpId" placeholder=
            "Programming Language & Tools" value="{{get_meta_value('language')}}">
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Workflow</label>
            <textarea class="form-control summernote" rows="5" name="workflow">{{get_meta_value('workflow')}}</textarea>
        </div>
        <button class="btn btn-primary" name="save" type="submit">Save</button>
    </form>
@endsection

@push('skill-script')
<script>
    $(document).ready(function() {
        $('.skill').tokenfield({
            autocomplete: {
                source: [{!! $skill !!}],
                delay: 100
            },
            showAutocompleteOnFocus: true
        });
    });
  </script>
@endpush