<?php

namespace App\Controller;


use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Form\CheckoutType;

class CheckoutController extends AbstractController

{

    /**
     * @Route("/checkout", name="checkout")
     */
    public function index()
    {

        $form = $this->createForm(CheckoutType::class);

        return $this->render('checkout/index.html.twig', [
            'form' => $form->createView()
        ]);

    }
}