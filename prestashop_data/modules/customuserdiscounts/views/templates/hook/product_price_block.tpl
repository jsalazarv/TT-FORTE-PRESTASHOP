{if isset($custom_discount) && $custom_discount}
    <div class="custom-user-discount-container mt-3">
        <div class="custom-user-discount">
            <div class="alert alert-info discount-alert mb-2">
                <i class="material-icons">local_offer</i>
                {if $custom_discount.discount_type === 'percentage'}
                    <span>¡Descuento personal del {$custom_discount.discount_value|floatval}%!</span>
                {else}
                    <span>¡Descuento personal de {$custom_discount.discount_value|string_format:"%.2f"}{$currency->sign}!</span>
                {/if}
            </div>

            <div class="price-details">
                <div class="regular-price">
                    <span class="label">Precio regular:</span>
                    <span class="value">{$original_price|string_format:"%.2f"}{$currency->sign}</span>
                </div>
                <div class="discount-amount text-success">
                    <span class="label">Tu descuento:</span>
                    <span class="value">-{$discount_amount|string_format:"%.2f"}{$currency->sign}</span>
                </div>
                <div class="final-price">
                    <span class="label">Tu precio final:</span>
                    <span class="value">{$final_price|string_format:"%.2f"}{$currency->sign}</span>
                </div>
            </div>
        </div>
    </div>

    <style>
    .custom-user-discount-container {
        margin: 1rem 0;
        padding: 1rem;
        background: #f8f9fa;
        border: 1px solid #e7e7e7;
        border-radius: 4px;
        width: 100%;
        clear: both;
        float: none;
    }

    .custom-user-discount .discount-alert {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1rem;
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
        border-radius: 4px;
        font-weight: 600;
    }

    .custom-user-discount .discount-alert i {
        font-size: 20px;
        color: #155724;
    }

    .custom-user-discount .price-details {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        margin-top: 0.5rem;
    }

    .custom-user-discount .price-details > div {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.25rem 0;
    }

    .custom-user-discount .regular-price .value {
        text-decoration: line-through;
        color: #7a7a7a;
    }

    .custom-user-discount .discount-amount {
        color: #28a745;
        font-weight: 500;
    }

    .custom-user-discount .final-price {
        font-size: 1.2rem;
        font-weight: bold;
        border-top: 1px solid #dee2e6;
        padding-top: 0.75rem;
        margin-top: 0.25rem;
        color: #28a745;
    }

    @media (max-width: 767px) {
        .custom-user-discount-container {
            margin: 0.75rem 0;
            padding: 0.75rem;
        }
        
        .custom-user-discount .price-details {
            font-size: 0.9rem;
        }
        
        .custom-user-discount .final-price {
            font-size: 1.1rem;
        }
    }
    </style>
{/if}
