<?php

namespace App\Enums\db\hahaha;

// 此檔案由 db:hahaha_command_db_table_enum_generate 自動產生，請勿手動修改。
// 對應資料表：password_reset_tokens
enum password_reset_tokens: string
{
    case EMAIL = 'email';
    case TOKEN = 'token';
    case CREATED_AT = 'created_at';
}
