
## Maqola veb sayti

>Bu saytda 1 admin bor va cheksiz foydalanuvchi imkoniyati mavjud.Foydalanuvchilar ro'yxatdan o'tib keyin saytga kiraolishadi.maqola yaratilgandan keyin u maqola adminni profiliga boradi.Admin o'sha maqolani taadiqlamagunicha boshqa foydalanuvchi va saytda maqolalar bo'limida chiqmaydi.faqat admin maqolani + belgisi orqali tasdiqlasa xammaga ko'rinadi.Bu sayt yordamida siz o'zingizni maqolangizni yaratishingiz va  boshqa foydalanuvchlarga ulashishingiz mumkin.

## run qilish
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=article
DB_USERNAME=root
DB_PASSWORD=

php artisan migrate --seed
php artisan serve
npm run dev





