# .envの適用

export $(cat .env)

sed -i -e "s/\$_ENV\['DB_NAME'\]/'$(echo $DB_NAME)'/g" public_html/models/BaseModel.php
sed -i -e "s/\$_ENV\['DB_HOST'\]/'$(echo $DB_HOST)'/g" public_html/models/BaseModel.php
sed -i -e "s/\$_ENV\['DB_PORT'\]/'$(echo $DB_PORT)'/g" public_html/models/BaseModel.php
sed -i -e "s/\$_ENV\['DB_USER'\]/'$(echo $DB_USER)'/g" public_html/models/BaseModel.php
sed -i -e "s/\$_ENV\['DB_PASS'\]/'$(echo $DB_PASS)'/g" public_html/models/BaseModel.php

# パスの修正

sed -i -e "s/\.\.\/images/\.\/images/g" public_html/views/daymenu/index.tpl
sed -i -e "s/\.\.\/images/\.\/images/g" public_html/views/menu/index.tpl
