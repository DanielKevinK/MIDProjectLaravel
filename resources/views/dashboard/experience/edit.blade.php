@extends('dashboard.dash')

@section('content')
    <div class="pb-3"><a href="{{route('experience.index')}}"  class="btn btn-secondary"> 
        << Back</a>
    </div>
    <form action="{{route('experience.update', $data->id)}}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="judul" class="form-label">Position</label>
          <input type="text" 
            class="form-control form-control-sm" name="judul" id="judul" aria-describedby="helpId" placeholder="Position" 
            value="{{$data->judul}}">
        </div>
        <div class="mb-3">
            <label for="info1" class="form-label">Company Name</label>
            <input type="text" 
              class="form-control form-control-sm" name="info1" id="info1" aria-describedby="helpId" 
              placeholder="Company Name" value="{{$data->info1}}">
          </div>
          <div class="mb-3">
            <div class="row">
                <div class="col-auto">Start Date</div>
                <div class="col-auto"><input type="date" class ="form-control form-control-sm" 
                    name="start" placeholder="dd/mm/yyyy" value="{{$data->start}}"></div>
                <div class="col-auto">End Date</div>
                <div class="col-auto"><input type="date" class ="form-control form-control-sm" 
                    name="end" placeholder="dd/mm/yyyy" value="{{$data->end}}"></div>
                <div class="col-auto"></div>
            </div>
          </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Content</label>
            <textarea class="form-control summernote" rows="5" name="isi">{{$data->isi}}</textarea>
        </div>
        <button class="btn btn-primary" name="save" type="submit">Save</button>
    </form>
@endsection