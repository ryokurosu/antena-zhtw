read GOOGLETAG
for filename in `find antena_* -maxdepth 0 -type d`

do
cd $filename
sed -i -e "s/GA_TAG=.*/GA_TAG=$GOOGLETAG/" ./.env
cd ..
done



