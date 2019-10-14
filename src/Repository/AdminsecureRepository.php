<?php

namespace App\Repository;

use App\Entity\Adminsecure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Adminsecure|null find($id, $lockMode = null, $lockVersion = null)
 * @method Adminsecure|null findOneBy(array $criteria, array $orderBy = null)
 * @method Adminsecure[]    findAll()
 * @method Adminsecure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdminsecureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Adminsecure::class);
    }

    // /**
    //  * @return Adminsecure[] Returns an array of Adminsecure objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Adminsecure
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
