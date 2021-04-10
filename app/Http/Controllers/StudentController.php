<?php
namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use DB;
use App\Models\ClassModel;
class StudentController extends Controller
{
/**
* Display a listing of the resource.
**
@return \Illuminate\Http\Response
*/
public function index()
{
    $student = Student::with('class')->get();
    $paginate = Student::orderBy('id_student', 'asc')->paginate(3);
    return view('student.index', ['student' => $student, 'paginate' =>$paginate]);
}
public function create()
{
$class = ClassModel::all(); //get data from class table
return view('student.create',['class' => $class]);
}
public function store(Request $request)
{
//melakukan validasi data
$request->validate([
'Nim' => 'required',
'Name' => 'required',
'Class' => 'required',
'Major' => 'required',
]);
// eloquent function to add data
Student::create($request->all());
// if the data is added successfully, will return to the main page
return redirect()->route('student.index')
->with('success', 'Student Successfully Added');
}
public function show($Nim)
{
// displays detailed data by finding / by Student Nim
$student = Student::with('class')->where('nim', $Nim)->first();
return view('student.detail', ['Student' => $student]);
}
public function edit($Nim)
{
// displays detail data by finding based on Student Nim for editing
$Student = DB::table('student')->where('nim', $Nim)->first();;
$class = Class::all();
return view('student.edit', compact('Student','Class'));
}
public function update(Request $request, $Nim)
{
//validate the data
$request->validate([
'Nim' => 'required',
'Name' => 'required',
'Class' => 'required',
'Major' => 'required',
]);

$student = new Mahasiswa;
$student->nim = $request->get('nim');
$student->name = $request->get('name');
$student->major = $request->get('major');
$student->save();

$class = new ClassModel;
$class->id = $request->get('Class');

$student->class()->associate($class);
$student->save();

return redirect()->route('student.index')
    ->with('success', 'Student successfully added');
}
public function destroy( $Nim)
{
//Eloquent function to delete the data
Student::find($Nim)->delete();
return redirect()->route('student.index')
-> with('success', 'Student Successfully Deleted');
}
};


