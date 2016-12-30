<?php

namespace App\Console\Commands;

use App\Code;
use Illuminate\Console\Command;

class AddCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:code';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Code To Database';

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
        $lines = file(storage_path('codes.txt'), FILE_IGNORE_NEW_LINES);


        foreach ($lines as $line) {
            $found = Code::where('code', $line)->count();
            if ($found == 0) {
                Code::create([
                    'code' =>  trim($line),
                    'is_give' => false
                ]);
            }
        }
    }
}
