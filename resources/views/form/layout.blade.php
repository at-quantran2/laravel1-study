{{-- @if (count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{!! $error !!}</li>
        @endforeach
    </ul>
@endif --}}


<form enctype="multipart/form-data" action="{!! route('register') !!}" method="POST">
    @csrf
    <label>Course Name</label><br>
    <input type="text" name="name">
    {!! $errors->first('name') !!}
    <br>
    <label>Teacher</label><br>
    <input type="text" name="teacher">
    {!! $errors->first('teacher') !!}<br>
    <label>Price</label><br>
    <input type="text" name="price">
    {!! $errors->first('price') !!}<br>
    <label>Image</label><br>
    <input type="file" name="image"><br>
    {!! $errors->first('image') !!}<br>
    <input type="submit" value="Send">

</form>