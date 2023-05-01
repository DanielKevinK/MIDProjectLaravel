@extends('dashboard.dash')

@section('content')
    <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-between">
            <div class="col-5">
                <h3>Profile</h3>
                @if (get_meta_value('foto'))
                    <img style="max-width: 100px; max-heigh: 100px" src="{{asset('picture') . '/' . get_meta_value('foto')}}" alt="">
                @endif
                <div class="mb-3">
                    <label for="foto" class="form-label">Pictures</label>
                    <input type="file" class="form-control form-control-sm" name="foto" id="foto">
                </div>
                <div class="mb-3">
                    <label for="kota" class="form-label">City</label>
                    <input type="text" class="form-control form-control-sm" name="kota" id="kota" value="{{get_meta_value('kota')}}">
                </div>
                <div class="mb-3">
                    <label for="provinsi" class="form-label">Province</label>
                    <input type="text" class="form-control form-control-sm" name="provinsi" id="provinsi" value="{{get_meta_value('provinsi')}}">
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control form-control-sm" name="phone_number" id="phone_number" value="{{get_meta_value('phone_number')}}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control form-control-sm" name="email" id="email" 
                    value="{{get_meta_value('email')}}">
                </div>
            </div>
            <div class="col-5">
                <h3>Media Sosial</h3>
                <div class="mb-3">
                    <label for="facebook" class="form-label">Facebook</label>
                    <input type="text" class="form-control form-control-sm" name="facebook" id="facebook" value="{{get_meta_value('facebook')}}">
                </div>
                <div class="mb-3">
                    <label for="twitter" class="form-label">Twitter</label>
                    <input type="text" class="form-control form-control-sm" name="twitter" id="twitter" value="{{get_meta_value('twitter')}}">
                </div>
                <div class="mb-3">
                    <label for="linkedIn" class="form-label">LinkedIn</label>
                    <input type="text" class="form-control form-control-sm" name="linkedIn" id="linkedIn" value="{{get_meta_value('linkedIn')}}">
                </div>
                <div class="mb-3">
                    <label for="github" class="form-label">Github</label>
                    <input type="text" class="form-control form-control-sm" name="github" id="github" value="{{get_meta_value('email')}}">
                </div>
            </div>
        </div>
        
        <button class="btn btn-primary" name="save" type="submit">Save</button>
    </form>
@endsection