<?php

namespace App\Repository;

use App\Entity\UploadBackground;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UploadBackground|null find($id, $lockMode = null, $lockVersion = null)
 * @method UploadBackground|null findOneBy(array $criteria, array $orderBy = null)
 * @method UploadBackground[]    findAll()
 * @method UploadBackground[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UploadBackgroundRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UploadBackground::class);
    }

    // /**
    //  * @return UploadBackground[] Returns an array of UploadBackground objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UploadBackground
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
