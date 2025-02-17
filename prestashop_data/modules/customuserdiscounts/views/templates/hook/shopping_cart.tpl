{*
* 2025 Juan Salazar
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
*}

<div class="cart-detailed-totals">
    <div class="card-block cart-summary-line custom-user-discount">
        <div class="alert alert-info discount-alert">
            {if $custom_discount.discount_type === 'percentage'}
                <i class="material-icons">local_offer</i>
                <span>{l s='Your personal discount (%s%%)' sprintf=[$custom_discount.discount_value|floatval] d='Modules.Customuserdiscounts.Shop'}</span>
            {else}
                <i class="material-icons">local_offer</i>
                <span>{l s='Your personal discount' d='Modules.Customuserdiscounts.Shop'}</span>
            {/if}
        </div>

        <div class="cart-summary-line">
            <span class="label">{l s='Subtotal:' d='Modules.Customuserdiscounts.Shop'}</span>
            <span class="value">{$total_before_discount|string_format:"%.2f"}{$currency->sign}</span>
        </div>

        <div class="cart-summary-line discount-line">
            <span class="label">{l s='Your discount:' d='Modules.Customuserdiscounts.Shop'}</span>
            <span class="value">-{$discount_amount|string_format:"%.2f"}{$currency->sign}</span>
        </div>
    </div>
</div>

<style>
.cart-summary-line.custom-user-discount {
    background-color: #f8f9fa;
    padding: 1rem;
    border-radius: 4px;
    margin: 1rem 0;
}

.custom-user-discount .discount-alert {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 1rem;
    padding: 0.5rem 1rem;
}

.custom-user-discount .discount-alert i {
    font-size: 1.2rem;
}

.custom-user-discount .cart-summary-line {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 0.5rem 0;
}

.custom-user-discount .discount-line {
    color: #28a745;
    font-weight: 600;
    border-top: 1px solid #dee2e6;
    padding-top: 0.5rem;
    margin-top: 0.5rem;
}
</style>
