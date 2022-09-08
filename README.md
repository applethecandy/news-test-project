<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Тестовый проект "Новости"

ТЗ:

Необходимо с использованием Laravel или Yii 2 реализовать функционал, описанный ниже:

- Главная страница
- Раздел "Новости всех категорий". По умолчанию отображаются только несколько первых элементов, для того чтобы подгрузить больше необходимо нажать на кнопку "Показать еще".
- Раздел "Обсуждаемые темы". Показываются несколько тегов, новости которых имеют больше всего комментариев.
- Страница отдельной новости. Новость состоит из изображения, заголовка, описания. Каждая новость принадлежит категории. У каждой новости может быть несколько тегов и комментариев. 
- Раздел "Комментарии". Возможность добавления на странице новости комментария.
- Поиск по новостям. Ищем не только по заголовкам новостей, но и по наименованию категорий. Если слово встречается и у новости и у категории, показываем в выдаче результатов как ссылку на отдельную новость, так и ссылку на категорию.
- Административная панель (опционально)

### Сайт доступен по ссылке [news.projects.smolyakov.dev](https://news.projects.smolyakov.dev)

## Подробнее о сайте

Использовался Laravel 9, PHP 8.1.8, библиотеки Tailwind, FontAwesome, AlpineJS, TinyMCE, шрифт Poiret One.

Для создания авторизации использовался Laravel Breeze, за основу для фронтенда взят шаблон от [davidgrzyb](https://github.com/davidgrzyb/tailwind-blog-template).

База данных доступна в сидере проекта.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://sun9-83.userapi.com/impg/iO3PY_F66tDLVFUAfpp-WcKCskOJ7Xl7PsGEEA/9wBF91sOK7Y.jpg?size=1803x982&quality=96&sign=b229505b5b775a32dc6e4b2de2569938&type=album" alt="Site preview"></a></p>
