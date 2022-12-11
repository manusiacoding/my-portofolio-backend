@extends('layouts.app')
@section('title', 'About')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
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
                    <form class="forms-sample" method="POST" action="{{ route('about.update', $about->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Name</label>
                                        <div class="position-relative">
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name" id="first-name-icon" value="{{ $about->name }}" />
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="fa-solid fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="email-id-icon">Birthday</label>
                                        <div class="position-relative">
                                            <input type="text" name="birthday" class="form-control @error('birthday') is-invalid @enderror" placeholder="Enter birthday" id="email-id-icon" value="{{ $about->birthday }}" />
                                            @error('birthday')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="fa-solid fa-cake-candles"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email-id-icon">Address</label>
                                        <div class="position-relative">
                                            <textarea name="address" id="email-id-icon" cols="30" rows="5" class="form-control @error('address') is-invalid @enderror">{{ $about->address }}</textarea>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="email-id-icon">Age</label>
                                        <div class="position-relative">
                                            <input type="text" name="age" class="form-control @error('age') is-invalid @enderror" placeholder="Enter age" id="email-id-icon" value="{{ $about->age }}" />
                                            @error('age')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="fa-solid fa-list-ol"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="email-id-icon">Degree</label>
                                        <div class="position-relative">
                                            <input type="text" name="degree" class="form-control @error('degree') is-invalid @enderror" placeholder="Enter degree" id="email-id-icon" value="{{ $about->degree }}" />
                                            @error('degree')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="fa-solid fa-school"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="email-id-icon">Major</label>
                                        <div class="position-relative">
                                            <input type="text" name="major" class="form-control @error('major') is-invalid @enderror" placeholder="Enter major" id="email-id-icon" value="{{ $about->major }}" />
                                            @error('major')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="fa-solid fa-user-graduate"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="email-id-icon">Email</label>
                                        <div class="position-relative">
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" id="email-id-icon" value="{{ $about->email }}" />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="fa-solid fa-at"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="email-id-icon">Status</label>
                                        <div class="position-relative">
                                            <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" placeholder="Enter status" id="email-id-icon" value="{{ $about->status }}" />
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="form-control-icon">
                                                <i class="fa-solid fa-heart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email-id-icon">Description</label>
                                        <div class="position-relative">
                                            <textarea name="description" id="email-id-icon" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror">{{ $about->description }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email-id-icon">Project Image</label>
                                        <div class="position-relative">
                                            <img src="{{ asset($about->image) }}" alt="image" class="img-thumbnail w-25 my-3" id="image">
                                            <input name="image" class="form-control @error('image') is-invalid @enderror" type="file" id="formFile" accept="image/*" />
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                <div class="col-12 mt-2 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-outline-primary me-2 mb-1">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-outline-secondary me-2 mb-1">
                                        Reset
                                    </button>
                                </div>
                            </div>
                        </div>
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
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#formFile").on('change', function() {
                readURL(this);
                // var filename = $('.file-upload-default').val().replace(/.*(\/|\\)/, '');

                // $('.file-upload-info').val(filename);
            });


        });
    </script>
@endsection
