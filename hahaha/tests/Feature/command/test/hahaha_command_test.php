<?php

namespace Tests\Feature\command\test;

use App\Console\Commands\test\hahaha_command_test as HahahaCommandTest;
use Tests\TestCase;

class hahaha_command_test extends TestCase
{
    public function test_it_runs_the_naming_rule_command(): void
    {
        $this->artisan(HahahaCommandTest::class)
            ->expectsOutput('hahaha_command_test')
            ->assertSuccessful();
    }
}
