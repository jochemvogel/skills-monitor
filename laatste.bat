git stash
git merge --abort
git checkout master
git pull
php artisan migrate:fresh --seed
pause