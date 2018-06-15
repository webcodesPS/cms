<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Application\Common\PageBundle\Entity\Page;

class PageRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Page::class);
    }

    /**
     * @param $page
     * @return Page[]
     */
    public function findPage($locale, $page = 'index'): array
    {
        $qb = $this->createQueryBuilder('p');
        $qb->select('p', 't', 'g');
        $qb->where('p.slug = :slug')
            ->setParameter('slug', $page);
        $qb->leftJoin('p.translates', 't')
            ->andWhere('t.locale = :locale')
            ->setParameter('locale', $locale);
        $qb->leftJoin('p.galleries', 'g');

        $query = $qb->getQuery();
        $result = $query->getArrayResult();

        return $result;
    }

}
