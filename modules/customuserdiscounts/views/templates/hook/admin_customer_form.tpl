{*
* 2025 Juan Salazar
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
*}

{if isset($customer_discount)}
<div class="card">
    <h3 class="card-header">
        <i class="material-icons">local_offer</i>
        {l s='Customer Discounts' mod='customuserdiscounts'}
    </h3>
    <div class="card-body">
        <div class="form-group row">
            <label class="form-control-label">{l s='Discount Type' mod='customuserdiscounts'}</label>
            <div class="col-sm">
                <select name="discount_type" class="custom-select">
                    <option value="percentage" {if $customer_discount->discount_type == 'percentage'}selected{/if}>
                        {l s='Percentage' mod='customuserdiscounts'}
                    </option>
                    <option value="fixed" {if $customer_discount->discount_type == 'fixed'}selected{/if}>
                        {l s='Fixed Amount' mod='customuserdiscounts'}
                    </option>
                </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label class="form-control-label">{l s='Discount Value' mod='customuserdiscounts'}</label>
            <div class="col-sm">
                <div class="input-group">
                    <input type="number" 
                           name="discount_value" 
                           class="form-control" 
                           value="{$customer_discount->discount_value|escape:'html':'UTF-8'}" 
                           min="0" 
                           step="any">
                    <div class="input-group-append">
                        <span class="input-group-text discount-symbol">
                            {if $customer_discount->discount_type == 'percentage'}%{else}{$currency_sign}{/if}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm">
                <button type="button" class="btn btn-primary" id="save-discount">
                    {l s='Save Discount' mod='customuserdiscounts'}
                </button>
            </div>
        </div>

        {if isset($discount_history) && $discount_history|count > 0}
            <h4>{l s='Discount History' mod='customuserdiscounts'}</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{l s='Type' mod='customuserdiscounts'}</th>
                            <th>{l s='Value' mod='customuserdiscounts'}</th>
                            <th>{l s='Date Added' mod='customuserdiscounts'}</th>
                            <th>{l s='Last Updated' mod='customuserdiscounts'}</th>
                            <th>{l s='Actions' mod='customuserdiscounts'}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$discount_history item=discount}
                            <tr>
                                <td>
                                    {if $discount.discount_type == 'percentage'}
                                        {l s='Percentage' mod='customuserdiscounts'}
                                    {else}
                                        {l s='Fixed Amount' mod='customuserdiscounts'}
                                    {/if}
                                </td>
                                <td>
                                    {if $discount.discount_type == 'percentage'}
                                        {$discount.discount_value}%
                                    {else}
                                        {$discount.discount_value|string_format:"%.2f"}{$currency_sign}
                                    {/if}
                                </td>
                                <td>{$discount.date_add}</td>
                                <td>{$discount.date_upd}</td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm delete-discount" data-id="{$discount.id_discount}">
                                        {l s='Delete' mod='customuserdiscounts'}
                                    </button>
                                </td>
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
        {/if}
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // Actualizar el símbolo cuando cambia el tipo de descuento
        $('select[name="discount_type"]').change(function() {
            $('.discount-symbol').text($(this).val() === 'percentage' ? '%' : '{$currency_sign}');
        });

        // Guardar descuento
        $('#save-discount').click(function() {
            var data = {
                ajax: 1,
                action: 'saveDiscount',
                id_customer: {$customer_id},
                discount_type: $('select[name="discount_type"]').val(),
                discount_value: $('input[name="discount_value"]').val()
            };

            $.ajax({
                url: '{$ajax_url}',
                type: 'POST',
                data: data,
                success: function(response) {
                    if (response.success) {
                        showSuccessMessage('{l s='Discount saved successfully' mod='customuserdiscounts'}');
                        location.reload();
                    } else {
                        showErrorMessage(response.message || '{l s='Error saving discount' mod='customuserdiscounts'}');
                    }
                },
                error: function() {
                    showErrorMessage('{l s='Error saving discount' mod='customuserdiscounts'}');
                }
            });
        });

        // Eliminar descuento
        $('.delete-discount').click(function() {
            if (!confirm('{l s='Are you sure you want to delete this discount?' mod='customuserdiscounts'}')) {
                return;
            }

            var data = {
                ajax: 1,
                action: 'deleteDiscount',
                id_discount: $(this).data('id')
            };

            $.ajax({
                url: '{$ajax_url}',
                type: 'POST',
                data: data,
                success: function(response) {
                    if (response.success) {
                        showSuccessMessage('{l s='Discount deleted successfully' mod='customuserdiscounts'}');
                        location.reload();
                    } else {
                        showErrorMessage(response.message || '{l s='Error deleting discount' mod='customuserdiscounts'}');
                    }
                },
                error: function() {
                    showErrorMessage('{l s='Error deleting discount' mod='customuserdiscounts'}');
                }
            });
        });
    });
</script>
{/if}
