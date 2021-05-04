<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Form\ArticlesFormType;
use App\Repository\ArticlesRepository;
use Exception;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiController extends AbstractController
{
    /**
     * @Route("/", name="api")
     */
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }
    /**
     * @Route("/doc", name="doc")
     */
    public function doc(): Response
    {
        return $this->render('api/doc.html.twig');
    }

    /**
     * @Route("/articles/all", name="all", methods={"GET"})
     */
    public function all(ArticlesRepository $articlesRepo)
    {
            // On récupère la liste des articles
            $articles = $articlesRepo->findAll();

            // On spécifie qu'on utilise l'encodeur JSON
            $encoders = [new JsonEncoder()];

            // On instancie le "normaliseur" pour convertir la collection en tableau
            $normalizers = [new ObjectNormalizer()];

            // On instancie le convertisseur
            $serializer = new Serializer($normalizers, $encoders);

            // On convertit en json
            $jsonContent = $serializer->serialize($articles, 'json', [
                'circular_reference_handler' => function ($object) {
                    return $object->getId();
                }
            ]);

            // On instancie la réponse
            $response = new Response($jsonContent);
            // On ajoute l'entête HTTP
            $response->headers->set('Content-Type', 'application/json');

            // On envoie la réponse
            return $response;
    }

    /**
     * @Route("/article/show/{id}", name="article", methods={"GET"})
     */
    public function getArticle(Articles $article)
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($article, 'json', [
            'circular_reference_handler' => function ($object) {
                return $object->getId();
            }
        ]);
        $response = new Response($jsonContent);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/article/add", name="ajout", methods={"POST"})
     */
    public function addArticle(Request $request)
    {
       try{

           // On instancie un nouvel article
           $article = new Articles();
   
           // On décode les données envoyées
           $donnees = json_decode($request->getContent());
   
           // On ajoute les infos à l'objet
           $article->setTitre($donnees->titre);
           $article->setDescription($donnees->description);
           $form = $this->createForm(ArticlesFormType::class, $article);
   
           // On sauvegarde en base
           $entityManager = $this->getDoctrine()->getManager();
           $entityManager->persist($article);
           $entityManager->flush();
   
           // On retourne la confirmation
           return new Response('ok', 201);
       
       
        }
        catch(Exception $e){
            return new Response($e, 500);
        }

       
        
       
    }

}
