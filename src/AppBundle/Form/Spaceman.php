<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of Spaceman
 *
 * @author Pavel
 */
class Spaceman extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {        
        $builder
            ->add('id', 'Symfony\Component\Form\Extension\Core\Type\HiddenType')
            ->add('firstName', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('label' => 'First name'))
            ->add('lastName', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('label' => 'Last name'))
            ->add('birthdate', 'Symfony\Component\Form\Extension\Core\Type\DateType', array('label' => 'Birthdate', 'widget' => 'single_text',))
            ->add('superPower', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('label' => 'Super power'))
            ->add('save', 'Symfony\Component\Form\Extension\Core\Type\SubmitType', array('label' => 'Save'));
    }
}
