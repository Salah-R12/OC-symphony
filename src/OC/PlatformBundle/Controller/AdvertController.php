<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

// N'oubliez pas ce use :
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller
{
    public function indexAction()
    {

        $url = $this->get('router')->generate('oc_platform_home', array(),
            UrlGeneratorInterface::ABSOLUTE_URL);
        $content = $this->get('templating')->render('OCPlatformBundle:Advert:index.html.twig', array('nom' => 'winzou'));


        return new Response($content);
    }

    public function viewAction($id)
    {
        // $id vaut 5 si l'on a appelé l'URL /platform/advert/5

        // Ici, on récupèrera depuis la base de données
        // l'annonce correspondant à l'id $id.
        // Puis on passera l'annonce à la vue pour
        // qu'elle puisse l'afficher
        $content = $this->get('templating')->render('OCPlatformBundle:Advert:index.html.twig',
                array('nom' => 'winzou','id' => $id));
        return new Response($content);
    }

    public function viewSlugAction($slug, $year, $format)
    {
        $content = $this->get('templating')->render('OCPlatformBundle:Advert:index.html.twig',
            array('nom' => 'winzou','id' => $format,'slug' => $slug,'format'=>$format));
        return new Response($content);
    }
}