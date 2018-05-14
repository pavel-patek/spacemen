<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Spaceman;

/**
 * Description of SpacemenController
 *
 * @author Pavel
 */
class SpacemanController extends Controller
{
    public function OverviewAction()
    {
        $repository = $this->getDoctrine()->getRepository(Spaceman::class);
        $spacemen = $repository->findAll();

        return $this->render(
                'spaceman/overview.html.twig',
                array(
                    'page_h1'   => 'Spaceman Overview',
                    'spacemen'  => $spacemen,
                )
        );
    }

    public function AddAction(Request $request)
    {
        $spaceman = new Spaceman();

        $form = $this->createForm(\AppBundle\Form\Spaceman::class, $spaceman);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $spaceman = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($spaceman);
            $entityManager->flush();

            $this->addFlash('success', 'New spaceman added.');
            return $this->redirectToRoute('spaceman_overview');
        }

        return $this->render('spaceman/edit.html.twig', array(
            'page_h1'   => 'Add new spaceman',
            'form'      => $form->createView(),
        ));
    }

    public function EditAction($id, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Spaceman::class);
        $spaceman = $repository->find($id);

        $form = $this->createForm(\AppBundle\Form\Spaceman::class, $spaceman);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $spaceman = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($spaceman);
            $entityManager->flush();

            $this->addFlash('success', 'Spaceman edited.');
            return $this->redirectToRoute('spaceman_edit', array('id' => $spaceman->getId()));
        }

        return $this->render('spaceman/edit.html.twig', array(
            'page_h1'   => 'Edit spaceman ' . $spaceman->getId(),
            'form'      => $form->createView(),
        ));
    }

    public function DeleteAction($id)
    {
        $repository = $this->getDoctrine()->getRepository(Spaceman::class);
        $spaceman = $repository->find($id);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($spaceman);
        $entityManager->flush();

        $this->addFlash('success', 'Spaceman deleted.');
        
        return $this->redirectToRoute('spaceman_overview');
    }
}
