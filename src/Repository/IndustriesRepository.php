<?php

namespace App\Repository;

use App\Entity\Industries;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Industries|null find($id, $lockMode = null, $lockVersion = null)
 * @method Industries|null findOneBy(array $criteria, array $orderBy = null)
 * @method Industries[]    findAll()
 * @method Industries[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IndustriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Industries::class);
    }

    // /**
    //  * @return Industries[] Returns an array of Industries objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Industries
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
	
	  
    public function reports()
    { 
		$conn = $this->getEntityManager()->getConnection();
        $sql = 'SELECT * FROM report';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
		
       
    }
  
	
	
}
