<?php

namespace App\Enums\db\hahaha;

// 此檔案由 db:hahaha_command_db_table_enum_generate 自動產生，請勿手動修改。
// 對應資料表：users
enum users: string
{
    case ID = 'id';
    case NAME = 'name';
    case EMAIL = 'email';
    case EMAIL_VERIFIED_AT = 'email_verified_at';
    case PASSWORD = 'password';
    case REMEMBER_TOKEN = 'remember_token';
    case CREATED_AT = 'created_at';
    case UPDATED_AT = 'updated_at';
}
