<?php

namespace LFDPP\AdminBundle\Controller\Admin;

use LFDPP\AdminBundle\Entity\Messages;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Message controller.
 *
 * @Route("admin/messages")
 */
class MessagesController extends Controller
{
    /**
     * Creates a new message entity.
     *
     * @Route("/add", name="admin_form_messages_add")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $message = new Messages();
        $form = $this->createForm('LFDPP\AdminBundle\Form\MessagesType', $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush();

            return $this->redirectToRoute('admin_form_messages_show', array('id' => $message->getId()));
        }

        return $this->render('AdminBundle:Admin\Entity\Messages:new.html.twig', array(
            'message' => $message,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a message entity.
     *
     * @Route("/{id}", name="admin_form_messages_show")
     * @Method("GET")
     */
    public function showAction(Messages $message)
    {
        $deleteForm = $this->createDeleteForm($message);

        return $this->render('AdminBundle:Admin\Entity\Messages:show.html.twig', array(
            'message' => $message,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing message entity.
     *
     * @Route("/{id}/edit", name="admin_form_messages_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Messages $message)
    {
        $deleteForm = $this->createDeleteForm($message);
        $editForm = $this->createForm('LFDPP\AdminBundle\Form\MessagesType', $message);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_form_messages_edit', array('id' => $message->getId()));
        }

        return $this->render('AdminBundle:Admin\Entity\Messages:edit.html.twig', array(
            'message' => $message,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a message entity.
     *
     * @Route("/{id}/delete/", name="admin_form_messages_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Messages $message)
    {
        $form = $this->createDeleteForm($message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($message);
            $em->flush();
        }

        return $this->redirectToRoute('admin_form_messages');
    }

    /**
     * Creates a form to delete a message entity.
     *
     * @param Messages $message The message entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Messages $message)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_form_messages_delete', array('id' => $message->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    /**
     * Lists all message entities.
     *
     * @Route("/", name="admin_form_messages")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $messages = $em->getRepository('AdminBundle:Messages')->findAll();

        return $this->render('AdminBundle:Admin\Entity\Messages:index.html.twig', array(
            'messages' => $messages,
        ));
    }
}
