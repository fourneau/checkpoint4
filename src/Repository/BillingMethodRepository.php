<?php

namespace App\Repository;

use App\Entity\BillingMethod;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BillingMethod|null find($id, $lockMode = null, $lockVersion = null)
 * @method BillingMethod|null findOneBy(array $criteria, array $orderBy = null)
 * @method BillingMethod[]    findAll()
 * @method BillingMethod[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BillingMethodRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BillingMethod::class);
    }

    // /**
    //  * @return BillingMethod[] Returns an array of BillingMethod objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BillingMethod
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
