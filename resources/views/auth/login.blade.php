<!DOCTYPE html>
<html>
<head>
    <title>Canvas Garment | Login Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    <style type="text/css">
        .logo{
            width: 100%;
            height: auto;
            margin: 20px;
        }

        .isiForm{
            margin-top: 50px;
            text-align: center;
            font-family: opensans-semibold;
        }

        .input-group{
            padding-left: 30px;
            padding-right: 30px;
            text-align: center;
        }

        .form-control{
            width: 80%;
            height: 40px;
        }

        .control-label {
            line-height: 25px;
        }

        .menu{
            text-align: right;
            margin-top: 40px;
            padding-right: 40px;
        }

        .tMenu{
            text-decoration: none;
            font-family: opensans-semibold;
            font-size: 20px;
            color: #5bc0de;
        }

        .tMenu:hover{
            color: #272828;
            text-decoration: none;
            transition: all .2s ease-in-out;
        }

        @font-face {
            font-family: OpenSans-semibold;
            src: url('open-sans/OpenSans-semibold.ttf');
        }

        @font-face {
            font-family: OpenSans-light;
            src: url('open-sans/OpenSans-light.ttf');
        }

        @media only screen and (max-width: 990px) {
            .logo{
                width: 60%;
                height: auto;
            }

            .gambar{
                text-align: center;
            }

            .isiForm{
                margin-top: 150px;
            }

            .input-group{
                margin-left: 100px;
                margin-right: 100px;
            }

            .menu{
                text-align: center;
            }
        }

        .konten{
            width: 100%;
            float: left;
        }

        div{
            /*border-style: solid;*/
        }
    </style>
</head>
<body>
    <div class="col-md-12">
        <div class="konten">
            <div class="col-md-12">
                <div class="col-md-2 gambar">
                    <a href="{{ URL::to('http://canvasgarment.com') }}"><img class="logo" src="logo.png"></a>
            </div>
            <div class="col-md-12 isiForm">
                <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
                    <h1 class="text-center" style="margin-bottom: 50px;">Halaman Login</h1>
                    <form class="form-horizontal" role="form" action="{{ route('login') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-2 text-right" for="email">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-2 text-right" for="password">Password:</label>
                            <div class="col-sm-10"> 
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-top: 50px;">
                            <div class="col-sm-offset-3 col-sm-6">
                                <a href="{{ url('/') }}" class="btn btn-danger">Batal</a>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</body>
</html>