@extends('layouts.mainlayout')
 
@section('title', 'Profile')
 
@section('content')

<div>
    <h2>Profile</h2>
</div>

<div>
    {{-- calling component rent-log-table, refer to resources/view/components file --}}
    <x-rent-log-table :rentlogs='$rentlogs'/>
</div>

@endsection