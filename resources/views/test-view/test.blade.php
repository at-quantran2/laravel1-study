{{-- Hello {{ Session::get('name') }} --}}
axax

Hello 
<div>
    @if (Auth::check())
        {{ Auth::user()}}
    @else
        Not Login
    @endif
</div>
