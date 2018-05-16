
cd `dirname $0`
for filename in `find antena_* -maxdepth 0 -type d`

do
cd $filename
nohup /usr/bin/php7.1 artisan schedule:run &
cd ..
done

MSG=`sh update.sh`
echo $MSG