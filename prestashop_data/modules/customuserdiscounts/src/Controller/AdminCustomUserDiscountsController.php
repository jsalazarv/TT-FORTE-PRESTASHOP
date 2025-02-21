<?php

namespace PrestaShop\Module\CustomUserDiscounts\Controller;

use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use PrestaShop\Module\CustomUserDiscounts\Repository\CustomUserDiscountRepository;

class AdminCustomUserDiscountsController extends FrameworkBundleAdminController
{
    public function listAction(Request $request): Response
    {
        /** @var CustomUserDiscountRepository $repository */
        $repository = $this->get('prestashop.module.customuserdiscounts.repository.discount_repository');
        $discounts = $repository->findAll();

        // Transformar los datos para la vista
        $formattedDiscounts = array_map(function ($discount) {
            return [
                'id' => $discount['id_custom_user_discount'],
                'customerName' => $discount['customer_name'],
                'customerEmail' => $discount['customer_email'] ?? '',
                'discountType' => $discount['discount_type'] === 'percentage' ? 
                    $this->trans('Admin.Global', 'Percentage', []) : 
                    $this->trans('Admin.Global', 'Fixed Amount', []),
                'discountValue' => $discount['discount_value'],
                'dateAdd' => $discount['date_add']
            ];
        }, $discounts);

        return $this->render('@Modules/customuserdiscounts/views/templates/admin/list.html.twig', [
            'discounts' => $formattedDiscounts,
            'layoutTitle' => $this->trans('Modules.Customuserdiscounts.Admin', 'Custom User Discounts', []),
            'enableSidebar' => true,
            'help_link' => false
        ]);
    }

    public function editAction(Request $request, int $id): Response
    {
        // TODO: Implementar edición
        return new Response('Edit action not implemented yet');
    }

    public function deleteAction(Request $request, int $id): Response
    {
        // TODO: Implementar eliminación
        return new Response('Delete action not implemented yet');
    }
}
