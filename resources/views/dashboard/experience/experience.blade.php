@extends('dashboard.dash')

@section('content')
    <p class="card-title">Experience</p>
    <div class="pb-3" ><a href="{{route('experience.create')}}" class="btn btn-primary">+ Add Experience</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Job Desc</th>
                    <th>Company Name</th>
                    <th>Start-date</th>
                    <th>End-date</th>
                    <th class="col-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$item->judul}}</td>
                        <td>{{$item->info1}}</td>
                        <td>{{$item->new_start_date}}</td>
                        <td>{{$item->new_end_date}}</td>
                        <td>
                            <a href="{{route('experience.edit', $item->id)}}" class="btn btn-sm btn-warning">Edit</a>
                            
                            <form onsubmit = "return confirm('Are you sure want to delete this data?')"
                             action="{{route('experience.destroy', $item->id)}}" class="d-inline" method="POST">
                             @csrf
                             @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" name="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
                
            </tbody>
        </table>
    </div>
@endsection

