<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

// N'oubliez pas ce use :
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

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
        $url = $this->get('router')->generate('oc_platform_home');

        //return new RedirectResponse($url);
        //ou
        return $this->redirect($url);
    }

    public function viewSlugAction($slug, $year, $format)
    {
        $content = $this->get('templating')->render('OCPlatformBundle:Advert:index.html.twig',
            array('nom' => 'winzou','id' => $format,'slug' => $slug,'format'=>$format));
        return new Response($content);
    }
}