@extends('layouts.app')
@section('title', 'Portfolio')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <a href="{{ route('portfolio.create') }}" class="btn btn-outline-success">+ Add New Portfolio</a>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
                    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

                    <script>
                        Toastify({
                            avatar: "{{ asset('assets/images/avatar.ico') }}",
                            text: {!! json_encode($message) !!},
                            duration: 5000,
                            destination: "https://github.com/apvarun/toastify-js",
                            newWindow: true,
                            close: true,
                            gravity: "bottom", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "#49b462",
                                color: '#fff',
                            },
                            onClick: function(){} // Callback after click
                        }).showToast();
                    </script>
                @endif
                <table class="table table-bordered table-striped" id="table1">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Company Name</th>
                            <th>Type</th>
                            <th>Url</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($portfolio as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->company_name }}</td>
                                <td>@if($data->type == "mobileapp") Mobile App @else Website @endif</td>
                                <td>{{ $data->url }}</td>
                                <td>{{ $data->description }}</td>
                                <td><img src="{{ asset($data->image) }}" alt="image" class="img-thumbnail"></td>
                                <td>
                                    <a class="btn btn-outline-info btn-block mb-2" href="{{ route('portfolio.edit', $data->id) }}">Edit</a>
                                    <form action="{{ route('portfolio.destroy', $data->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger btn-block">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
