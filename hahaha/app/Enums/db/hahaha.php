<?php

namespace App\Enums\db;

// 此檔案由 db:hahaha_command_db_table_enum_generate 自動產生，請勿手動修改。
enum hahaha: string
{
    case CACHE = 'cache';
    case CACHE_LOCKS = 'cache_locks';
    case FAILED_JOBS = 'failed_jobs';
    case JOB_BATCHES = 'job_batches';
    case JOBS = 'jobs';
    case MIGRATIONS = 'migrations';
    case PASSWORD_RESET_TOKENS = 'password_reset_tokens';
    case SESSIONS = 'sessions';
    case USERS = 'users';
}
