<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use App\Application\Common\PageBundle\Entity\Menu;

class AppExtension extends AbstractExtension implements \Twig_Extension_InitRuntimeInterface
{

    /**
     * @var Doctrine
     */
    private $doctrine;

    /**
     *
     * @var \Twig_Environment
     */
    private $environment;

    function __construct(Doctrine $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function initRuntime(\Twig_Environment $environment)
    {
        $this->environment = $environment;
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('print_main_menu', [$this, 'displayMenu'], [
                'is_safe' => ['html']
            ]),
        ];
    }

    public function displayMenu()
    {
        $menuArray = $this->doctrine
            ->getRepository(Menu::class)
            ->findMenu('pl');

        return $this->environment->render('extensions/menu.html.twig', [
                'menu' => $menuArray
        ]);
    }

}
