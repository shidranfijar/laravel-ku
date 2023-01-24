@extends('layouts.admin')
@section('content')

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link href="style.css" rel="stylesheet">

  </head>


  <body>

    <main>

      
      <body style="background: lightgray">

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <a href="{{ route('students.create') }}" class="btn btn-md btn-success mb-3">Add Student</a>
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">Number</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">AKSI</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @forelse ($students as $student)
                                    <tr>
                                        <td>{{ $student->number }}</td>
                                        <td>{!! $student->name !!}</td>
                                        <td class="text-center">
                                            <img src="{{ Storage::url('public/students/').$student->photo }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('students.destroy', $student->id) }}" method="POST">
                                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                  @empty
                                      <div class="alert alert-danger">
                                          Data student belum Tersedia.
                                      </div>
                                  @endforelse
                                </tbody>
                              </table>  
                              {{ $students->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
        <script>
            //message with toastr
            @if(session()->has('success'))
            
                toastr.success('{{ session('success') }}', 'BERHASIL!'); 
    
            @elseif(session()->has('error'))
    
                toastr.error('{{ session('error') }}', 'GAGAL!'); 
                
            @endif
        </script>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>


@stop