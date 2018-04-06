<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Student;
use App\StaffMember;
use Illuminate\Support\Facades\Artisan;
use Spatie\Browsershot\Browsershot;

class GenerateYearbook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'yearbook:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create PDF yearbook';

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
        $completed_pages = [];
        $rooms = StaffMember::get();
        foreach($rooms as $room){
            if(!in_array($room->teacher_room, $completed_pages)){
                $filename = str_slug($room->title.' '.$room->teacher_room);
                Browsershot::url('http://yearbook.apg/classroom/'.$room->teacher_room)
                    ->setOption('format', 'Letter')
                    ->margins(8, 8, 8, 8)
                    ->waitUntilNetworkIdle()
                    ->savePdf('storage/generated-yearbook/'.$filename.'.pdf');

                    $completed_pages[] = $room->teacher_room;
            }

        }

    }
}
