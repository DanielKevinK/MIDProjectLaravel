@extends('dashboard.dash')

@section('content')
    <div class="pb-3"><a href="{{route('education.index')}}"  class="btn btn-secondary"> 
        << Back</a>
    </div>
    <form action="{{route('education.store')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">University</label>
          <input type="text" 
            class="form-control form-control-sm" name="judul" id="judul" aria-describedby="helpId" placeholder="Education" 
            value="{{Session::get('judul')}}">
        </div>
        <div class="mb-3">
            <label for="info1" class="form-label">Faculty Name</label>
            <input type="text" 
              class="form-control form-control-sm" name="info1" id="info1" aria-describedby="helpId" 
              placeholder="Faculty Name" value="{{Session::get('info1')}}">
          </div>
        <div class="mb-3">
            <label for="info2" class="form-label">Study Program</label>
            <input type="text" 
              class="form-control form-control-sm" name="info2" id="info2" aria-describedby="helpId" 
              placeholder="Study Program" value="{{Session::get('info2')}}">
          </div>
        <div class="mb-3">
            <label for="info3" class="form-label">GPA</label>
            <input type="text" 
              class="form-control form-control-sm" name="info3" id="info3" aria-describedby="helpId" 
              placeholder="GPA" value="{{Session::get('info3')}}">
          </div>
          <div class="mb-3">
            <div class="row">
                <div class="col-auto">Start Date</div>
                <div class="col-auto"><input type="date" class ="form-control form-control-sm" 
                    name="start" placeholder="dd/mm/yyyy" value="{{Session::get('start')}}"></div>
                <div class="col-auto">End Date</div>
                <div class="col-auto"><input type="date" class ="form-control form-control-sm" 
                    name="end" placeholder="dd/mm/yyyy" value="{{Session::get('end')}}"></div>
                <div class="col-auto"></div>
            </div>
          </div>
        <button class="btn btn-primary" name="save" type="submit">Save</button>
    </form>
@endsection