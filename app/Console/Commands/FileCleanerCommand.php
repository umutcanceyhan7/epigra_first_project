<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Str;

class FileCleanerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:broken-images {--type=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove non existent images and files';

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

        if ($this->option('type') != null ) {
            $this->line("Cleaning <info>" . ucfirst(Str::plural($this->option('type'))) . "</info>");
            switch ($this->option('type')) {
                case 'media':
                    $medias = Media::get();
                    foreach ($medias as $media) {
                        if (!file_exists($media->getPath())) {
                            $this->line("<info>{$media->name}</info> <comment>removed</comment>");
                            $media->delete();
                        }
                    }
                    break;
                
                case 'avatar':
                    $users = User::whereNotNull('avatar')->get();
                    foreach ($users as $user) {
                        if (!file_exists(public_path($user->getOriginal('avatar')))) {
                            $user->update([
                                'avatar' => null
                            ]);
                            $this->line("<info>{$user->fullname}</info>'s avatar <comment>removed</comment>");
                        }
                    }
    
                    break;
                default:
                    break;
            }
        }
        $this->line("Completed");
    }
}
