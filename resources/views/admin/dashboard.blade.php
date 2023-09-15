@extends('layouts.appadmin')

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('layouts.navbar1')
        
        <div class="col offset-xl-2 col offset-lg-3 offset-md-3 offset-sm-3 offset-4 col-md-9 col-xl-10 py-3">
            Content area... Dashboard
        </div>
    </div>
</div>
@endsection
