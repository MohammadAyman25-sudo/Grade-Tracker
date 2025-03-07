<?php

    namespace App\Http\Services;
    
    use App\Models\User;
    use App\Models\Grade; 
    use App\Models\Course;
    use Illuminate\Support\Facades\Crypt;
    use App\Http\Services\CollegeServices;
    
    class TrackerServices {
        public function trace () {
            $allUsers = User::whereNotNull('college_username')->get();
            foreach($allUsers as $user) {
                $user_id = $user->id;
                $username = $user->college_username;
                $password = Crypt::decryptString($user->college_password);
                $response = CollegeServices::Authenticate($username, $password);
                $requiredGrades = Grade::where('user_id', "=", $user_id);
                if ($response->status() === 200) {
                    $token =  $response->getData()->message;
                    foreach($requiredGrades as $grade) {
                        $course_id = $grade->course_id;
                        $collegeCourseID = Course::where('id', '=', $course_id)->get('course_id')->first()->id;
                        $courseResponse = CollegeServices::getCourseData($token, $username, $collegeCourseID);
                        if($courseResponse->status() === 200) {
                            $courseGrade = $courseResponse->json('grade');
                            if ($grade->grade !== $courseGrade) {
                                $grade->grade = $courseGrade;
                            }
                            $grade->save();
                        }
                    }
                }
            }
        }

        public function addNewCourses() {
            $allUsers = User::whereNotNull('college_username')->get();
            foreach($allUsers as $user) {
                $user_id = $user->id;
                $username = $user->college_username;
                $password = Crypt::decryptString($user->college_password);
                $response = CollegeServices::Authenticate($username, $password);
                if ($response->status() === 200) {
                    $token = $response->getData()->message;
                    $courses = CollegeServices::getCourseData($token, $username);
                    foreach($courses->json() as $course) {
                        $course_code = $course["course"]["code"];
                        $course_id = Course::where("code", "=", $course_code)->get('id')->first()->id;
                        if (Grade::where('course_id', '=', $course_id)->count() === 0) {
                            Grade::create([
                                "user_id"   => $user_id,
                                "course_id" => $course_id,
                                "grade"     => $course["grade"]
                            ]);
                        }
                    }
                }
            }
        }
    }