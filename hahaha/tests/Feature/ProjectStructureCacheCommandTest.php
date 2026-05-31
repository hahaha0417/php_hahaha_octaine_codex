<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProjectStructureCacheCommandTest extends TestCase
{
    public function test_it_caches_a_project_structure_snapshot_and_omits_runtime_noise(): void
    {
        $outputPath = storage_path('framework/testing/project-structure.md');

        if (file_exists($outputPath)) {
            unlink($outputPath);
        }

        $this->artisan('app:cache-project-structure', [
            '--output' => $outputPath,
        ])->assertExitCode(0);

        $this->assertFileExists($outputPath);

        $contents = file_get_contents($outputPath);

        $this->assertIsString($contents);
        $this->assertStringContainsString('# 專案結構快照', $contents);
        $this->assertStringContainsString('根目錄：`', $contents);
        $this->assertStringContainsString('|-- app/', $contents);
        $this->assertStringContainsString('|-- routes/', $contents);
        $this->assertStringContainsString('|-- tests/', $contents);
        $this->assertStringNotContainsString('vendor/', $contents);
        $this->assertStringNotContainsString('node_modules/', $contents);

        unlink($outputPath);
    }
}
