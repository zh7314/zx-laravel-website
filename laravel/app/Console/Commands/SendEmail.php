<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Web\MessageService;

class SendEmail extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SendEmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'SendEmail';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     *
     * 注意
     *
     */
    public function handle() {
        MessageService::sendEmail();
    }

}
