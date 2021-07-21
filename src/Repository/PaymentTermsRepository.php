<?php

namespace App\Repository;

use App\Entity\PaymentTerms;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PaymentTerms|null find($id, $lockMode = null, $lockVersion = null)
 * @method PaymentTerms|null findOneBy(array $criteria, array $orderBy = null)
 * @method PaymentTerms[]    findAll()
 * @method PaymentTerms[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaymentTermsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PaymentTerms::class);
    }

    // /**
    //  * @return PaymentTerms[] Returns an array of PaymentTerms objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PaymentTerms
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
