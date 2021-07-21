<?php

namespace App\Repository;

use App\Entity\PresetDiligence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PresetDiligence|null find($id, $lockMode = null, $lockVersion = null)
 * @method PresetDiligence|null findOneBy(array $criteria, array $orderBy = null)
 * @method PresetDiligence[]    findAll()
 * @method PresetDiligence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PresetDiligenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PresetDiligence::class);
    }

    // /**
    //  * @return PresetDiligence[] Returns an array of PresetDiligence objects
    //  */
    
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->where('p.folderId = :folder.id')
            ->join('p.folder', '')
            ->setParameter('folder.id', $value)
            ->orderBy('p.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?PresetDiligence
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
