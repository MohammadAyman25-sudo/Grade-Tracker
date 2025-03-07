<?php

namespace App\Http\Services;

use Exception;
use App\Models\Course;
use Illuminate\Support\Facades\Http;

class CourseServices {
    public static function addCourses() {
        try {
            $url = "https://grade-tracker.m-ayman.com/courses/fcai-cu.json";
            $response = Http::get($url);
            $courses = $response->json();
            foreach ($courses as $course) {
                Course::create(["name" => $course["name"], "code" => $course["code"], "course_id" => $course["id"]]);
            }
            return $response;
        } catch (Exception $th) {
            return response()->json([
                "error" => true,
                "code" => 500,
                "message" => $th->getMessage(),
            ], 500);
        }
    }
}