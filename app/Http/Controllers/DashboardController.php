<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Organization;
use App\Models\Student;

class DashboardController extends Controller
{
    public function index(){
        $student_count = Student::all()->count();
        $member_count = Member::all()->count();
        $organization_count = Organization::all()->count();
        $data = [
            'title' => 'Dashboard',
            'student_count' => $student_count,
            'member_count' => $member_count,
            'organization_count' => $organization_count,
        ];
        return view('pages.dashboard.index', $data);
    }
}
