<?php

namespace App\Repository;

use App\Entity\Pokedex;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Pokedex|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pokedex|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pokedex[]    findAll()
 * @method Pokedex[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PokedexRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pokedex::class);
    }

    // /**
    //  * @return Pokedex[] Returns an array of Pokedex objects
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
    public function findOneBySomeField($value): ?Pokedex
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
