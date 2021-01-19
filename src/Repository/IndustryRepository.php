<?php

namespace App\Repository;

use App\Entity\Industry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Industry|null find($id, $lockMode = null, $lockVersion = null)
 * @method Industry|null findOneBy(array $criteria, array $orderBy = null)
 * @method Industry[]    findAll()
 * @method Industry[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IndustryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Industry::class);
    }

    // /**
    //  * @return Industry[] Returns an array of Industry objects
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
    public function findOneBySomeField($value): ?Industry
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
        $sql = 'SELECT * FROM industry';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
		
       
    }
  
}
