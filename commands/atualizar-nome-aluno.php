<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$alunoRepository = $entityManager->getRepository(Aluno::class);

// php commands\atualizar-nome-aluno.php 1 "João Silva"
$id = $argv[1];
$novoNome = $argv[2];

$aluno = $alunoRepository->find($id);
$aluno->setNome($novoNome);

$entityManager->flush();

