<?php

namespace App\Console\Commands;


use App\Models\DoctorPatient;
use Carbon\Carbon;
use Illuminate\Console\Command;

class FinishDoctorConsultCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'finish:doctor-consult';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check if the doctors consultation time has passed, then delete';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle(DoctorPatient $doctorPatient)
    {
        $doctorPatient::query()
            ->where('end_time', '<=',Carbon::now())
            ->delete();
    }
}
