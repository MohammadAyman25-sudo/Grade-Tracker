<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Course;
use Illuminate\Support\Facades\Crypt;
use App\Http\Services\CollegeServices;

class TrackerController {
    public function checkChanges() {
        $users = User::whereNotNull('college_username')->get();
        $collegeServices = new CollegeServices();
        foreach($users as $user) {
            $user_id = $user->college_username;
            $token = $collegeServices->Authenticate($user_id, Crypt::decryptString($user->college_password));
            $current_grades = $collegeServices->getCurrentGradeData($token, $user_id);
            if ($current_grades->status() !== 200) {
                abort($current_grades->status(), $current_grades->message());
            }
            $previous_grade = Grade::where('user_id', '=', $user->id);
            foreach($current_grades->json() as $grade) {
                $course = Course::where('code', '=', $grade->course->code)->get('id');
                $prevCourseData = $previous_grade->where('course_id', '=', $course->id);
                if ($prevCourseData->exists()) {    
                    if ($prevCourseData->get('grade') !== $grade->grade) {
                        // Update Grade and Email The Student
                        $grade->update(['grade' => $grade->grade]);
                    }
                }
                else {
                    // Insert New Grade
                    $grade->insert(['user_id' => $user->id, 'course_id' => $course->id, 'grade' => $grade->grade]);
                }
            }
        }
    }
}