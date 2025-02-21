<?php

namespace PrestaShop\Module\CustomUserDiscounts\Form;

use PrestaShopBundle\Form\Admin\Type\TranslatorAwareType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Contracts\Translation\TranslatorInterface;

class DiscountType extends TranslatorAwareType
{
    private $translator;

    public function __construct(
        TranslatorInterface $translator,
        array $locales,
        string $defaultLocale
    ) {
        parent::__construct($translator, $locales, $defaultLocale);
        $this->translator = $translator;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id_discount', HiddenType::class)
            ->add('id_customer', ChoiceType::class, [
                'label' => $this->trans('Cliente', 'Modules.Customuserdiscounts.Admin'),
                'choices' => $options['customers'],
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => $this->trans('Por favor seleccione un cliente', 'Modules.Customuserdiscounts.Admin'),
                    ]),
                ],
            ])
            ->add('discount_type', ChoiceType::class, [
                'label' => $this->trans('Tipo de descuento', 'Modules.Customuserdiscounts.Admin'),
                'choices' => [
                    $this->trans('Porcentaje', 'Modules.Customuserdiscounts.Admin') => 'percentage',
                    $this->trans('Monto fijo', 'Modules.Customuserdiscounts.Admin') => 'amount',
                ],
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => $this->trans('Por favor seleccione un tipo de descuento', 'Modules.Customuserdiscounts.Admin'),
                    ]),
                ],
            ])
            ->add('discount_value', NumberType::class, [
                'label' => $this->trans('Valor del descuento', 'Modules.Customuserdiscounts.Admin'),
                'required' => true,
                'scale' => 2,
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => $this->trans('Por favor ingrese un valor', 'Modules.Customuserdiscounts.Admin'),
                    ]),
                    new Assert\Type([
                        'type' => 'numeric',
                        'message' => $this->trans('El valor debe ser numérico', 'Modules.Customuserdiscounts.Admin'),
                    ]),
                    new Assert\GreaterThan([
                        'value' => 0,
                        'message' => $this->trans('El valor debe ser mayor a 0', 'Modules.Customuserdiscounts.Admin'),
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'customers' => [],
        ]);
    }

    public function getBlockPrefix()
    {
        return 'customuserdiscounts_discount';
    }
}
