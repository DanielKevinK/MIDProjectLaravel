@extends('dashboard.dash')

@section('content')
    <div class="pb-3"><a href="{{route('halaman.index')}}"  class="btn btn-secondary"> 
        << Back</a>
    </div>
    <form action="{{route('halaman.store')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">Title</label>
          <input type="text" 
            class="form-control form-control-sm" name="judul" id="judul" aria-describedby="helpId" placeholder="Judul" 
            value="{{Session::get('judul')}}">
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Content</label>
            <textarea class="form-control summernote" rows="5" name="isi">{{Session::get('isi')}}</textarea>
        </div>
        <button class="btn btn-primary" name="save" type="submit">Save</button>
    </form>
@endsection