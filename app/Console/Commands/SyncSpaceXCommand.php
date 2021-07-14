<?php

namespace App\Console\Commands;

use Epigra\Capsule\Services\Capsule\CapsuleServiceInterface;
use Epigra\SpaceX\Services\SpaceX\SpaceXServiceInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SyncSpaceXCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'spacex:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected CapsuleServiceInterface $capsuleService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CapsuleServiceInterface $capsuleService)
    {
        parent::__construct();
        $this->capsuleService = $capsuleService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info("Sync process is started!");
        try {
            $capsules = $this->capsuleService->getAllCapsules();

            $this->capsuleService->syncCapsules($capsules);
            Log::info("Sync process is successfully completed!");
        } catch (\Throwable $th) {
            Log::warning("Sync is failed!");
            dd($th);
        }

        return 0;
    }
}
