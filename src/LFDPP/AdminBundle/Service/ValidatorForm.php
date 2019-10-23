<?php

namespace LFDPP\AdminBundle\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Form\FormExtensionInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class ValidatorForm
{
    public function formValidate(
        Request $request, 
        FormInterface $form 
    )
    {
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
    
            if ($form->isValid()) {
                return true;
            }
        }
    }
}
