<?php

namespace App\Enums\db\hahaha;

// 此檔案由 db:hahaha_command_db_table_enum_generate 自動產生，請勿手動修改。
// 對應資料表：sessions
enum sessions: string
{
    case ID = 'id';
    case USER_ID = 'user_id';
    case IP_ADDRESS = 'ip_address';
    case USER_AGENT = 'user_agent';
    case PAYLOAD = 'payload';
    case LAST_ACTIVITY = 'last_activity';
}
