<?php

namespace App\Controller;

use App\Application\Common\PageBundle\Entity\Page;
use App\Application\Sonata\MediaBundle\Entity\GalleryHasMedia;
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

        $galleryArray = $this->getDoctrine()
            ->getRepository(GalleryHasMedia::class)
            ->findGalleries($this->_getGalleriesId($pageArray));

        return $this->render('index/index.html.twig', [
            'page' => $pageArray,
            'gallery' => $galleryArray
        ]);
    }

    /**
     * @param Request $request
     * @param $page
     * @return Response
     */
    public function list(Request $request, $page)
    {
        $pageArray = $this->getDoctrine()
            ->getRepository(Page::class)
            ->findPage($request->getLocale(), $page);

        $galleryArray = $this->getDoctrine()
            ->getRepository(GalleryHasMedia::class)
            ->findGalleries($this->_getGalleriesId($pageArray));

        return $this->render('index/list.html.twig', [
            'page' => $pageArray,
            'gallery' => $galleryArray
        ]);
    }

    /**
     * @param Page $page
     * @return Galleries id
     */
    private function _getGalleriesId( array $pageArray): array
    {
        $gallIds = [0];

        if (isset($pageArray[0]['galleries'])) {
            foreach ($pageArray[0]['galleries'] as $g) {
                $gallIds[] = $g['id'];
            }
        }

        return $gallIds;
    }

}
