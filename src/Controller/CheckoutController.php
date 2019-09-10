<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormBuilder;
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
    public function index( Request $request)
    {

        $form = $this->createForm(CheckoutType::class, [
            'action' => $this->generateUrl('add_to_cart')
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            //Actie wanneer form is submitted.

        }


        return $this->render('checkout/index.html.twig', [
            'checkout_form' => $form->createView()
        ]);
    }
}
