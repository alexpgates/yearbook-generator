<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Student;
use App\StaffMember;
use Illuminate\Support\Facades\Artisan;

class ParseYearbook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'yearbook:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse Scholastic yearbook data and insert in database.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Artisan::call('migrate:refresh');

        $folders = file_get_contents(asset('yearbook/Folders.txt'));
        $folders_arr = array_filter(explode(PHP_EOL, $folders));

        foreach($folders_arr as $folder){

            $folder_index = file_get_contents(asset('yearbook/'.trim($folder).'/'.trim($folder).'.txt'));
            $folder_arr = array_filter(explode(PHP_EOL, $folder_index));

            foreach($folder_arr as $person_row){
                $person_arr = explode("\t", $person_row);

                if($person_arr[3] == 'Staff'){
                    $staff = new StaffMember;
                    $staff->photo = $person_arr[2];
                    $staff->last_name = $person_arr[4];
                    $staff->first_name = $person_arr[5];
                    $staff->save();
                }else{
                    $student = new Student;
                    $student->photo = $person_arr[2];
                    $student->grade = $person_arr[3];
                    $student->first_name = $person_arr[5];
                    $student->last_name = $person_arr[4];
                    $student->teacher = $person_arr[8];
                    $student->save();
                }

            }
        }
    }
}
