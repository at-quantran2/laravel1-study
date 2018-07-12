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