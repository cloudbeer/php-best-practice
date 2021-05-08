# FROM ccr.ccs.tencentyun.com/wellxie/php-runtime:1.0
FROM cloudbeer/php-runtime:1.0

RUN mkdir /app
WORKDIR /app

RUN echo '{\
    "require": {\
    "php": "^7.3|^8.0",\
    "laravel/lumen-framework": "^8.0"\
    }\
    }' > composer.json

RUN composer i

