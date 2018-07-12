@if (count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{!! $error !!}</li>
        @endforeach
    </ul>
@endif
<form action="{!! route('register') !!}" method="POST">
    @csrf

    <label for="">Course Name</label><br>
    <input type="text" name="name" id=""><br>
    <label for="">Teacher</label><br>
    <input type="text" name="teacher" id=""><br>
    <label for="">Price</label><br>
    <input type="text" name="price" id=""><br>
    <input type="submit" value="Send">

</form>