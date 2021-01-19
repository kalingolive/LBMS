<?php

namespace App\Controller;

use App\Entity\Members;
use App\Form\MembersType;
use App\Entity\Industries;
use App\Repository\MembersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/members")
 */
class MembersController extends AbstractController
{
    /**
     * @Route("/", name="members_index", methods={"GET"})
     */
    public function index(MembersRepository $membersRepository): Response
    {
        return $this->render('members/index.html.twig', [
            'members' => $membersRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{industry}/new", name="members_new", methods={"GET","POST"})
     */
    public function new($industry,Request $request): Response
    {
        $member = new Members();
		$industries = $this->getDoctrine()->getRepository(Industries::class)->find($industry);
        $form = $this->createForm(MembersType::class, $member);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($member->setIndustry($industries));
            $entityManager->flush();

             return $this->render('members/new.html.twig', [
            'industry' => $industry,
			 'member' => $member,
            'form' => $form->createView(),
			        ]);
        }

        return $this->render('members/new.html.twig', [
			'industry' => $industry,
            'member' => $member,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="members_show", methods={"GET"})
     */
    public function show(Members $member): Response
    {
        return $this->render('members/show.html.twig', [
            'member' => $member,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="members_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Members $member): Response
    {
        $form = $this->createForm(MembersType::class, $member);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('industries_show', [
            'id' =>  $member->getIndustry()->getId(),
        ]);
        }

        return $this->render('members/edit.html.twig', [
            'member' => $member,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="members_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Members $member): Response
    {
        if ($this->isCsrfTokenValid('delete'.$member->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($member);
            $entityManager->flush();
        }

        return $this->redirectToRoute('industries_show', [
            'id' =>  $member->getIndustry()->getId(),
        ]);
    }
}
