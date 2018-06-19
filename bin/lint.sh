if [ `which php-cs-fixer` ]; then
    php-cs-fixer fix public_html $*
else
    echo 'Command `php-cs-fixer` is not found.'
    echo 'Please install.'
    echo 'ref: https://github.com/FriendsOfPHP/PHP-CS-Fixer'
    echo '==========================='
    echo ' $ curl -L https://cs.sensiolabs.org/download/php-cs-fixer-v2.phar \'
    echo '   -o php-cs-fixer'
    echo ' $ sudo chmod a+x php-cs-fixer'
    echo ' $ sudo mv php-cs-fixer /usr/local/bin/php-cs-fixer'
    echo '==========================='
fi
