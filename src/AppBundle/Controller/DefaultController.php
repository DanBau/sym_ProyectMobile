<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Producto;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
      $products = $this->getDoctrine()
        ->getRepository(Producto::class)
        ->findAllActive();

      return $this->render('default/index.html.twig', array(
        'products' => $products,
      ));
    }
}
