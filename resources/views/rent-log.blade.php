@extends('layouts.mainlayout')
 
@section('title', 'Rent Log')
 
@section('content')

<div>
    <h2>Rent Logs</h2>
</div>

<div class="my-5">

    {{-- calling component rent-log-table, refer to resources/view/components file --}}
    <x-rent-log-table :rentlogs='$rentlogs'/>

</div>

@endsection