<?php

namespace LFDPP\AdminBundle\Controller\Admin;

use LFDPP\AdminBundle\Entity\Price;
use LFDPP\AdminBundle\Entity\PriceType as LFDPPPriceType;
use LFDPP\AdminBundle\Form\PriceType;
use LFDPP\AdminBundle\Form\PriceTypeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @Route("/admin/price")
 */
class PriceController extends Controller
{
    /**
     * @Route("/add", name="admin_form_price_add")
     */
    public function addAction(Request $request)
    {
        $Price = new Price();

        $form = $this->get('form.factory')->create(PriceType::class, $Price);

        if ($request->isMethod('POST')) {
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Price);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Price bien enregistrée.');

            return $this->redirectToRoute('admin_form_price_show', array('id' => $Price->getId()));
        }
        }

        return $this->render('AdminBundle:Admin\Forms\Price:form.html.twig', array(
            "form" => $form->createView() 
        ));
    }

    /**
     * @Route("/{id}", name="admin_form_price_show", requirements={"id" = "\d+"})
     */
    public function viewAction($id)
    {
        $Price = $this->getDoctrine()->getRepository("AdminBundle:Price")->find($id);

        return $this->render('AdminBundle:Admin\Entity\Price:view.html.twig', array(
            'price' => $Price
        ));
    } 

    
    /**
     * @Route("/{id}/edit/", name="admin_form_price_edit", requirements={"id" = "\d+"})
     */
    public function editAction($id, Request $request)
    {
        $Price = $this->getDoctrine()->getRepository("AdminBundle:Price")->find($id);

        $form = $this->get('form.factory')->createBuilder(PriceType::class, $Price)
        ->add('type',      PriceTypeType::class)
        ->add('value',     IntegerType::class)
        ->add('save',      SubmitType::class)
        ->getForm()
        ;
        //$form = $this->createForm(PriceType::class, $Price);
        //dump($form);die();

        if ($request->isMethod('POST')) {
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Price);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Price bien mis à jour.');

            return $this->redirectToRoute('admin_form_price_show', array('id' => $Price->getId()));
        }
        }

        return $this->render('AdminBundle:Admin\Forms\Price:form.html.twig', array(
            "form" => $form->createView() 
        ));
    } 

    /**
     * @Route("/{id}/delete/", name="admin_form_price_delete", requirements={"id" = "\d+"})
     */
    public function deleteAction($id, Request $request)
    {
        $Price = $this->getDoctrine()->getRepository("AdminBundle:Price")->find($id);
        $_em = $this->getDoctrine()->getManager();
        $_em->remove($Price);
        $_em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Price deleted.');

        return $this->redirectToRoute('admin_form_price');
    } 
    
    /**
     * @Route("/", name="admin_form_price")
     */
    public function homeAction()
    {
        $prices = $this->getDoctrine()->getRepository("AdminBundle:Price")->findAll();

        return $this->render('AdminBundle:Admin\Entity\Price:index.html.twig', array(
            'prices' => $prices
        ));
    } 
}
