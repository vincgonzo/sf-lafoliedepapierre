<?php

namespace LFDPP\AdminBundle\Controller\Admin\Forms;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepositoryInterface;
use LFDPP\AdminBundle\Entity\PriceType;
use LFDPP\AdminBundle\Form\PriceTypeType;
use LFDPP\AdminBundle\Repository\PriceTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/admin/price-type")
 */
class PriceTypeController extends Controller
{
    /**
     * @Route("/add", name="admin_form_price_type_add")
     */
    public function addAction(Request $request)
    {
        $priceType = new PriceType();

        $form = $this->get('form.factory')->createBuilder(FormType::class, $priceType)
        ->add('type',      TextType::class)
        ->add('days',     IntegerType::class)
        ->add('save',      SubmitType::class)
        ->getForm()
        ;

        if ($request->isMethod('POST')) {
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($priceType);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Price Type bien enregistrée.');

            return $this->redirectToRoute('admin_form_price_type_ind', array('id' => $priceType->getId()));
        }
        }

        return $this->render('AdminBundle:Admin\Forms\PriceType:form.html.twig', array(
            "form" => $form->createView() 
        ));
    }

    /**
     * @Route("/view/{id}", name="admin_form_price_type_ind", requirements={"id" = "\d+"})
     */
    public function viewAction($id)
    {
        $priceType = $this->getDoctrine()->getRepository("AdminBundle:PriceType")->find($id);

        return $this->render('AdminBundle:Admin\Entity\PriceType:view.html.twig', array(
            'price_type' => $priceType
        ));
    } 

    
    /**
     * @Route("/edit/{id}", name="admin_form_price_type_edit", requirements={"id" = "\d+"})
     */
    public function editAction($id, Request $request)
    {
        $priceType = $this->getDoctrine()->getRepository("AdminBundle:PriceType")->find($id);

        $form = $this->get('form.factory')->createBuilder(FormType::class, $priceType)
        ->add('type',      TextType::class)
        ->add('days',     IntegerType::class)
        ->add('save',      SubmitType::class)
        ->getForm()
        ;

        if ($request->isMethod('POST')) {
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($priceType);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Price Type bien mis à jour.');

            return $this->redirectToRoute('admin_form_price_type_ind', array('id' => $priceType->getId()));
        }
        }

        return $this->render('AdminBundle:Admin\Forms\PriceType:form.html.twig', array(
            "form" => $form->createView() 
        ));
    } 

    /**
     * @Route("/delete/{id}", name="admin_form_price_type_delete", requirements={"id" = "\d+"})
     */
    public function deleteAction($id, Request $request)
    {
        $priceType = $this->getDoctrine()->getRepository("AdminBundle:PriceType")->find($id);
        $_em = $this->getDoctrine()->getManager();
        $_em->remove($priceType);
        $_em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Price Type deleted.');

        return $this->redirectToRoute('admin_form_price_type');
    } 
    
    /**
     * @Route("/", name="admin_form_price_type")
     */
    public function homeAction()
    {
        $pricesType = $this->getDoctrine()->getRepository("AdminBundle:PriceType")->findAll();

        return $this->render('AdminBundle:Admin\Entity\PriceType:index.html.twig', array(
            'prices_type' => $pricesType
        ));
    } 
}
