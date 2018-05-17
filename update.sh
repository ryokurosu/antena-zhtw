
cd `dirname $0`
for filename in `find antena_* -maxdepth 0 -type d`

do
cd $filename
echo $filename
git stash
git pull git://github.com/ryokurosu/antena.git
git submodule update --init --recursive
git stash clear
php artisan config:clear 
composer update
cd ..
done
