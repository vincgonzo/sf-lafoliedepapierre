<?php

namespace LFDPP\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontController extends Controller
{
  public function index()
  {
    return  $this->render('@Admin/Front/content.html.twig');
  }
}