<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CompteRendu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Compterendu controller.
 *
 * @Route("compterendu")
 */
class CompteRenduController extends Controller
{
    /**
     * Lists all compteRendu entities.
     *
     * @Route("/", name="compterendu_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $compteRendus = $em->getRepository('AppBundle:CompteRendu')->findAll();

        return $this->render('compterendu/index.html.twig', array(
            'compteRendus' => $compteRendus,
        ));
    }

    /**
     * Creates a new compteRendu entity.
     *
     * @Route("/new", name="compterendu_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $compteRendu = new Compterendu();
        $form = $this->createForm('AppBundle\Form\CompteRenduType', $compteRendu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($compteRendu);
            $em->flush();

            return $this->redirectToRoute('compterendu_show', array('id' => $compteRendu->getId()));
        }

        return $this->render('compterendu/new.html.twig', array(
            'compteRendu' => $compteRendu,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a compteRendu entity.
     *
     * @Route("/{id}", name="compterendu_show")
     * @Method("GET")
     */
    public function showAction(CompteRendu $compteRendu)
    {
        $deleteForm = $this->createDeleteForm($compteRendu);

        return $this->render('compterendu/show.html.twig', array(
            'compteRendu' => $compteRendu,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing compteRendu entity.
     *
     * @Route("/{id}/edit", name="compterendu_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CompteRendu $compteRendu)
    {
        $deleteForm = $this->createDeleteForm($compteRendu);
        $editForm = $this->createForm('AppBundle\Form\CompteRenduType', $compteRendu);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('compterendu_edit', array('id' => $compteRendu->getId()));
        }

        return $this->render('compterendu/edit.html.twig', array(
            'compteRendu' => $compteRendu,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a compteRendu entity.
     *
     * @Route("/{id}", name="compterendu_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CompteRendu $compteRendu)
    {
        $form = $this->createDeleteForm($compteRendu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($compteRendu);
            $em->flush();
        }

        return $this->redirectToRoute('compterendu_index');
    }

    /**
     * Creates a form to delete a compteRendu entity.
     *
     * @param CompteRendu $compteRendu The compteRendu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CompteRendu $compteRendu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('compterendu_delete', array('id' => $compteRendu->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
