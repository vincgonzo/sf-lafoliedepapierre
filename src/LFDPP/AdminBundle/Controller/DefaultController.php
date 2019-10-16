<?php

namespace LFDPP\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LFDPPAdminBundle:Default:index.html.twig');
    }
}
