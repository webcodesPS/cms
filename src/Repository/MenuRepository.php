<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Application\Common\PageBundle\Entity\Menu;

class MenuRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Menu::class);
    }

    /**
     * @param $locale
     * @return Menu[]
     */
    public function findMenu($locale): array
    {
        $qb = $this->createQueryBuilder('m')
            ->select('m', 't', 'p')
            ->leftJoin('m.page', 'p')
            ->leftJoin('m.translates', 't')
            ->andWhere('t.locale = :locale')
            ->setParameter('locale', $locale);

        $query = $qb->getQuery();
        $result = $query->getArrayResult();

        return $result;
    }

}
