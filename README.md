# News
A small web application for viewing and editing of news.

-------------------------------------------------------

Приложение написано на Yii 1.
Протестировано на Ubuntu 14 Server.

Настройка виртуального хоста Apache2:

# yii_test можно заменить на любое другое имя папки
<VirtualHost *:80>
    ServerName yii_test
    DocumentRoot /var/www/yii_test/news
    <Directory /var/www/yii_test/news>
        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost>

Инструкция по созданию базы данных MySQL, 
скрипты для создания таблиц и загрузки минимального количества 
тестовых данных находятся в каталоге "sql" проекта.

------------------------------------------------------

Установка приложения:

cd /var/www
git clone git://github.com/beresnev/News.git yii_test
chmod -R 777 /var/www/yii_test/news/assets
chmod -R 777 /var/www/yii_test/news/protected/runtime

Если сервер в локальной сети, а не на хостинге, то в файл hosts того компьютера, 
с которого будем заходить на сервер нужно добавить строку:

#это пример, нужно написать адрес своего сервера и свое имя виртуального хоста
192.168.0.6   yii_test

------------------------------------------------------

смотрим
http://yii_test
