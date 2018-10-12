<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\InscriptionType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/security", name="security")
     */
    public function index()
    {
        return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }

    /**
     * @Route("/inscription", name="security_inscription")
     */
    public function inscription(Request $request,ObjectManager $manager,UserPasswordEncoderInterface $encoder)
    {
        $user = new Utilisateur();

        $form   =  $this->createForm(InscriptionType::class,$user);
        $form->handleRequest($request);

        if($form->isSubmitted() &&  $form->isValid()){
            //Encodage du Mot de passe dans la base
            $hash   =   $encoder->encodePassword($user,$user->getPassword());
            $user->setPassword($hash);


            $manager->persist($user);
            $manager->flush();

            return  $this->redirectToRoute('security_connexion');
        }

        return  $this->render('security/inscription.html.twig',[
            'form'  =>  $form->createView()

            ]);
    }

    /**
     * @Route("/connexion", name="security_connexion")
     */
    public function connexion(){
        return  $this->render('security/connexion.html.twig');
    }

    /**
     * @Route("/deconnexion", name="security_deconnexion")
     */
    public function deconnexion(){

    }
}
