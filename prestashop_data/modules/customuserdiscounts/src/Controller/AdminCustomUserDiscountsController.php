<?php

namespace PrestaShop\Module\CustomUserDiscounts\Controller;

use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
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
            $discountType = $discount['discount_type'];
            $discountValue = (float) $discount['discount_value'];

            return [
                'id' => $discount['id_custom_user_discount'],
                'customerName' => $discount['customer_name'],
                'customerEmail' => $discount['customer_email'] ?? '',
                'discountType' => $this->trans('Admin.Global', $discountType === 'percentage' ? 'Percentage' : 'Fixed Amount', []),
                'rawType' => $discountType, // Para el modal de edición
                'discountValue' => $discountValue,
                'formattedValue' => $discountType === 'percentage' ? 
                    number_format($discountValue, 2) . '%' : 
                    $this->get('prestashop.adapter.data_provider.currency')->getDefaultCurrencyIsoCode() . ' ' . number_format($discountValue, 2),
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

    public function editAction(Request $request, int $id): JsonResponse
    {
        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(['error' => 'Invalid request'], 400);
        }

        try {
            $data = json_decode($request->getContent(), true);
            if (!isset($data['discountType']) || !isset($data['discountValue'])) {
                throw new \Exception('Missing required fields');
            }

            /** @var CustomUserDiscountRepository $repository */
            $repository = $this->get('prestashop.module.customuserdiscounts.repository.discount_repository');
            
            $result = $repository->update(
                (int) $id,
                [
                    'discount_type' => $data['discountType'],
                    'discount_value' => (float) $data['discountValue']
                ]
            );

            if ($result) {
                return new JsonResponse(['success' => true]);
            }

            return new JsonResponse(['error' => 'Failed to update discount'], 500);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }

    public function deleteAction(Request $request, int $id): JsonResponse
    {
        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(['error' => 'Invalid request'], 400);
        }

        try {
            /** @var CustomUserDiscountRepository $repository */
            $repository = $this->get('prestashop.module.customuserdiscounts.repository.discount_repository');
            
            $result = $repository->delete((int) $id);

            if ($result) {
                return new JsonResponse(['success' => true]);
            }

            return new JsonResponse(['error' => 'Failed to delete discount'], 500);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }
}
