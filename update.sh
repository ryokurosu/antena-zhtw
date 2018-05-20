cd `dirname $0`
for filename in `find antena_* -maxdepth 0 -type d`

do
cd $filename
echo $filename
git init
git remote rm origin
git remote add origin git://github.com/ryokurosu/antena-zhtw.git
git fetch origin
git reset --hard origin/master
git submodule init
git submodule sync
git submodule foreach "(git checkout master; git pull)"
php artisan config:clear 
composer update
filepublic=${filename:7}
cd -
mv $filename/schedule.sh schedule.sh
mv $filename/update.sh update.sh
cd $filepublic
echo $filepublic
git init
git remote rm origin
git remote add origin git://github.com/ryokurosu/public.git
git fetch origin
git reset --hard origin/master
mv index.php.template index.php
sed -i -e "s/\.\.\/vendor\/autoload.php/\.\.\/antena_$filepublic\/vendor\/autoload.php/g" ./index.php
sed -i -e "s/\.\.\/bootstrap\/app.php/\.\.\/antena_$filepublic\/bootstrap\/app.php/g" ./index.php
cd -
done



