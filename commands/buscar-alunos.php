<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$dql = "SELECT aluno FROM Alura\\Doctrine\\Entity\\Aluno aluno WHERE aluno.id = 1 OR aluno.nome = 'Nico Steppat' ORDER BY aluno.nome";
$query = $entityManager->createQuery($dql);
$alunoList = $query->getResult();

foreach ($alunoList as $aluno) {
    $telefones = $aluno
        ->getTelefones()
        ->map(function (Telefone $telefone) {
            return $telefone->getNumero();
        })
        ->toArray();
    echo "ID: {$aluno->getId()}\nNome: {$aluno->getNome()}\n";
    echo "Telefones: " . implode(', ', $telefones);

    echo "\n\n";
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
