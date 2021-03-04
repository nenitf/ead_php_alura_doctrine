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

        $connection = $this->conectaDeAcordoComENV();
        $connection['application_name'] = 'ead_php_alura_doctrine';

        return EntityManager::create($connection, $config);
    }

    private function conectaDeAcordoComENV(): array
    {
        try {
        [
            'driver' => $driver,
            'user' => $user,
            'password' => $password,
            'host' => $host,
            'dbname' => $dbname,
        ] = ENV;

        $drivers = [
            'psql' => 'pdo_pgsql'
        ];

        return [
            'driver' => $drivers[$driver],
            'user' => $user,
            'password' => $password,
            'host' => $host,
            // 'port' => '',
            'dbname' => $dbname,
            // 'charset' => '',
            // 'default_dbname' => '',
            // 'sslmode' => '',
            // 'sslrootcert' => '',
            // 'sslcert' => '',
            // 'sslkey' => '',
            // 'sslcrl' => '',
        ];
        } catch (\Throwable $t){
            throw new \Exception("Erro no parce de ENV");
        }
    }
}
