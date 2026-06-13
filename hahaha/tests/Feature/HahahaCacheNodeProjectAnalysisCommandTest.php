<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\File;
use Tests\TestCase;

class HahahaCacheNodeProjectAnalysisCommandTest extends TestCase
{
    private string $output_dir_;

    private string $node_fixture_dir_;

    protected function setUp(): void
    {
        parent::setUp();

        $this->output_dir_ = storage_path('app/testing-ai-context/node-project-analysis');
        $this->node_fixture_dir_ = base_path('code/test/node_fixture/product');

        File::deleteDirectory($this->output_dir_);
        File::deleteDirectory(base_path('code/test/node_fixture'));
    }

    protected function tearDown(): void
    {
        File::deleteDirectory($this->output_dir_);
        File::deleteDirectory(base_path('code/test/node_fixture'));

        parent::tearDown();
    }

    public function test_it_generates_node_project_analysis_cache_files(): void
    {
        $this->node_fixture_create_();

        $this->artisan('app:hahaha-cache-node-project-analysis', [
            '--output-dir' => $this->output_dir_,
            '--with-tests' => true,
            '--force' => true,
        ])
            ->expectsOutputToContain('Node / Codex 專案分析快取已輸出')
            ->assertExitCode(0);

        $markdown_path_ = $this->output_dir_.DIRECTORY_SEPARATOR.'project-analysis.md';
        $json_path_ = $this->output_dir_.DIRECTORY_SEPARATOR.'project-analysis.json';
        $page_node_markdown_path_ = $this->output_dir_.DIRECTORY_SEPARATOR.'page-node-analysis.md';
        $page_node_json_path_ = $this->output_dir_.DIRECTORY_SEPARATOR.'page-node-analysis.json';
        $meta_path_ = $this->output_dir_.DIRECTORY_SEPARATOR.'.hahaha_cache_node_project_analysis.meta.json';

        $this->assertFileExists($markdown_path_);
        $this->assertFileExists($json_path_);
        $this->assertFileExists($page_node_markdown_path_);
        $this->assertFileExists($page_node_json_path_);
        $this->assertFileExists($meta_path_);

        $this->assertStringContainsString('# Node Project Analysis', File::get($markdown_path_));
        $this->assertStringContainsString('# Page Node Analysis', File::get($page_node_markdown_path_));

        $payload_ = json_decode(File::get($json_path_), true);
        $page_node_payload_ = json_decode(File::get($page_node_json_path_), true);

        $this->assertIsArray($payload_);
        $this->assertIsArray($page_node_payload_);
        $this->assertSame(base_path(), $payload_['project']['root'] ?? null);
        $this->assertIsInt($payload_['summary']['relevant_file_count'] ?? null);
        $this->assertArrayHasKey('routes', $payload_);
        $this->assertArrayHasKey('database', $payload_);
        $this->assertContains('code', $payload_['classmap']['roots'] ?? []);
        $this->assertGreaterThanOrEqual(1, $page_node_payload_['node_directory_count'] ?? 0);
        $this->assertContains('code/test/node_fixture/product', array_column($page_node_payload_['node_directories'] ?? [], 'path'));
        $fixture_node_directory_index_ = array_search('code/test/node_fixture/product', array_column($page_node_payload_['node_directories'] ?? [], 'path'), true);
        $fixture_node_directory_ = $page_node_payload_['node_directories'][$fixture_node_directory_index_] ?? [];
        $this->assertContains('code/test/node_fixture/product/hahaha_controller_product.php', $fixture_node_directory_['controllers'] ?? []);
        $this->assertContains('code/test/node_fixture/product/hahaha_view_product.blade.php', $fixture_node_directory_['views'] ?? []);
        $this->assertContains('code/test/node_fixture/product/hahaha_config_product.php', $fixture_node_directory_['configs'] ?? []);
        $this->assertContains('code/test/node_fixture/product/hahaha_test_product.php', $fixture_node_directory_['tests'] ?? []);
        $this->assertContains('code/test/node_fixture/product/hahaha_service_product.php', $fixture_node_directory_['others'] ?? []);
        $this->assertContains('code/test/node_fixture/product/hahaha_test_product.php', $payload_['tests']['items'] ?? []);
    }

    public function test_it_skips_rebuild_when_fingerprint_is_unchanged(): void
    {
        $this->node_fixture_create_();

        $this->artisan('app:hahaha-cache-node-project-analysis', [
            '--output-dir' => $this->output_dir_,
            '--force' => true,
        ])->assertExitCode(0);

        $this->artisan('app:hahaha-cache-node-project-analysis', [
            '--output-dir' => $this->output_dir_,
        ])
            ->expectsOutputToContain('程式碼未變更，略過重建')
            ->assertExitCode(0);
    }

    private function node_fixture_create_(): void
    {
        File::ensureDirectoryExists($this->node_fixture_dir_);

        File::put($this->node_fixture_dir_.DIRECTORY_SEPARATOR.'hahaha_controller_product.php', "<?php\n\nclass hahaha_controller_product {}\n");
        File::put($this->node_fixture_dir_.DIRECTORY_SEPARATOR.'hahaha_view_product.blade.php', "<div>product</div>\n");
        File::put($this->node_fixture_dir_.DIRECTORY_SEPARATOR.'hahaha_config_product.php', "<?php\n\nclass hahaha_config_product {}\n");
        File::put($this->node_fixture_dir_.DIRECTORY_SEPARATOR.'hahaha_test_product.php', "<?php\n\nclass hahaha_test_product {}\n");
        File::put($this->node_fixture_dir_.DIRECTORY_SEPARATOR.'hahaha_service_product.php', "<?php\n\nclass hahaha_service_product {}\n");
    }
}
