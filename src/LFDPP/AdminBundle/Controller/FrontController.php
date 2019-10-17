<?php

namespace LFDPP\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
   * @Route("/front")
   */
class FrontController extends Controller
{
  /**
   * @Route("/hello-world", name="hello_world")
   */
  public function index()
  {
    return  $this->render('@Admin/Front/content.html.twig');
  }

  /**
   * @Route("/page/{id}", name="page_request", requirements={"page"= "\d+"}, defaults={"page" = 1})
   */
  public function pageAction($id, Request $request)
  {
      $this->addFlash('notice', 'page not found !!!');
      return $this->redirectToRoute("hello_world");
  }
}