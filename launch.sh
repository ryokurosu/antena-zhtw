echo "プロジェクト名を記入"
read PROJECTNAME
git clone git://github.com/ryokurosu/public.git $PROJECTNAME
git clone git://github.com/ryokurosu/antena.git antena_$PROJECTNAME
cd $PROJECTNAME
mv index.php.template index.php
sed -i -e "s/..\/vendor/..\/antena_$PROJECTNAME\/vendor/g" ./index.php
sed -i -e "s/..\/bootstrap/..\/antena_$PROJECTNAME\/bootstrap/g" ./index.php
cd ..
cd antena_$PROJECTNAME
composer update
mv .env.example .env
echo "ドメインを入力"
read DOMAIN
echo "データベースホストを入力 例)mysql1234.xserver.jp"
read DATABASE_HOST
echo "データベースプレフィックスを入力 例)tyui"
read DATABASE_PREFIX
echo "サイト名を入力"
read SITENAME
sed -i -e "s/DOMAIN/$DOMAIN/g" ./.env
sed -i -e "s/DATABASE_HOST/$DATABASE_HOST/g" ./.env
sed -i -e "s/DATABASE_PREFIX/$DATABASE_PREFIX/g" ./.env
sed -i -e "s/SITENAME/$SITENAME/g" ./.env
sed -i -e "s/PROJECTNAME/$PROJECTNAME/g" ./.env
php artisan key:generate
php artisan migrate
php artisan get:start
echo "ワードを設定してください。"
read WORD
php artisan add:word $WORD true
nohup php artisan add:article &
cd -
mv antena_$PROJECTNAME/schedule.sh schedule.sh
