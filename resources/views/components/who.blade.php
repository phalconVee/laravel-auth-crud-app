@if (Auth::guard('web')->check())
 <p class="text-success">
    you are logged In as a <strong>USER!</strong>
 </p>

 @else
 <p class="text-danger">
    you are logged Out as a <strong>USER!</strong>
 </p>
@endif


@if (Auth::guard('admin')->check())
 <p class="text-success">
    you are logged In as an <strong>ADMIN!</strong>
 </p>

 @else
 <p class="text-danger">
    you are logged Out as an <strong>ADMIN!</strong>
 </p>
@endif
