<?php

namespace AppBundle\Controller;

use AppBundle\Entity\StatusEvaluation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Statusevaluation controller.
 *
 * @Route("statusevaluation")
 */
class StatusEvaluationController extends Controller
{
    /**
     * Lists all statusEvaluation entities.
     *
     * @Route("/", name="statusevaluation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $statusEvaluations = $em->getRepository('AppBundle:StatusEvaluation')->findAll();

        return $this->render('statusevaluation/index.html.twig', array(
            'statusEvaluations' => $statusEvaluations,
        ));
    }

    /**
     * Creates a new statusEvaluation entity.
     *
     * @Route("/new", name="statusevaluation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $statusEvaluation = new Statusevaluation();
        $form = $this->createForm('AppBundle\Form\StatusEvaluationType', $statusEvaluation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($statusEvaluation);
            $em->flush();

            return $this->redirectToRoute('statusevaluation_show', array('id' => $statusEvaluation->getId()));
        }

        return $this->render('statusevaluation/new.html.twig', array(
            'statusEvaluation' => $statusEvaluation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a statusEvaluation entity.
     *
     * @Route("/{id}", name="statusevaluation_show")
     * @Method("GET")
     */
    public function showAction(StatusEvaluation $statusEvaluation)
    {
        $deleteForm = $this->createDeleteForm($statusEvaluation);

        return $this->render('statusevaluation/show.html.twig', array(
            'statusEvaluation' => $statusEvaluation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing statusEvaluation entity.
     *
     * @Route("/{id}/edit", name="statusevaluation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, StatusEvaluation $statusEvaluation)
    {
        $deleteForm = $this->createDeleteForm($statusEvaluation);
        $editForm = $this->createForm('AppBundle\Form\StatusEvaluationType', $statusEvaluation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('statusevaluation_edit', array('id' => $statusEvaluation->getId()));
        }

        return $this->render('statusevaluation/edit.html.twig', array(
            'statusEvaluation' => $statusEvaluation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a statusEvaluation entity.
     *
     * @Route("/{id}", name="statusevaluation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, StatusEvaluation $statusEvaluation)
    {
        $form = $this->createDeleteForm($statusEvaluation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($statusEvaluation);
            $em->flush();
        }

        return $this->redirectToRoute('statusevaluation_index');
    }

    /**
     * Creates a form to delete a statusEvaluation entity.
     *
     * @param StatusEvaluation $statusEvaluation The statusEvaluation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(StatusEvaluation $statusEvaluation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('statusevaluation_delete', array('id' => $statusEvaluation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
