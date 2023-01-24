<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get students
        $students = Student::latest()->paginate(5);

        //render view with students
        return view('students.index', compact('students'));
    }
    
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'number'     => 'required|max:5',
            'name'     => 'required|max:30',
            'photo'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email'     => 'required|min:10',
            'phone'   => 'required|max:21'
        ]);

        //upload photo
        $photo = $request->file('photo');
        $photo->storeAs('public/students', $photo->hashName());

        //create Student
        Student::create([
            'number'     => $request->number,
            'name'       => $request->name,
            'photo'      => $photo->hashName(),
            'email'      => $request->email,
            'phone'      => $request->phone
        ]);

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}