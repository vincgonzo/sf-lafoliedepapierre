<?php

namespace LFDPP\AdminBundle\Controller\Admin;

use LFDPP\AdminBundle\Entity\Lang;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Lang controller.
 *
 * @Route("admin/lang")
 */
class LangController extends Controller
{
    /**
     * Lists all lang entities.
     *
     * @Route("/", name="admin_form_lang")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $langs = $em->getRepository('AdminBundle:Lang')->findAll();

        return $this->render('AdminBundle:Admin\Entity\Lang:index.html.twig', array(
            'langs' => $langs,
        ));
    }

    /**
     * Creates a new lang entity.
     *
     * @Route("/add", name="admin_form_lang_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $lang = new Lang();
        $form = $this->createForm('LFDPP\AdminBundle\Form\LangType', $lang);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lang);
            $em->flush();

            return $this->redirectToRoute('admin_form_lang_show', array('id' => $lang->getId()));
        }

        return $this->render('AdminBundle:Admin\Entity\Lang:new.html.twig', array(
            'lang' => $lang,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a lang entity.
     *
     * @Route("/{id}", name="admin_form_lang_show")
     * @Method("GET")
     */
    public function showAction(Lang $lang)
    {
        $deleteForm = $this->createDeleteForm($lang);

        return $this->render('AdminBundle:Admin\Entity\Lang:show.html.twig', array(
            'lang' => $lang,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing lang entity.
     *
     * @Route("/{id}/edit", name="admin_form_lang_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Lang $lang)
    {
        $deleteForm = $this->createDeleteForm($lang);
        $editForm = $this->createForm('LFDPP\AdminBundle\Form\LangType', $lang);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_form_lang_edit', array('id' => $lang->getId()));
        }

        return $this->render('AdminBundle:Admin\Entity\Lang:edit.html.twig', array(
            'lang' => $lang,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a lang entity.
     *
     * @Route("/{id}/delete/", name="admin_form_lang_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Lang $lang)
    {
        $form = $this->createDeleteForm($lang);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lang);
            $em->flush();
        }

        return $this->redirectToRoute('admin_form_lang');
    }

    /**
     * Creates a form to delete a lang entity.
     *
     * @param Lang $lang The lang entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Lang $lang)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_form_lang_delete', array('id' => $lang->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
