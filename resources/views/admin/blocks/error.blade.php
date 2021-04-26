
@if (count($errors) > 0)
<ul style="color:red; list-style: none" >
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
