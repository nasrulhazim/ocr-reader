<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use TesseractOCR;

class OcrCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ocr:read {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Text Recognition from Images';

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
        $file = $this->argument('file');
        echo (new TesseractOCR($file))->run();
    }
}
