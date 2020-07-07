<?php

namespace App\Controller;
//tu inclus Etudiant
use App\Entity\Etudiant;
use App\Repository\EtudiantRepository;
use App\Form\EtudiantType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    /**
     * @Route("/etudiant", name="etudiant")
     */
    public function index()
    {
        return $this->render('etudiant/index.html.twig', [
            'controller_name' => 'EtudiantController',
        ]);
    }

    /**
     * @Route("/", name="etudiant_read")
    */
    public function read()
    {
        return $this->render('etudiant/read.html.twig');
    }

     /**
     * @Route("/etudiant/create", name="etudiant_create")
     */
    public function create(Request $request):Response
    {
        $etudiant = new Etudiant();
        $form = $this->createForm(EtudiantType::class,$etudiant);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($etudiant);
            $em->flush();
        }
        return $this->render('etudiant/create.html.twig', [
            'form'=> $form->createView()
       ]);
    }
}
