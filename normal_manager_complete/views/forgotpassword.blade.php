<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Forgot Password</title>
    <style>
         body{
             margin-left:300px;
            background-image: url('/assets/image/login1.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat:no-repeat;
            background-attachment:fixed;
        }
        .btn{
	     width:80px;
	     height: 40px;
        }
       .btn-color {
       border-radius: 50px;
        color: #fff;
        background-image: linear-gradient(to right, #FFD54F, #D500F9);
        padding: 8px;
        cursor: pointer;
        border: none !important;
        margin-top: 0px
       }
        .btn-color:hover {
            color: #fff;
            background-image: linear-gradient(to right, #D500F9, #FFD54F)
        }
    </style>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px">
                <h3>Forgot Password</h3>
                <hr>
                <form action="valid" method="POST">
                @if(Session::has('success'))
                <div class="alert alert-success"><strong>{{Session::get('success')}}</strong></div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger"><strong>{{Session::get('fail')}}</strong></div>
                @endif
                @csrf
                    <div class="form-group">
                        <label for="userName">User Name</label>
                        <input type="text" class="form-control" placeholder="Enter User Name" name="userName" value="{{old('userName')}}">
                        <span  class="text-danger">@error('userName'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="user_password">enter Password</label>
                        <input type="password" class="form-control" placeholder="enter Password" name="user_password" value="{{old('user_password')}}">
                        <span class="text-danger">@error('user_password'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="user_password">Re-enter Password</label>
                        <input type="password" class="form-control" placeholder="Re-enter Password" name="new_password" value="{{old('new_password')}}">
                        <span  class="text-danger">@error('new_password'){{$message}}@enderror</span>
                    </div>
                     <br>
                    <div class="form-group">
                        <button class="btn btn-block btn-color" type="submit">Submit</button>
                    </div> <br>
                    <a href="login">Login Here</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>