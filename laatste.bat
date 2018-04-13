cd vendor
rmdir /s jeroennoten
cd ..
composer require jeroennoten/laravel-adminlte
git stash
git merge --abort
git checkout master
git pull
php artisan migrate:fresh --seed