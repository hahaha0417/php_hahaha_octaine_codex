<?php

namespace App\Enums\db\hahaha;

// 此檔案由 db:hahaha_command_db_table_enum_generate 自動產生，請勿手動修改。
// 對應資料表：failed_jobs
enum failed_jobs: string
{
    case ID = 'id';
    case UUID = 'uuid';
    case CONNECTION = 'connection';
    case QUEUE = 'queue';
    case PAYLOAD = 'payload';
    case EXCEPTION = 'exception';
    case FAILED_AT = 'failed_at';
}
