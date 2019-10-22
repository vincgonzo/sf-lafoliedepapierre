<?php

namespace LFDPP\AdminBundle\Controller\Admin;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepositoryInterface;
use LFDPP\AdminBundle\Entity\MessageType;
use LFDPP\AdminBundle\Form\MessageTypeType;
use LFDPP\AdminBundle\Repository\messageTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/admin/message-type")
 */
class MessageTypeController extends Controller
{
    /**
     * @Route("/add", name="admin_form_message_type_add")
     */
    public function addAction(Request $request)
    {
        $messageType = new messageType();

        $form = $this->get('form.factory')->create(MessageTypeType::class, $messageType);

        if ($request->isMethod('POST')) {
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($messageType);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Price Type bien enregistrée.');

            return $this->redirectToRoute('admin_form_message_type_ind', array('id' => $messageType->getId()));
        }
        }

        return $this->render('AdminBundle:Admin\Forms\MessageType:form.html.twig', array(
            "form" => $form->createView() 
        ));
    }

    /**
     * @Route("/view/{id}", name="admin_form_message_type_ind", requirements={"id" = "\d+"})
     */
    public function viewAction($id)
    {
        $messageType = $this->getDoctrine()->getRepository("AdminBundle:MessageType")->find($id);

        return $this->render('AdminBundle:Admin\Entity\MessageType:view.html.twig', array(
            'message_type' => $messageType
        ));
    } 

    
    /**
     * @Route("/edit/{id}", name="admin_form_message_type_edit", requirements={"id" = "\d+"})
     */
    public function editAction($id, Request $request)
    {
        $messageType = $this->getDoctrine()->getRepository("AdminBundle:MessageType")->find($id);

        $form = $this->createForm(MessageTypeType::class, $messageType);

        if ($request->isMethod('POST')) {
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($messageType);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Price Type bien mis à jour.');

            return $this->redirectToRoute('admin_form_message_type_ind', array('id' => $messageType->getId()));
        }
        }

        return $this->render('AdminBundle:Admin\Forms\MessageType:form.html.twig', array(
            "form" => $form->createView() 
        ));
    } 

    /**
     * @Route("/delete/{id}", name="admin_form_message_type_delete", requirements={"id" = "\d+"})
     */
    public function deleteAction($id, Request $request)
    {
        $messageType = $this->getDoctrine()->getRepository("AdminBundle:MessageType")->find($id);
        $_em = $this->getDoctrine()->getManager();
        $_em->remove($messageType);
        $_em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Price Type deleted.');

        return $this->redirectToRoute('admin_form_message_type');
    } 
    
    /**
     * @Route("/", name="admin_form_message_type")
     */
    public function homeAction()
    {
        $messagesType = $this->getDoctrine()->getRepository("AdminBundle:MessageType")->findAll();

        return $this->render('AdminBundle:Admin\Entity\messageType:index.html.twig', array(
            'messages_type' => $messagesType
        ));
    } 
}
