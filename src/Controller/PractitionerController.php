<?php

namespace App\Controller;

use App\Class\Search;
use App\Form\SearchType;
use App\Repository\UserRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PractitionerController extends AbstractController
{
    #[Route('/practitioner', name: 'app_practitioner')]
    public function index(UserRepository $userRepository, 
        PaginatorInterface $paginator, 
        Request $request): Response
    {
        $dataSearch = new Search;
        $form = $this->createForm(SearchType::class, $dataSearch);
        
        $form->handleRequest($request);
        $datas = $userRepository->findUserByRole("ROLE_DOCTOR", $request->query->getInt('page', 1), $dataSearch);
       
        return $this->render('practitioner/index.html.twig', [
            "practitioners" => $datas,
            "searchForm" => $form
        ]);
    }
}
