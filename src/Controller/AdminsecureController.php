<?php

namespace App\Controller;

use App\Entity\Adminsecure;
use App\Form\AdminsecureType;
use App\Repository\AdminsecureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/adminsecure")
 */
class AdminsecureController extends AbstractController
{
    /**
     * @Route("/userIndex", name="user_index", methods={"GET"})
     */
    public function index(AdminsecureRepository $adminsecureRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('adminsecure/index.html.twig', [
            'adminsecures' => $adminsecureRepository->findAll(),
        ]);
    }

    /**
     * @Route("/newUser", name="user_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $adminsecure = new Adminsecure();
        $form = $this->createForm(AdminsecureType::class, $adminsecure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($adminsecure);
            $entityManager->flush();

            return $this->redirectToRoute('adminsecure_index');
        }

        return $this->render('adminsecure/new.html.twig', [
            'adminsecure' => $adminsecure,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_show", methods={"GET"})
     */
    public function show(Adminsecure $adminsecure): Response
    {
        return $this->render('adminsecure/show.html.twig', [
            'adminsecure' => $adminsecure,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Adminsecure $adminsecure): Response
    {
        $form = $this->createForm(AdminsecureType::class, $adminsecure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adminsecure_index');
        }

        return $this->render('adminsecure/edit.html.twig', [
            'adminsecure' => $adminsecure,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Adminsecure $adminsecure): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adminsecure->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($adminsecure);
            $entityManager->flush();
        }

        return $this->redirectToRoute('adminsecure_index');
    }
}
