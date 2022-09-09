<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Users;
use App\Form\UsersType;
use App\Repository\UsersRepository;

/**
 * @Route("/admins")
 */
class AdminsController extends AbstractController
{
    /**
     * @Route("/", name="admins")
     */
    public function index(): Response
    {
        if(! $this->isGranted('ROLE_ADMIN')){
            $this->redirectToRoute('app_home');
        };

        return $this->render('admins/index.html.twig', [
            'controller_name' => 'AdminsController',
        ]);
    }

    /**
     * @Route("/users", name="admins_users", methods={"GET"})
     */
    public function findUsers(UsersRepository $usersRepository): Response
    {
        return $this->render('admins/users/index.html.twig', [
            'users' => $usersRepository->findAll(),
        ]);
    }

    /**
     * @Route("/user/new", name="admins_user_new", methods={"GET", "POST"})
     */
    public function new(Request $request, UsersRepository $usersRepository): Response
    {
        $user = new Users();
        $form = $this->createForm(UsersType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $usersRepository->add($user, true);

            return $this->redirectToRoute('admins_users', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admins/users/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/user/edit/{id}", name="admins_user_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Users $user, UsersRepository $usersRepository): Response
    {
        $form = $this->createForm(UsersType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $usersRepository->add($user, true);

            return $this->redirectToRoute('admins_users', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admins/users/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }
}
