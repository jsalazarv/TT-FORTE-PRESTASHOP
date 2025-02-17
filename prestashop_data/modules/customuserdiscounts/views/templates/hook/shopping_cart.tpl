{*
* 2025 Juan Salazar
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
*}

<div class="cart-detailed-totals">
    {if isset($custom_discount) && $custom_discount}
        <div class="cart-summary-line cart-total">
            <div class="alert alert-success text-center mb-2">
                {if $custom_discount.discount_type === 'percentage'}
                    ¡Se aplicó tu descuento personal del {$custom_discount.discount_value|floatval}%!
                {else}
                    ¡Se aplicó tu descuento personal de {$custom_discount.discount_value|string_format:"%.2f"}{$currency->sign}!
                {/if}
            </div>

            <div class="cart-summary-line">
                <span class="label">Precio regular:</span>
                <span class="value">{$original_price|string_format:"%.2f"}{$currency->sign}</span>
            </div>
            <div class="cart-summary-line text-success">
                <span class="label">Tu descuento:</span>
                <span class="value">-{$discount_amount|string_format:"%.2f"}{$currency->sign}</span>
            </div>
            <div class="cart-summary-line font-weight-bold">
                <span class="label">Tu precio final:</span>
                <span class="value text-success">{$final_price|string_format:"%.2f"}{$currency->sign}</span>
            </div>
        </div>

        <style>
        .cart-summary-line.cart-total {
            margin: 1rem 0;
            padding: 1rem;
            background: #f8f9fa;
            border: 1px solid #e7e7e7;
            border-radius: 4px;
        }

        .cart-summary-line .alert {
            padding: 0.5rem;
            margin-bottom: 1rem;
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
            font-weight: 600;
        }

        .cart-summary-line.text-success {
            color: #28a745;
        }

        .cart-summary-line.text-success .value {
            color: #28a745;
            font-weight: 500;
        }

        .cart-summary-line.font-weight-bold {
            border-top: 1px solid #e7e7e7;
            padding-top: 0.75rem;
            margin-top: 0.25rem;
        }

        .cart-summary-line.font-weight-bold .value {
            color: #28a745;
        }
        </style>
    {/if}
</div>
