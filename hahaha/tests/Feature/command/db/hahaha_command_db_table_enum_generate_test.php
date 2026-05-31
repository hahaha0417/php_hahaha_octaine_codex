<?php

namespace Tests\Feature\command\db;

use App\Console\Commands\db\hahaha_command_db_table_enum_generate as HahahaCommandDbTableEnumGenerate;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class hahaha_command_db_table_enum_generate_test extends TestCase
{
    public function test_it_generates_db_table_enum_files(): void
    {
        $base_path_ = app_path('Enums/db');
        $identity_path_ = $base_path_.'/demo';

        File::deleteDirectory($base_path_);

        $this->artisan(HahahaCommandDbTableEnumGenerate::class, [
            '--connection' => 'sqlite',
            '--name' => 'demo',
        ])->assertSuccessful();

        $this->assertFileExists($base_path_.'/demo.php');
        $this->assertDirectoryExists($identity_path_);

        $db_tables_enum_content_ = File::get($base_path_.'/demo.php');

        $this->assertStringContainsString('enum demo: string', $db_tables_enum_content_);
        $this->assertStringContainsString('db:hahaha_command_db_table_enum_generate', $db_tables_enum_content_);

        File::deleteDirectory($base_path_);
    }
}
