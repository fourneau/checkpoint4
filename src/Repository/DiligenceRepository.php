<?php

namespace App\Repository;

use App\Entity\Diligence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Diligence|null find($id, $lockMode = null, $lockVersion = null)
 * @method Diligence|null findOneBy(array $criteria, array $orderBy = null)
 * @method Diligence[]    findAll()
 * @method Diligence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiligenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Diligence::class);
    }

    // /**
    //  * @return Diligence[] Returns an array of Diligence objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Diligence
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
