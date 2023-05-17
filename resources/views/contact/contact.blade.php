<html>

<head>
    <title>HariSenin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />

</head>

<body>
    <container>
        <div class="row mt-5 mb-5">
            <div class="col-10 offset-1 mt-5">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Contact Us Form</h3>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                        @endif

                        <form method="POST" action="/contact" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Name:</strong>
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name')}}" />
                                    @if($errors->has('name'))
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <strong>Email:</strong>
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}" />
                                    @if($errors->has('email'))
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Phone:</strong>
                                    <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{old('phone')}}" />
                                    @if($errors->has('phone'))
                                    <span class="text-danger">{{$errors->first('phone')}}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <strong>Subject:</strong>
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" value="{{old('subject')}}" />
                                    @if($errors->has('subject'))
                                    <span class="text-danger">{{$errors->first('subject')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <strong>Message:</strong>
                                    <textarea type="text" name="message" rows="3" class="form-control" placeholder="Message" value="{{old('message')}}"></textarea>
                                    @if($errors->has('message'))
                                    <span class="text-danger">{{$errors->first('message')}}</span>
                                    @endif
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>File input</strong>
                                        <input type="file" name="file" class="form-control-file" />
                                    </div>

                                </div>
                            </div>
                            <div class="form-group text-center mt-5">
                                <button class="btn btn-success btn-submit">Submit </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </container>
</body>

</html>