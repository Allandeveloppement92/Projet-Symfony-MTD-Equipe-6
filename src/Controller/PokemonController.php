<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Form\PokemonType;
use App\Repository\PokemonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class PokemonController extends AbstractController
{
    /**
     * @Route("/", name="pokemon_index", methods={"GET"})
     */
    public function index(PokemonRepository $pokemonRepository): Response
    {
        return $this->render('pokemon/index.html.twig', [
            'pokemon' => $pokemonRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="pokemon_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $pokemon = new Pokemon();
        $form = $this->createForm(PokemonType::class, $pokemon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($pokemon);
            $entityManager->flush();

            return $this->redirectToRoute('pokemon_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pokemon/new.html.twig', [
            'pokemon' => $pokemon,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="pokemon_show", methods={"GET"})
     */
    public function show(Pokemon $pokemon): Response
    {
        return $this->render('pokemon/show.html.twig', [
            'pokemon' => $pokemon,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pokemon_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Pokemon $pokemon, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PokemonType::class, $pokemon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('pokemon_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pokemon/edit.html.twig', [
            'pokemon' => $pokemon,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="pokemon_delete", methods={"POST"})
     */
    public function delete(Request $request, Pokemon $pokemon, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pokemon->getId(), $request->request->get('_token'))) {
            $entityManager->remove($pokemon);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pokemon_index', [], Response::HTTP_SEE_OTHER);
    }
}
