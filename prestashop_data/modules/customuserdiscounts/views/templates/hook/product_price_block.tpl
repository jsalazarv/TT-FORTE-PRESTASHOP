{if isset($custom_discount) && $custom_discount}
    <div class="custom-user-discount mt-2">
        <div class="alert alert-success text-center">
            {if $custom_discount.discount_type === 'percentage'}
                ¡Se aplicó tu descuento personal del {$custom_discount.discount_value|floatval}%!
            {else}
                ¡Se aplicó tu descuento personal de {$custom_discount.discount_value|string_format:"%.2f"}{$currency->sign}!
            {/if}
        </div>

        <div class="price-details">
            {if $show_initial_price}
            <div class="price-line">
                <span class="label">Precio regular:</span>
                <span class="value">{$original_price|string_format:"%.2f"}{$currency->sign}</span>
            </div>
            {/if}
            <div class="price-line discount-amount">
                <span class="label">Tu descuento:</span>
                <span class="value">-{$discount_amount|string_format:"%.2f"}{$currency->sign}</span>
            </div>
            <div class="price-line final-price">
                <span class="label">Tu precio final:</span>
                <span class="value">{$final_price|string_format:"%.2f"}{$currency->sign}</span>
            </div>
        </div>
    </div>

    <style>
    .custom-user-discount {
        margin: 1rem 0;
        padding: 1rem;
        background: #f8f9fa;
        border: 1px solid #e7e7e7;
        border-radius: 4px;
    }

    .custom-user-discount .alert {
        padding: 0.5rem;
        margin-bottom: 1rem;
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
        font-weight: 600;
    }

    .custom-user-discount .price-details {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .custom-user-discount .price-line {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.25rem 0;
    }

    .custom-user-discount .discount-amount {
        color: #28a745;
    }

    .custom-user-discount .discount-amount .value {
        color: #28a745;
        font-weight: 500;
    }

    .custom-user-discount .final-price {
        font-weight: bold;
        border-top: 1px solid #e7e7e7;
        padding-top: 0.75rem;
        margin-top: 0.25rem;
    }

    .custom-user-discount .final-price .value {
        color: #28a745;
    }
    </style>
{/if}
