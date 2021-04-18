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
<div class="float-left my-2">
<p> Search Student :</p>
<form action="/student/search" method="GET">
    <input type="text" name="search" value="{{ value('search') }}">
    <input type="submit" value="Search">
</form>
<tr>
<tr>
</div>
</div>
</div>
@if ($message = Session::get('success'))
@div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>Nim</th>
<th>Name</th>
<th>Class</th>
<th>Major</th>
<th width="280px">Action</th>
</tr>
@foreach ($student as $mhs)
<tr>
<td>{{ $mhs ->nim }}</td>
<td>{{ $mhs ->name }}</td>
<td>{{ $mhs ->class->class_name}}</td>
<td>{{ $mhs ->major }}</td>
<td>
<form action="{{ route('student.destroy',['student'=>$mhs->nim]) }}" method="POST">
<a class="btn btn-info" href="{{ route('student.show',$mhs->nim) }}">Show</a>
<a class="btn btn-primary" href="{{ route('student.edit',$mhs->nim) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@extends('layouts.app')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered" style="width:95%;margin: 0
auto;">
<tr>
<th>Student_Image</th>
</tr>
@foreach ($student as $student)
<tr>
<td><img width="150px"
src="{{asset('storage/'.$student->student_image)}}"></td>
</tr>
<dic class="row">
    <div style="margin:0px 0px 0px 70px;">
        <a class="btn btn=success" href="{{ route('print_pdf') }}"> Print PDF</a>
    </div>
</div><br/>
@endforeach
</table>
@endsection
