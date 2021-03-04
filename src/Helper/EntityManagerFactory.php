<?php

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\{
    EntityManager,
    EntityManagerInterface,
    Tools\Setup,
};

class EntityManagerFactory
{
    /**
     * @return EntityManagerInterface
     * @throws \Doctrine\ORM\ORMException
     */
    public function getEntityManager(): EntityManagerInterface
    {
        $rootDir = __DIR__ . '/../..';
        $config = Setup::createAnnotationMetadataConfiguration(
            [$rootDir . '/src'],
            true
        );
        $connection = [
            'driver' => 'pdo_pgsql',
            'user' => 'postgres',
            'password' => '123456',
            'host' => 'localhost',
            // 'port' => '',
            'dbname' => 'ead_php_alura_doctrine',
            // 'charset' => '',
            // 'default_dbname' => '',
            // 'sslmode' => '',
            // 'sslrootcert' => '',
            // 'sslcert' => '',
            // 'sslkey' => '',
            // 'sslcrl' => '',
            'application_name' => 'ead_php_alura_doctrine',
        ];
        return EntityManager::create($connection, $config);
    }
}
