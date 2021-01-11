<?php

namespace App\Repository;

use App\Entity\Trabaja;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Trabaja|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trabaja|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trabaja[]    findAll()
 * @method Trabaja[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrabajaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trabaja::class);
    }

    // /**
    //  * @return Trabaja[] Returns an array of Trabaja objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Trabaja
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
