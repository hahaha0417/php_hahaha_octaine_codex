<?php

namespace App\Enums\db\hahaha;

// 此檔案由 db:hahaha_command_db_table_enum_generate 自動產生，請勿手動修改。
// 對應資料表：cache_locks
enum cache_locks: string
{
    case KEY = 'key';
    case OWNER = 'owner';
    case EXPIRATION = 'expiration';
}
