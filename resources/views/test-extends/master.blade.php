<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Title | @yield('title')</title>
</head>
<style>
    .container {
        width: 1024px;
        margin: 0 auto;
        text-align: center;
    }
    #header {
        background-color: green;
        width: 80%;
        padding:30px;
    }
    #content {
        padding: 30px;
        background-color:blue;
        width: 80%;
    }

</style>
<body>
    <div class="container">
        <h2>This is template</h2>
        <div id='header'>
            @section('header')
                master header
            @show
        </div>
        <div id='content'>
            @yield('content')
        </div>
    </div>
</body>
</html>