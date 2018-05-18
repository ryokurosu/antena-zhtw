
cd `dirname $0`
for filename in `find antena_* -maxdepth 0 -type d`

do
cd $filename
echo $filename
git stash
git pull git://github.com/ryokurosu/antena.git
git submodule update -f
git stash clear
php artisan config:clear 
composer update
PATH=${filename:7}
cd ..
cd $PATH
echo $PATH
git init
git remote rm origin
git remote add origin git://github.com/ryokurosu/public.git
git fetch origin
git reset --hard origin/master
cd ..
done
