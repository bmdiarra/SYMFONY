<?php

namespace App\Controller;
//tu inclus Etudiant
use App\Entity\Etudiant;
use App\Repository\EtudiantRepository;
use App\Form\EtudiantType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
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

    /**
     * @Route("etudiant/ajax", name="etudiant_ajax")
     */
    public function ajax(Request $request)
    {
           
        if($request->isXMLHttpRequest()){
           
           
        //    dd($matricule);
        //    $nometu = $request->request-> get('etudiant[nom_etu]');
        //    $prenometu = $request->request-> get('etudiant[prenom_etu]');
        //    $emailetu = $request->request-> get('etudiant[email_etu]');
        //    $telephoneetu = $request->request-> get('etudiant[telephone_etu]');
        //    $typeetu = $request->request-> get('etudiant[type_etu]');
        //    $datenaissetu = $request->request-> get('etudiant[datenaiss_etu]');
        //    $typebourseetu = $request->request-> get('etudiant[type_bourse]');
        //    $logeretu = $request->request-> get('etudiant[loger]');

        //     $etd  = new Etudiant();
        //     $etd -> setMatriculeEtu($matricule);
        //     $etd -> setNomEtu($nometu);
            
        //     $etd -> setPrenomEtu($prenometu);
        //     $etd -> setEmailEtu($emailetu);
        //     $etd -> setTelephoneEtu($telephoneetu);
        //     $etd -> setTypeEtu($typeetu);
        //     $etd -> setDatenaissEtu($datenaissetu);
        //     $etd -> setTypeBourse($typebourseetu);
        //     $etd -> setLoger($logeretu);
        //avnt defaire quoi que ce soit tu teste si les valeurs sont la!
        $data = $request->request-> All();// tout ce qui est la est dans  $form ok jai pas vu les champs généré??
        $etudiant  = new Etudiant();
        $adresse = $request->request-> get('adresse_etu');
        
        $etudiant -> setAdresseEtu($adresse);
        $loger = $request->request-> get('loger');
        $etudiant -> setLoger($loger);
        $typebourse = $request->request-> get('type_bourse');
        $etudiant -> setTypebourse($typebourse);
        $form = $this->createForm(EtudiantType::class,$etudiant);
        $form->handleRequest($request);
        // if($form->isSubmitted() && $form->isValid())
        // {
            // cest pa entré ici
            //$adresse=$data['adresse_etu'];// tu dois recupéré par rapport a la valeur du profil
            $entityManager = $this ->getDoctrine()->getManager();
            $entityManager->persist($etudiant);
            $entityManager->flush();
                                    
            // return new JsonResponse([
            //     'msg' => 'sa rentre',
            // ]);
//test ok
      //  }
        //dd($form);
                        
 
            return new JsonResponse([
                'msg' => json_encode($data),
            ]);
        }
        return new Response('Erreur! ce n est pas une requete Ajax', 400);
    }


    /**
     * @Route("etudiant/delete", name="delete_etudiant")
     */
    public function delete_etudiant(Request $request)
    {
        if ($request->isXMLHttpRequest()) {         
            
            return new JsonResponse(array('message' => 'reussie'));
        }
        return new Response('Erreur! ce n est une requete Ajax', 400);
    }

}
