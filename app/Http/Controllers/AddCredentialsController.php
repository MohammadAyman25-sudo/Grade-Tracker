<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Services\CollegeServices;

class AddCredentialsController extends Controller
{
    /**
     * This method is responsible for adding the user college credentials in the database.
     * These Credentials will be used to get user grades from the college database
     * @param \Illuminate\Http\Request $request
     * @param \App\Http\Services\CollegeServices $collegeServices
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addCredentials(Request $request, CollegeServices $collegeServices)
    {
        $validatedCredentials = $request->validate([
            'select-college' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $response = $collegeServices->verifyCredentials($validatedCredentials);
        if ($response->status() === 200) {
            $token = $response->json()['id_token'];
            $collegeServices->addStudentData($validatedCredentials["username"], $token, $request->user());
            $gradeDataResponse = $collegeServices->getCurrentGradeData($validatedCredentials["username"], $token);
            if ($gradeDataResponse->status() === 200) {
                foreach ($gradeDataResponse->json() as $course) {
                    $course_id = Course::where('code', '=', $course["course"]["code"])->get('id')->first();
                    Grade::create([
                        "user_id" => session('user_id'),
                        "course_id" => $course_id->id,
                        "grade" => $course["grade"]
                    ]);
                }
            }
            $request->user()->fill([
                'college_username' => $request->get('username'),
                'college_password' => Crypt::encryptString($request->get('password'))
            ]);
            $request->user()->save();
            return back()->with(['status' => 'Credentials Added Successfully!!!']);
        }
        if($response->status() === 401) {
            return back()->withErrors(['status' => "Credentials are not Correct !!!"]);
        }
        return back()->withErrors(['status' => "I Was Unable To Verify Your Credentials Try Again Later !!!"]);
    }
}
