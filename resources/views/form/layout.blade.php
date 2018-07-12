{{-- @if (count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{!! $error !!}</li>
        @endforeach
    </ul>
@endif --}}
<form action="{!! route('register') !!}" method="POST">
    @csrf
    <label for="">Course Name</label><br>
    <input type="text" name="name">
    {!! $errors->first('name') !!}
    <br>
    <label for="">Teacher</label><br>
    <input type="text" name="teacher">
    {!! $errors->first('teacher') !!}<br>
    <label for="">Price</label><br>
    <input type="text" name="price">
    {!! $errors->first('price') !!}<br>
    <input type="submit" value="Send">

</form>