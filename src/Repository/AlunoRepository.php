<?php

namespace Alura\Doctrine\Repository;

use Alura\Doctrine\Entity\Aluno;
use Doctrine\ORM\EntityRepository;

class AlunoRepository extends EntityRepository
{
    public function buscaCursosPorAluno()
    {
        $classeAluno = Aluno::class;
        $entityManager = $this->getEntityManager();
        $dql = "SELECT aluno, telefones, cursos FROM $classeAluno aluno JOIN aluno.telefones telefones JOIN aluno.cursos cursos";
        $query = $entityManager->createQuery($dql);

        return $query->getResult();
    }
}
