<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormTestController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function action(): Response
    {
        $uniqueFieldKey = 1;
        return $this->render('form-test.html.twig', [
            'form1' => $this->getForm($uniqueFieldKey)->createView(),
            'form2' => $this->getForm($uniqueFieldKey)->createView(),
            'form3' => $this->getForm($uniqueFieldKey)->createView(),
            'form4' => $this->getForm($uniqueFieldKey)->createView(),
            'form5' => $this->getForm($uniqueFieldKey)->createView(),
            'form6' => $this->getForm($uniqueFieldKey)->createView(),
        ]);
    }

    protected function getForm(int &$uniqueFieldKey): FormInterface
    {
        $form = $this->createFormBuilder()
            ->add(
                $uniqueFieldKey++,
                ChoiceType::class,
                [
                    'choices' => ['choice must be black' => 'test'],
                    'label' => 'label must be red because of css class',
                    'label_attr' => ['class' => 'red'],
                    'multiple' => true,
                    'expanded' => true,
                ]
            )
//            ->add(
//                $uniqueFieldKey++,
//                ChoiceType::class,
//                [
//                    'choices' => ['choice must be black' => 'test'],
//                    'label' => 'label must be red because of css class',
//                    'label_attr' => ['class' => 'red'],
//                    'multiple' => true,
//                ]
//            )
//            ->add(
//                $uniqueFieldKey++,
//                ChoiceType::class,
//                [
//                    'choices' => ['choice must be black' => 'test'],
//                    'label' => 'label must be red because of css class',
//                    'label_attr' => ['class' => 'red'],
//                ]
//            )
            ->getForm()
        ;

        return $form;
    }
}
