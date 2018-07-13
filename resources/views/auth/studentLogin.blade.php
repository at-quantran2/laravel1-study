 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <title>Login</title>
 </head>
 <body>
    <div class="w-50">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
            <li>{!! $error!!}</li>
            @endforeach
            </ul>
        </div>
        @endif
    </div>
    <form action="{!! route('postLogin') !!}" method="post" class="mx-auto w-50">
        @csrf
        <h1 class="text-center mt-5">Login Student</h1>
        <div class="form-group">
            <label for="">User name</label>
            <input type="text" name="user_name" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" id="" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit"  value="Create" class="btn btn-primary w-50 d-block mx-auto">
        </div>
    </form>
 </body>
 </html>