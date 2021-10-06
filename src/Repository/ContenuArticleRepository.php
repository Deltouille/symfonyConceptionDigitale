<?php

namespace App\Repository;

use App\Entity\ContenuArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContenuArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContenuArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContenuArticle[]    findAll()
 * @method ContenuArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContenuArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContenuArticle::class);
    }

    // /**
    //  * @return ContenuArticle[] Returns an array of ContenuArticle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ContenuArticle
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
