<?php

namespace App\Application\Common\PageBundle\Controller;

use App\Application\Common\PageBundle\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{

    public function index(Request $request)
    {

//        return new Response(
//            '<html><body>page index: </body></html>'
//        );

        echo $locale = $request->getLocale();

        return $this->render('ApplicationCommonPageBundle:Index:index.html.twig', []);
    }

    public function list(Request $request, $page)
    {
        $em = $this->getDoctrine()->getManager();

        $pageRepo = $em->getRepository('ApplicationCommonPageBundle:Page')->findOneBy(['slug' => $page]);

        echo $locale = $request->getLocale();

        return $this->render('ApplicationCommonPageBundle:Index:list.html.twig', [
            'page' => $pageRepo
        ]);
    }

}