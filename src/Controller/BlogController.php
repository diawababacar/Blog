<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Commentaire;
use App\Form\ArticleType;
use App\Form\CommentaireType;
use App\Repository\ArticleRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(ArticleRepository $repo)
    {
        //$repo   =   $this->getDoctrine()->getRepository(Article::class);
        $articles   =   $repo->findAll();
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles'  =>  $articles
        ]);
    }

    /**
     * @Route("/home", name="home")
     */
    public function home()
    {
        return $this->render('blog/home.html.twig',[
            'title'=>'Bienvenue dans le monde Politique Senegal',
        ]);
    }

    /**
     * @Route("/blog/newArticle",name="newArticle")
     * @Route("/blog/{id}/edit",name="blog_edit")
     */

  public function form(Article $article = null,Request   $request,ObjectManager  $manager)
    {
        /**  dump($request);
        if ($request->request->count()  >   0){
            $article =  new Article();
            $article    ->setTitreArticle($request->request->get('titre'))
                        ->setContenuArticle($request->request->get('contenu'))
                        ->setImageArticle($request->request->get('image'))
                        ->setDatePubArticle(new \DateTime());
            $manager->persist($article);
            $manager->flush();

            return  $this->redirectToRoute('blog_show',['id'=>  $article->getId()]);


        }

         **/
        //$article    =   new Article();

        if(!$article){
            $article    =   new Article();
        }

        //$form   =   $this   ->createFormBuilder($article)
          //                  ->add('TitreArticle')
            //                ->add('ContenuArticle')
              //              ->add('ImageArticle')

                //            ->getForm();
        $form = $this->createForm(ArticleType::class,$article);

        $form->handleRequest($request);

        if ($form->isSubmitted()    &&  $form->isValid()){

            if(!$article->getId()){
                $article->setDatePubArticle(new \DateTime());
            }

            $manager->persist($article);
            $manager->flush();

            return  $this->redirectToRoute('blog_show',['id' => $article->getId()]);

        }



        return  $this->render('blog/createArticle.html.twig',[
            'formArticle'  =>  $form->createView(),
            'editMode'  => $article->getId() !==    null
        ]);
    }



    /**
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show(ArticleRepository  $repo,$id,Request $request,ObjectManager    $objectManager)
    {
        //$repo = $this->getDoctrine()->getRepository(Article::class);
        $article =  $repo->find($id);

        $comment    =   new Commentaire();
        $form   =   $this->createForm(CommentaireType::class,$comment);

        $form->handleRequest($request);

        if ($form->isSubmitted()    &&  $form->isValid()){
            $comment->setDatePubCommentaire(new \DateTime())
                    ->setArticleCommentaire($article);
            $objectManager->persist($comment);
            $objectManager->flush();

            return  $this->redirectToRoute('blog_show',['id' => $article->getId()]);
        }


        return $this->render('blog/show.html.twig',[
            'article'   =>  $article,
            'commentaireForm'   =>  $form->createView()
        ]);
    }

    /**
     * @Route("/", name="accueil")
     */
    public function accueil()
    {
        return $this->render('blog/accueil.html.twig');
    }



}
