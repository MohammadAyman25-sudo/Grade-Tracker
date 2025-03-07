<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Services\CourseServices;

class RunDevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-courses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(CourseServices $myService)
    {
        //
        $this->info("Executing addCourses method...");
        $response = $myService->addCourses();
        if ($response->status() === 200) {
            $this->info("Executing addCourses method... Done");
        }
        else {
            $this->info("Executing addCourses method... Failed");
            $this->error($response->getContent());
        }
    }
}
