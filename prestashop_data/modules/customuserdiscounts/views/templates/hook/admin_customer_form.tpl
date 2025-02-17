{*
* 2025 Juan Salazar
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
*}

<div class="card">
    <h3 class="card-header">
        <i class="material-icons">local_offer</i>
        {l s='Custom Discounts' d='Modules.Customuserdiscounts.Admin'}
    </h3>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form id="discount-form" class="form-horizontal">
                    <input type="hidden" name="id_customer" value="{$customerId|intval}">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">{l s='Discount Type' d='Modules.Customuserdiscounts.Admin'}</label>
                        <div class="col-sm-8">
                            <select name="discount_type" class="form-control" required>
                                <option value="percentage">{l s='Percentage' d='Modules.Customuserdiscounts.Admin'}</option>
                                <option value="amount">{l s='Fixed Amount' d='Modules.Customuserdiscounts.Admin'}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">{l s='Discount Value' d='Modules.Customuserdiscounts.Admin'}</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="number" name="discount_value" class="form-control" min="0" step="0.01" required>
                                <div class="input-group-append">
                                    <span class="input-group-text discount-symbol">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8 offset-sm-4">
                            <button type="submit" class="btn btn-primary">
                                {l s='Save Discount' d='Modules.Customuserdiscounts.Admin'}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <h4>{l s='Discount History' d='Modules.Customuserdiscounts.Admin'}</h4>
                {if isset($discounts) && $discounts}
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{l s='Type' d='Modules.Customuserdiscounts.Admin'}</th>
                                    <th>{l s='Value' d='Modules.Customuserdiscounts.Admin'}</th>
                                    <th>{l s='Date Added' d='Modules.Customuserdiscounts.Admin'}</th>
                                    <th>{l s='Actions' d='Modules.Customuserdiscounts.Admin'}</th>
                                </tr>
                            </thead>
                            <tbody>
                                {foreach $discounts as $discount}
                                    <tr>
                                        <td>
                                            {if $discount.discount_type == 'percentage'}
                                                {l s='Percentage' d='Modules.Customuserdiscounts.Admin'}
                                            {else}
                                                {l s='Fixed Amount' d='Modules.Customuserdiscounts.Admin'}
                                            {/if}
                                        </td>
                                        <td>
                                            {if $discount.discount_type == 'percentage'}
                                                {$discount.discount_value|floatval}%
                                            {else}
                                                {$discount.discount_value|string_format:"%.2f"}{$currency->sign}
                                            {/if}
                                        </td>
                                        <td>{$discount.date_add|date_format:"%Y-%m-%d %H:%M:%S"}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" 
                                                        class="btn btn-primary btn-sm js-edit-discount" 
                                                        data-discount-id="{$discount.id_custom_user_discount|intval}"
                                                        data-discount-type="{$discount.discount_type|escape:'html':'UTF-8'}"
                                                        data-discount-value="{$discount.discount_value|floatval}">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" 
                                                        class="btn btn-danger btn-sm js-delete-discount" 
                                                        data-discount-id="{$discount.id_custom_user_discount|intval}">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div>
                {else}
                    <div class="alert alert-info">
                        {l s='No discounts have been created yet.' d='Modules.Customuserdiscounts.Admin'}
                    </div>
                {/if}
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // Actualizar el símbolo según el tipo de descuento
        $('select[name="discount_type"]').on('change', function() {
            $('.discount-symbol').text($(this).val() === 'percentage' ? '%' : '{$currency->sign}');
        });

        // Manejar el envío del formulario
        $('#discount-form').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: '{$link->getAdminLink('AdminCustomerForm')|addslashes}',
                method: 'POST',
                data: formData + '&ajax=1&action=saveDiscount&submitCustomerDiscount=1',
                success: function(response) {
                    if (response.success) {
                        showSuccessMessage(response.message);
                        window.location.reload();
                    } else {
                        showErrorMessage(response.message || '{l s='Error saving discount' d='Modules.Customuserdiscounts.Admin' js=1}');
                    }
                },
                error: function() {
                    showErrorMessage('{l s='Error saving discount' d='Modules.Customuserdiscounts.Admin' js=1}');
                }
            });
        });

        // Eliminar descuento
        $('.js-delete-discount').on('click', function() {
            var $btn = $(this);
            var discountId = $btn.data('discount-id');

            if (!confirm('{l s='Are you sure you want to delete this discount?' d='Modules.Customuserdiscounts.Admin' js=1}')) {
                return;
            }

            $.ajax({
                url: '{$link->getAdminLink('AdminCustomerForm')|addslashes}',
                method: 'POST',
                data: {
                    ajax: 1,
                    action: 'deleteDiscount',
                    id_discount: discountId
                },
                success: function(response) {
                    if (response.success) {
                        showSuccessMessage(response.message);
                        $btn.closest('tr').fadeOut();
                    } else {
                        showErrorMessage(response.message || '{l s='Error deleting discount' d='Modules.Customuserdiscounts.Admin' js=1}');
                    }
                },
                error: function() {
                    showErrorMessage('{l s='Error deleting discount' d='Modules.Customuserdiscounts.Admin' js=1}');
                }
            });
        });

        // Editar descuento
        $('.js-edit-discount').on('click', function() {
            var $btn = $(this);
            var discountType = $btn.data('discount-type');
            var discountValue = $btn.data('discount-value');

            $('select[name="discount_type"]').val(discountType).trigger('change');
            $('input[name="discount_value"]').val(discountValue);
        });
    });
</script>
