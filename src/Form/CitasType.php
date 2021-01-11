<?php

namespace App\Form;

use App\Controller\CitasController;
use App\Controller\EmpresaController;
use App\Entity\Citas;
use App\Entity\Empresa;
use App\Repository\CitasRepository;
use App\Repository\EmpresaRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class CitasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           ->add('empresa', CheckboxType::class, [
               'attr'    => BuscarTodasLasEmpresa(),
               'required' => false,
           ])
            ->add('fecha')
            ->add('hora')
            ->add('Guardar',SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Citas::class,
        ]);
    }
}
