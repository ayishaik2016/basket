# basket

echo "# basket" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/ayishaik2016/basket.git
git push -u origin main

## 🧩 Features
- Red widget discount: Buy one get second half price
- Delivery rules

## 💻 How to run
```bash
docker-compose build
docker-compose run --rm app composer install
docker-compose run --rm app ./vendor/bin/phpunit
