@extends('layouts.main')
@section('container')
<div class="row">
  <h2>Data Diri</h2>
  <div class="col-6">
    <h3>{{ $nama }}</h3>
    <h3>{{ $profesi }}</h3>
    <h3>{{ $hobi }}</h3>
  </div>
</div>
@endsection