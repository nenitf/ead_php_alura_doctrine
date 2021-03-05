<?php
// php commands\criar-aluno.php "Vinicius Dias" "(24) 99999 - 9999" "(24) 2222-2222"
// php commands\criar-aluno.php "Nico Steppat" "(21) 99999 - 9999"

use Alura\Doctrine\Entity\{Aluno, Telefone};
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$aluno = new Aluno();
$aluno->setNome($argv[1]);

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

for ($i = 2; $i < $argc; $i++) {
    $numeroTelefone = $argv[$i];
    $telefone = new Telefone();
    $telefone->setNumero($numeroTelefone);

    $entityManager->persist($telefone);

    $aluno->addTelefone($telefone);

}



$entityManager->persist($aluno);

$entityManager->flush();
