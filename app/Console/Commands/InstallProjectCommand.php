<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallProjectCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install project';

    /**
     * Create a new command instance.
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
        $this->call('migrate:fresh', ['--force'=>true]);
        $this->call('module:seed', ['module' => 'Sapiens', '--force'=>true]);
        $this->call('sync:epigrians');
        $this->call('sync:sb');
        $this->call('storage:link');
        $this->call('passport:install');
    }
}
