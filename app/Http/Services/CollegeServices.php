<?php

namespace App\Http\Services;

use App\Models\User;
use App\Http\Services\GradeServices;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CollegeServices {
    public function verifyCredentials(array $credentials) {
        try {
            $response = Http::post("http://193.227.14.58/api/authenticate", [
                "username" => $credentials["username"],
                "password" => $credentials["password"],
            ]);
            if($response->status() !== 200){
                abort($response->status(), $response->getBody());
            }
            
            return $response;
        }
        catch (HttpException $e) {
            return response()->json([
                "error" => true,
                "code" => $e->getStatusCode(),
                "message" => $e->getMessage(),
            ], $e->getStatusCode());
        }
    }

    public function addStudentData(string $id, string $token, User $user) {
        try {
            $response = Http::withHeaders(['Authorization' => 'Bearer ' . $token])
                ->get("http://193.227.14.58/api/students/" . $id);
            if ($response->status() !== 200) {
                abort($response->status(), $response->getBody());
            }
            
            $user->latest_level = $response->json('level.name');
            $user->gpa = $response->json('gpa');
            $user->save();
        } catch (HttpException $th) {
            return response()->json([
                "error"=>true,
                "code"=>$th->getStatusCode(),
                "message"=>$th->getMessage()
            ], $th->getStatusCode());
        }
    }

    public function getCurrentGradeData($token, $user_id) {
        try {
            $response = Http::withHeader('Authorization', "Bearer {$token}")
                        ->get(
                            "http://193.227.14.58/api/student-courses/",
                            ["studentId.equals" => $user_id, "size" => 150]
                        );
            if($response->status() !== 200) {
                abort($response->status(), $response->getBody());
            }
            return $response;
       } catch (HttpException $th) {
            return response()->json([
                "error" => true,
                "code" => $th->getStatusCode(),
                "message" => $th->getMessage(),
            ], $th->getStatusCode());
       }
    }

    public function Authenticate(string $username, string $password) {
        try {
            $response = Http::post(
                "http://193.227.14.58/api/authenticate",
                [
                    "username" => $username,
                    "password" => $password,
                ]
            );
            if ($response->successful()) {
                return response()->json([
                    'error'=>false,
                    'code' => 200,
                    'message' => $response->json('id_token')
                ]);
            } else {
                abort($response->status(), $response->getBody());
            }
        } catch (HttpException $th) {
            return response()->json([
                "error" => true,
                "code" => $th->getStatusCode(),
                "message" => $th->getMessage(),
            ],$th->getStatusCode());
        }
    }

    public static function getCourseData(string $token, string $user_id, string $course_id = "") {
       try {
            $response = Http::withHeader('Authorization', "Bearer {$token}")
                        ->get(
                            "http://193.227.14.58/api/student-courses/",
                            ["studentId.equals" => $user_id, "size" => 150, "courseId.equals" => $course_id]
                        );
            if($response->status() !== 200) {
                abort($response->status(), $response->getBody());
            }
            Log::info($response);
            return $response;
       } catch (HttpException $th) {
            return response()->json([
                "error" => true,
                "code" => $th->getStatusCode(),
                "message" => $th->getMessage(),
            ], $th->getStatusCode());
       }
    }
}
