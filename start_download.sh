datefolder=$(date +%Y-%m-%d__%H%M)
echo $datefolder
mkdir $datefolder
cp download.sh $datefolder
cd $datefolder
./download.sh
