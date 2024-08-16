@extends('layouts.app')

@section('content')
    
    

    @if($cows->isEmpty())
        <h1 class="text-center bg-info mt-5 mx-auto p-3" style="width: 15rem;">No Records found!</h1>
    @else
        <div class="table-responsive mx-3">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Serial Code</th>
                        <th scope="col">Breed</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Purpose</th>
                        <th scope="col">Vaccination & Health Records</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cows as $cow)
                        <tr>
                            <td>{{$cow->serial_code}}</td>
                            <td>{{$cow->breed}}</td>
                            <td>{{$cow->dob}}</td>
                            <td>{{$cow->purpose}}</td>
                            <td>{{$cow->vaccination_health_records}}</td>
                            <td>{{$cow->gender}}</td>
                            <td>
                                <img src="{{asset('storage/'.$cow->cow_image)}}" class="img-thumbnail" style="width: 100px;" alt="Cow Image">
                            </td>
                            <td>
                                <a href="{{route('edit-cow', ['id' => $cow->id])}}" class="btn btn-warning">Edit</a>
                                <form action="{{route('delete-cow', ['id' => $cow->id])}}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this cow?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
