<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Application\Sonata\MediaBundle\Entity\GalleryHasMedia;

class GalleryHasMediaRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GalleryHasMedia::class);
    }

    /**
     * @param $gallery
     * @return GalleryHasMedia[]
     */
    public function findGalleries($gallIds): array
    {
        $qb = $this->createQueryBuilder('ghm');
        $qb->select('ghm', 'g', 'm');
        $qb->leftJoin('ghm.gallery', 'g');
        $qb->leftJoin('ghm.media', 'm')
            ->where('ghm.gallery IN(:ids)')
            ->andWhere('g.enabled = 1')
            ->andWhere('m.enabled = 1')
            ->setParameter('ids', $gallIds)
            ->orderBy('ghm.id', 'ASC');

        $query = $qb->getQuery();
        $result = $query->getResult();

        return $result;
    }

}
