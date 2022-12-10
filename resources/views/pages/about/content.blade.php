@extends('layouts.app')
@section('title', 'About')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header pb-1">
                    <h4>About Me</h4>
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
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form class="forms-sample" method="POST" action="{{ route('about.update', $about->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Input your name"
                                value="{{ $about->name }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Birthday</label>
                            <input type="date" class="form-control" name="birthday" placeholder="Input your name"
                                value="{{ $about->birthday }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Address</label>
                            <textarea name="address" class="form-control" cols="30" rows="20" placeholder="Input your address">{{ $about->address }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Age</label>
                            <input type="text" class="form-control" name="age" placeholder="Input your age"
                                value="{{ $about->age }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Degree</label>
                            <input type="text" class="form-control" name="degree" placeholder="Input your degree"
                                value="{{ $about->degree }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Major</label>
                            <input type="text" class="form-control" name="major" placeholder="Input your major"
                                value="{{ $about->major }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Input your email"
                                value="{{ $about->email }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Relationship Status</label>
                            <input type="text" class="form-control" name="status"
                                placeholder="Input your relationship status" value="{{ $about->status }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Description</label>
                            <textarea name="description" class="form-control" cols="30" rows="20"
                                placeholder="Input your description">{{ $about->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <img src="{{ asset($about->image) }}" alt="Picture" class="img-thumbnail w-25 mt-2 mb-3"
                                id="image" /><br>
                            <label>Profile Image</label>
                            <input type="file" name="image" class="file-upload-default" accept="image/*" />
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Choose your image" />
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" style="height: 37px;"
                                        type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary p-2" id="save">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $('.file-upload-browse').on('click', function() {
                $('.file-upload-default').click();
            });

            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(".file-upload-default").on('change', function() {
                readURL(this);
                var filename = $('.file-upload-default').val().replace(/.*(\/|\\)/, '');

                $('.file-upload-info').val(filename);
            });


        });
    </script>
@endsection
