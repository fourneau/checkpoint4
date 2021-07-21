<?php

namespace App\Repository;

use App\Entity\SubFolder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SubFolder|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubFolder|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubFolder[]    findAll()
 * @method SubFolder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubFolderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubFolder::class);
    }

    // /**
    //  * @return SubFolder[] Returns an array of SubFolder objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SubFolder
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
