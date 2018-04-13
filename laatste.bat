cd vendor
rmdir /s /q jeroennoten
cd ..
composer require jeroennoten/laravel-adminlte
composer dump-autoload
git stash
git merge --abort
git checkout master
git pull
php artisan migrate:fresh --seed
pause