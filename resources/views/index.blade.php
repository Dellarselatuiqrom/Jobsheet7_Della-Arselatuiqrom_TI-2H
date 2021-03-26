@extends('student.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mt-2">
<h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
</div>
<div class="float-right my-2">
<a class="btn btn-success" href="{{ route('student.create') }}"> Input Student Data</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
