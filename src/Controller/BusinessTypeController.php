<?php

namespace App\Controller;

use App\Entity\BusinessType;
use App\Form\BusinessTypeType;
use App\Repository\BusinessTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/business/type")
 */
class BusinessTypeController extends AbstractController
{
    /**
     * @Route("/", name="business_type_index", methods={"GET"})
     */
    public function index(BusinessTypeRepository $businessTypeRepository): Response
    {
        return $this->render('business_type/index.html.twig', [
            'business_types' => $businessTypeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="business_type_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $businessType = new BusinessType();
        $form = $this->createForm(BusinessTypeType::class, $businessType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($businessType);
            $entityManager->flush();

            return $this->redirectToRoute('business_type_index');
        }

        return $this->render('business_type/new.html.twig', [
            'business_type' => $businessType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="business_type_show", methods={"GET"})
     */
    public function show(BusinessType $businessType): Response
    {
        return $this->render('business_type/show.html.twig', [
            'business_type' => $businessType,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="business_type_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BusinessType $businessType): Response
    {
        $form = $this->createForm(BusinessTypeType::class, $businessType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('business_type_index');
        }

        return $this->render('business_type/edit.html.twig', [
            'business_type' => $businessType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="business_type_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BusinessType $businessType): Response
    {
        if ($this->isCsrfTokenValid('delete'.$businessType->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($businessType);
            $entityManager->flush();
        }

        return $this->redirectToRoute('business_type_index');
    }
}
