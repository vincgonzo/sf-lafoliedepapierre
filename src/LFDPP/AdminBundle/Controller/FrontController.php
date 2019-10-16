<?php

namespace LFDPP\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends Controller
{
  /**
   * @Route("/hello-world", name="hello-world")
   */
  public function index()
  {
    return  $this->render('@Admin/Front/content.html.twig');
  }
}