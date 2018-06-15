<?php

namespace App\Application\Common\PageBundle\Controller;

use App\Application\Common\PageBundle\Entity\Page;
use App\Application\Sonata\MediaBundle\Entity\Gallery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{

    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $pageArray = $this->getDoctrine()
            ->getRepository(Page::class)
            ->findPage($request->getLocale());

        $gallId = [0];

        if (isset($pageArray[0]['galleries'])) {
            foreach($pageArray[0]['galleries'] as $g) {
                $gallId[] = $g['id'];
            }
        }

        $em = $this->getDoctrine()->getManager();

        $qb = $em->createQueryBuilder('ghm');
        $qb->select('ghm')
            ->from('ApplicationSonataMediaBundle:GalleryHasMedia', 'ghm')
            ->where('ghm.gallery IN(:ids)')
            ->setParameter('ids', $gallId)
            ->orderBy('ghm.position', 'ASC');

        $gallery = $qb->getQuery()->getResult();

        return $this->render('ApplicationCommonPageBundle:Index:index.html.twig', [
            'page' => $pageArray,
            'gallery' => $gallery
        ]);
    }

    public function list(Request $request, $page)
    {
        $pageRepo = $this->getDoctrine()
            ->getRepository(Page::class)
            ->findPage($request->getLocale(), $page);

        return $this->render('ApplicationCommonPageBundle:Index:list.html.twig', [
            'page' => $pageRepo
        ]);
    }

}
