
cd `dirname $0`
echo -e "User-agent: * \nDisallow: /wp-admin/ \nAllow: /wp-admin/admin-ajax.php\n\n" > robots.txt
PARENT_DIR=$(cd $(dirname $0)/..;pwd)
domain=${PARENT_DIR##*/}
str="${str}Sitemap: https://${domain}/sitemap.xml\n"
for filename in `find antena_* -maxdepth 0 -type d`

do
cd $filename
nohup /usr/bin/php7.1 artisan schedule:run &
filepublic=${filename:7}
str="${str}Sitemap: https://${domain}/${filepublic}/sitemap.xml\n"
cd ..
mv $filename/update.sh update.sh
done

echo -e $str >> robots.txt

MSG=`sh update.sh`
echo $MSG