$version = 0.1

echo "+++ started building ++"
docker build . -t meal-manager:$version
echo "+++ finished building +++"
docker tag meal-manager:$version ghcr.io/worldofjoni/meal-manager:$version
docker tag meal-manager:$version ghcr.io/worldofjoni/meal-manager:latest 
echo "+++ pushing +++"
docker push ghcr.io/worldofjoni/meal-manager:$version
docker push ghcr.io/worldofjoni/meal-manager:latest
echo "+++ done +++"