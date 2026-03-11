<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\ErrorHandler\Exception\FlattenException;

final class ErrorController extends AbstractController
{
    #[Route('/error', name: 'app_error')]
    public function show(FlattenException $exception): Response
    {
        $message=$exception->getMessage(); 
 
        return $this->render('error/index.html.twig', ['message'=>$message]);
    }
}
