<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

$alunoList = $alunoRepository->findAll();

foreach ($alunoList as $aluno) {
    echo "ID: {$aluno->getId()}\nNome: {$aluno->getNome()}\n\n";
}

// $alunoComId2 = $alunoRepository->find(2);
// echo $alunoComId2->getNome();

// $felipe = $alunoRepository->findBy([
    // 'nome' => 'Felipe'
// ]);
// var_dump($felipe);

// $felipe = $alunoRepository->findOneBy([
    // 'nome' => 'Felipe'
// ]);
// var_dump($felipe);
