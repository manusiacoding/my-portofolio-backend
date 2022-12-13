<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Dashboard | Portfolio</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main/app-dark.css') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/images/avatar.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="{{ route('portfolio.index') }}"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="{{ route('home.index') }}">
                <img src="{{ asset('assets/images/logo-mctech.png') }}" />
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="card mt-5">
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
                <form action="{{ route('portfolio.store') }}" class="form form-vertical" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Project Name</label>
                                    <div class="position-relative">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter project name" id="first-name-icon" />
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="form-control-icon">
                                            <i class="fa-solid fa-globe"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="email-id-icon">Company Name</label>
                                    <div class="position-relative">
                                        <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" placeholder="Enter company name" id="email-id-icon" />
                                        @error('company')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="form-control-icon">
                                            <i class="fa-solid fa-building"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="email-id-icon">Project Type</label>
                                    <div class="position-relative">
                                        <select name="type" id="email-id-icon" class="form-control @error('type') is-invalid @enderror">
                                            <option value="" selected disabled>Choose project type</option>
                                            <option value="mobileapp">Mobile Apps</option>
                                            <option value="website">Website</option>
                                        </select>
                                        @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="form-control-icon">
                                            <i class="fa-solid fa-diagram-project"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="email-id-icon">Project URL</label>
                                    <div class="position-relative">
                                        <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" placeholder="Enter project url" id="email-id-icon" />
                                        @error('url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="form-control-icon">
                                            <i class="fa-solid fa-link"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email-id-icon">Project Description</label>
                                    <div class="position-relative">
                                        <textarea name="description" id="email-id-icon" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror"></textarea>
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

    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
