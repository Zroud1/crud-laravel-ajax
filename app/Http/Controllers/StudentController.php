<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends BaseController
{

    public function index()
    {
        return view('student.student');
    }

    public function fetchStudent()
    {
        $students = Student::all();
        return response()->json([
            'students'=>$students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required|max:191',
            'speciality'=>'required|max:191',
            'email'=>'required|email|max:191',
            'phone'=>'required|max:10|min:10',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $student = new Student;
            $student->name = $request->input('name');
            $student->speciality = $request->input('speciality');
            $student->email = $request->input('email');
            $student->phone = $request->input('phone');
            $student->save();
            return response()->json([
                'status'=>200,
                'message'=>'Student Added Successfully.'
            ]);
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student=Student::Where("id",$id)->get();
        return response()->json([
            'student' => $student,
        ]);
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required|max:191',
            'speciality'=>'required|max:191',
            'email'=>'required|email|max:191',
            'phone'=>'required|max:10|min:10',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
         }
        $student = Student::find($id);

            if($student)
            {
                $student->name = $request->name;
                $student->speciality = $request->speciality;
                $student->email = $request->email;
                $student->phone = $request->phone;
                $student->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Student Updated Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Student Found.'
                ]);
            }
    }


    public function destroy($id)
    {

        Student::find($id)->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Student delete Successfully.'
        ]);
    }
}
