<?php

namespace App\Application\Common\PageBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;


class ApplicationCommonPageBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'CommonPageBundle';
    }
}