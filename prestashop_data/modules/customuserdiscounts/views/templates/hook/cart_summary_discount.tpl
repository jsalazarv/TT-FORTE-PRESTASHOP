{if isset($custom_discount) && $custom_discount}
    <div class="cart-summary-line">
        <div class="alert alert-success text-center mb-2">
            {if $custom_discount.discount_type === 'percentage'}
                ¡Se aplicó tu descuento personal del {$custom_discount.discount_value|floatval}%!
            {else}
                ¡Se aplicó tu descuento personal de {$custom_discount.discount_value|string_format:"%.2f"}{$currency->sign}!
            {/if}
        </div>

        <div class="cart-summary-line">
            <span class="label">Subtotal:</span>
            <span class="value">{$original_price|string_format:"%.2f"}{$currency->sign}</span>
        </div>
        <div class="cart-summary-line text-success">
            <span class="label">Descuento personal:</span>
            <span class="value">-{$discount_amount|string_format:"%.2f"}{$currency->sign}</span>
        </div>
        <div class="cart-summary-line font-weight-bold">
            <span class="label">Total con descuento:</span>
            <span class="value text-success">{$final_price|string_format:"%.2f"}{$currency->sign}</span>
        </div>
    </div>

    <style>
    .cart-summary-line {
        padding: 1rem;
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
