@extends('dashboard.dash')

@section('content')
    <form action="{{route('settings.update')}}" method="POST">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2">About</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="about">
                    <option value="">-Select-</option>
                    @foreach ($datahalaman as $item)
                        <option value="{{$item->id}}" {{get_meta_value('about') == $item->id? 'selected' : ''}}>{{$item->judul}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2">Interest</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="interest">
                    <option value="">-Select-</option>
                    @foreach ($datahalaman as $item)
                        <option value="{{$item->id}}" {{get_meta_value('interest') == $item->id? 'selected' : ''}}>{{$item->judul}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2">Awards</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="awards">
                    <option value="">-Select-</option>
                    @foreach ($datahalaman as $item)
                        <option value="{{$item->id}}" {{get_meta_value('awards') == $item->id? 'selected' : ''}}>{{$item->judul}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button class="btn btn-primary" name="save" type="submit">Save</button>
    </form>
@endsection
