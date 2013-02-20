<?php

namespace GarbledTutors\RadiusIntegrationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GarbledTutors\RadiusIntegrationBundle\Entity\Radcheck;
use GarbledTutors\RadiusIntegrationBundle\Form\RadcheckType;

/**
 * Radcheck controller.
 *
 */
class RadcheckController extends Controller
{
    /**
     * Lists all Radcheck entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RadiusIntegrationBundle:Radcheck')->findAll();

        return $this->render('RadiusIntegrationBundle:Radcheck:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Radcheck entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RadiusIntegrationBundle:Radcheck')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Radcheck entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('RadiusIntegrationBundle:Radcheck:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Radcheck entity.
     *
     */
    public function newAction()
    {
        $entity = new Radcheck();
        $form   = $this->createForm(new RadcheckType(), $entity);

        return $this->render('RadiusIntegrationBundle:Radcheck:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Radcheck entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Radcheck();
        $form = $this->createForm(new RadcheckType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('radcheck_show', array('id' => $entity->getId())));
        }

        return $this->render('RadiusIntegrationBundle:Radcheck:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Radcheck entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RadiusIntegrationBundle:Radcheck')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Radcheck entity.');
        }

        $editForm = $this->createForm(new RadcheckType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('RadiusIntegrationBundle:Radcheck:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Radcheck entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RadiusIntegrationBundle:Radcheck')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Radcheck entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new RadcheckType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('radcheck_edit', array('id' => $id)));
        }

        return $this->render('RadiusIntegrationBundle:Radcheck:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Radcheck entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RadiusIntegrationBundle:Radcheck')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Radcheck entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('radcheck'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
