<?php

use Spryker\Shared\Mail\MailConstants;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\EventJournal\EventJournalConstants;

$config[ApplicationConstants::ZED_DB_USERNAME] = 'development';
$config[ApplicationConstants::ZED_DB_PASSWORD] = 'mate20mg';
$config[ApplicationConstants::ZED_DB_DATABASE] = 'DE_development_zed';
$config[ApplicationConstants::ZED_DB_HOST] = '127.0.0.1';
$config[ApplicationConstants::ZED_DB_PORT] = 5432;

$dsn = sprintf('%s:host=%s;port=%d;dbname=%s',
    $config[ApplicationConstants::ZED_DB_ENGINE],
    $config[ApplicationConstants::ZED_DB_HOST],
    $config[ApplicationConstants::ZED_DB_PORT],
    $config[ApplicationConstants::ZED_DB_DATABASE]
);

$config[ApplicationConstants::PROPEL] = array_merge($config[ApplicationConstants::PROPEL], [
    'database' => [
        'connections' => [
            'default_pgsql' => [
                'adapter' => $config[ApplicationConstants::ZED_DB_ENGINE],
                'dsn' => $dsn, //'pgsql:host=127.0.0.1;dbname=DE_development_zed',
                'user' => $config[ApplicationConstants::ZED_DB_USERNAME],
                'password' => $config[ApplicationConstants::ZED_DB_PASSWORD],
                'settings' => [],
            ],
            'default_mysql' => [
                'adapter' => $config[ApplicationConstants::ZED_DB_ENGINE],
                'dsn' => $dsn, //'mysql:host=127.0.0.1;dbname=DE_development_zed',
                'user' => $config[ApplicationConstants::ZED_DB_USERNAME],
                'password' => $config[ApplicationConstants::ZED_DB_PASSWORD],
                'settings' => [
                    'charset' => 'utf8',
                    'queries' => [
                        'utf8' => 'SET NAMES utf8 COLLATE utf8_unicode_ci, COLLATION_CONNECTION = utf8_unicode_ci, COLLATION_DATABASE = utf8_unicode_ci, COLLATION_SERVER = utf8_unicode_ci',
                    ],
                ],
            ],
        ],
    ],
]);

$config[ApplicationConstants::PROPEL]['database']['connections']['default'] =
    $config[ApplicationConstants::PROPEL]['database']['connections']['default_' . $config[ApplicationConstants::ZED_DB_ENGINE]];

$config[ApplicationConstants::ELASTICA_PARAMETER__INDEX_NAME] = 'de_development_catalog';
$config[ApplicationConstants::ELASTICA_PARAMETER__DOCUMENT_TYPE] = 'page';

$config[ApplicationConstants::ELASTICA_PARAMETER__PORT] = '10005';

$yvesHost = 'www.de.spryker.dev';
$config[ApplicationConstants::YVES_SESSION_COOKIE_DOMAIN] = $yvesHost;
$config[ApplicationConstants::HOST_YVES] = 'http://' . $yvesHost;
$config[ApplicationConstants::HOST_STATIC_ASSETS] = $config[ApplicationConstants::HOST_STATIC_MEDIA] = $yvesHost;
$config[ApplicationConstants::YVES_COOKIE_DOMAIN] = $yvesHost;

$config[ApplicationConstants::HOST_SSL_YVES] = 'https://' . $yvesHost;
$config[ApplicationConstants::HOST_SSL_STATIC_ASSETS] = $config[ApplicationConstants::HOST_SSL_STATIC_MEDIA] = $yvesHost;

$zedHost = 'zed.de.spryker.dev';
$config[ApplicationConstants::HOST_ZED_GUI]
    = 'http://' . $zedHost;
$config[ApplicationConstants::HOST_ZED_API] = $zedHost;
$config[ApplicationConstants::HOST_SSL_ZED_GUI]
    = $config[ApplicationConstants::HOST_SSL_ZED_API]
    = 'https://' . $zedHost;

$config[ApplicationConstants::CLOUD_CDN_STATIC_MEDIA_HTTP] = 'http://static.de.spryker.dev';
$config[ApplicationConstants::CLOUD_CDN_STATIC_MEDIA_HTTPS] = 'https://static.de.spryker.dev';

$config[ApplicationConstants::JENKINS_BASE_URL] = 'http://localhost:10007/';
$config[MailConstants::MAILCATCHER_GUI] = 'http://' . $config[ApplicationConstants::HOST_ZED_GUI] . ':1080';

/* RabbitMQ */
$config[ApplicationConstants::ZED_RABBITMQ_HOST] = 'localhost';
$config[ApplicationConstants::ZED_RABBITMQ_PORT] = '5672';
$config[ApplicationConstants::ZED_RABBITMQ_USERNAME] = 'DE_development';
$config[ApplicationConstants::ZED_RABBITMQ_PASSWORD] = 'mate20mg';
$config[ApplicationConstants::ZED_RABBITMQ_VHOST] = '/DE_development_zed';

$config[EventJournalConstants::WRITER_OPTIONS] = [
    '\\Spryker\\Shared\\EventJournal\\Model\\Writer\\File' => ['log_path' => APPLICATION_ROOT_DIR . '/data/DE/logs/'],
];
