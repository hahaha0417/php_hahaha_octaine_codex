<?php

namespace App\Enums\db\hahaha;

// 此檔案由 db:hahaha_command_db_table_enum_generate 自動產生，請勿手動修改。
// 對應資料表：jobs
enum jobs: string
{
    case ID = 'id';
    case QUEUE = 'queue';
    case PAYLOAD = 'payload';
    case ATTEMPTS = 'attempts';
    case RESERVED_AT = 'reserved_at';
    case AVAILABLE_AT = 'available_at';
    case CREATED_AT = 'created_at';
}
