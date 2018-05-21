cd `dirname $0`
for filename in `find antena_* -maxdepth 0 -type d`

do
cd $filename
echo $filename
~/opt/bin/git init
~/opt/bin/git remote rm origin
~/opt/bin/git remote add origin git://github.com/ryokurosu/antena-zhtw.git
~/opt/bin/git fetch origin
~/opt/bin/git reset --hard origin/master
~/opt/bin/git submodule init
~/opt/bin/git submodule sync
~/opt/bin/git submodule foreach "(git checkout master; git pull)"
php artisan config:clear 
filepublic=${filename:7}
cd -
mv $filename/schedule.sh schedule.sh
mv $filename/update.sh update.sh
cd $filepublic
echo $filepublic
~/opt/bin/git init
~/opt/bin/git remote rm origin
~/opt/bin/git remote add origin git://github.com/ryokurosu/public.git
~/opt/bin/git fetch origin
~/opt/bin/git reset --hard origin/master
mv index.php.template index.php
sed -i -e "s/\.\.\/vendor\/autoload.php/\.\.\/antena_$filepublic\/vendor\/autoload.php/g" ./index.php
sed -i -e "s/\.\.\/bootstrap\/app.php/\.\.\/antena_$filepublic\/bootstrap\/app.php/g" ./index.php
cd -
done



