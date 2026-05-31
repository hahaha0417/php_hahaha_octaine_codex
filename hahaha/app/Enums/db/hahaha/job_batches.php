<?php

namespace App\Enums\db\hahaha;

// 此檔案由 db:hahaha_command_db_table_enum_generate 自動產生，請勿手動修改。
// 對應資料表：job_batches
enum job_batches: string
{
    case ID = 'id';
    case NAME = 'name';
    case TOTAL_JOBS = 'total_jobs';
    case PENDING_JOBS = 'pending_jobs';
    case FAILED_JOBS = 'failed_jobs';
    case FAILED_JOB_IDS = 'failed_job_ids';
    case OPTIONS = 'options';
    case CANCELLED_AT = 'cancelled_at';
    case CREATED_AT = 'created_at';
    case FINISHED_AT = 'finished_at';
}
