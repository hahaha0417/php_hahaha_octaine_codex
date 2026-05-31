<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Filesystem\Filesystem;
use Tests\TestCase;

class AiContextCacheCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_caches_multiple_ai_context_files_for_codex_and_copilot(): void
    {
        $outputDir = storage_path('framework/testing/ai-context-'.uniqid());
        $filesystem = app(Filesystem::class);

        try {
            $this->artisan('app:cache-ai-context', [
                '--output-dir' => $outputDir,
            ])->assertExitCode(0);

            $expectedFiles = [
                'routes.md' => [
                    '# 路由快取',
                    'URI：/',
                ],
                'database-schema.md' => [
                    '# 資料庫結構快取',
                    'users',
                    'email',
                ],
                'config.md' => [
                    '# 設定快取',
                    'config/app.php',
                    'debug',
                ],
                'packages.md' => [
                    '# 套件快取',
                    'laravel/framework',
                    'tailwindcss',
                ],
                'tests.md' => [
                    '# 測試映射快取',
                    'tests/Feature/ExampleTest.php',
                ],
                'recent-changes.md' => [
                    '# 最近變更快取',
                    '依檔案修改時間推定最近變更',
                ],
                'ownership-map.md' => [
                    '# 責任地圖快取',
                    '推定的責任分區',
                ],
                'php-symbols.md' => [
                    '# PHP 符號索引',
                    'namespace App\\Console\\Commands',
                ],
            ];

            foreach ($expectedFiles as $filename => $expectedFragments) {
                $path = $outputDir.DIRECTORY_SEPARATOR.$filename;

                $this->assertFileExists($path);

                $contents = file_get_contents($path);
                $this->assertIsString($contents);

                foreach ($expectedFragments as $fragment) {
                    $this->assertStringContainsString($fragment, $contents);
                }
            }
        } finally {
            $filesystem->deleteDirectory($outputDir);
        }
    }
}
