<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class TechCareAssessment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tech-care-assessment:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize Backend App';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Installing...TechCare Assignemnt..');
        Artisan::call('jwt:secret');
        Artisan::call('migrate');
        Artisan::call('db:seed', ['--class' => 'UserTableSeeder']);
        Artisan::call('db:seed', ['--class' => 'FollowTableSeeder']);
        Artisan::call('db:seed', ['--class' => 'PostTableSeeder']);
        Artisan::call('db:seed', ['--class' => 'ReactionTableSeeder']);
        $this->newLine();
        $this->info('demo user : ');
        $this->table(['email', 'password'], [['kutsnalmas@gmail.com', 'abcd1234']]);
        $this->info('--ইনস্টল হয়ে গেছে--');
    }
}
