<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request, PostRepository $postRepository): Response
    {
        $offset = max(0, $request->query->getInt('offset', 0));
        $paginator = $postRepository->getPostPaginator($offset);

        return $this->render('blog/index.html.twig', [
            'posts' => $paginator,
            'previous' => $offset - PostRepository::POST_LIMIT,
            'next' => min(count($paginator), $offset + PostRepository::POST_LIMIT)
        ]);
    }
}
