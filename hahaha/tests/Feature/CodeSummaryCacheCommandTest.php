<?php

namespace Tests\Feature;

use Tests\TestCase;

class CodeSummaryCacheCommandTest extends TestCase
{
    public function test_it_caches_a_code_summary_for_core_application_files(): void
    {
        $outputPath = storage_path('framework/testing/code-summary.md');

        if (file_exists($outputPath)) {
            unlink($outputPath);
        }

        $this->artisan('app:cache-code-summary', [
            '--output' => $outputPath,
        ])->assertExitCode(0);

        $this->assertFileExists($outputPath);

        $contents = file_get_contents($outputPath);

        $this->assertIsString($contents);
        $this->assertStringContainsString('# 程式碼摘要快照', $contents);
        $this->assertStringContainsString('## app/Models/User.php', $contents);
        $this->assertStringContainsString('定義資料結構與型別轉換規則的 Eloquent 模型。', $contents);
        $this->assertStringContainsString('## routes/console.php', $contents);
        $this->assertStringContainsString('註冊以 closure 定義的 Artisan 命令。', $contents);
        $this->assertStringContainsString('## routes/web.php', $contents);
        $this->assertStringContainsString('定義瀏覽器請求使用的 Web 路由。', $contents);
        $this->assertStringNotContainsString('vendor/', $contents);

        unlink($outputPath);
    }
}
