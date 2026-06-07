# php_hahaha_octane_codex
php hahaha octane codex 架構


方針(鎖)：
1. File Cache(Lock)
2. Php File(Cache By OpCache)
3. Db(少量用)
4. Redis(前面不能解再說)
5. 功能多時，通常不用Cache靠靜態File Cache在Cloudflare，所以覺得Redis用不太到
6. Data 塞Buffer，Queue不一定會很多筆，所以有非Redis不能解的再說

migrate
php artisan migrate \
    --database=mysql2 \
    --path=database/migrations/order


seeder
php artisan db:seed --database=mysql2 --class=SystemSeeder

db 
DB::connection("mariadb")

queue 
Job::dispatch()->queue("hahaha")

log 
Log::channel('log_error')

cache 
cache::store('db_ai')

command 
provider php artisan l_lib::xxx::hahaha

controller L_Lib

route 
分專案

view
View::addNamespace(
        'api',
        base_path('modules/api/views')
    );

library 
L_Lib

schedule
by_queue

namespace
L_Lib
class_map psr-4

test
php artisan test tests/Feature/User

all by artisan指定







