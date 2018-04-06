<?php

namespace App\Http\Controllers;
use App\Student;
use App\StaffMember;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($teacher){
        $students = Student::where('teacher', $teacher)->orderBy('last_name', 'ASC')->get();
        $teacher = StaffMember::where('last_name', $teacher)->first();
        $support = StaffMember::where('teacher_room', $teacher)->where('last_name', '!='. $teacher)->get();
        return view('classroom.show', compact('students', 'teacher', 'support'));
    }

    public function staff(){
        $principal = StaffMember::where('title', 'principal')->first();
        $staff = StaffMember::where('teacher_room', 'staff')->where('title', '!=', 'principal')->orWhereNull('title')->get();
        return view('staff.show', compact('principal', 'staff'));
    }
}
