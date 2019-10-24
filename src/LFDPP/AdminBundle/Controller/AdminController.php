<?php

namespace LFDPP\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
   * @Route("/admin")
   */
class AdminController extends Controller
{
  /**
   * @Route("/", name="admin_dashboard")
   */
  public function index()
  {
    return  $this->render('@Admin/Admin/index.html.twig');
  }
}