@extends('layouts.app')

@section('content')
<div class="container">
  
    <div id="app">
        <app id="<?php echo (Auth::user()?Auth::user()->id:null);?>"></app>
    </div>
    
</div>
@endsection
