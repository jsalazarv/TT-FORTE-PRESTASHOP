{*
* 2025 Juan Salazar
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
*}

<div class="card">
    <div class="card-header">
        <h3 class="card-header-title">
            <i class="material-icons">local_offer</i>
            {l s='Custom Discounts' d='Modules.Customuserdiscounts.Admin'}
        </h3>
    </div>

    <div class="card-body">
        <div class="row mb-3">
            <div class="col">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add-discount-modal">
                    <i class="material-icons">add</i>
                    {l s='Add new discount' d='Modules.Customuserdiscounts.Admin'}
                </a>
            </div>
        </div>

        {if isset($discounts) && $discounts}
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="column-headers">
                            <th>{l s='ID' d='Modules.Customuserdiscounts.Admin'}</th>
                            <th>{l s='Type' d='Modules.Customuserdiscounts.Admin'}</th>
                            <th>{l s='Value' d='Modules.Customuserdiscounts.Admin'}</th>
                            <th>{l s='Date Added' d='Modules.Customuserdiscounts.Admin'}</th>
                            <th>{l s='Status' d='Modules.Customuserdiscounts.Admin'}</th>
                            <th class="text-right">{l s='Actions' d='Modules.Customuserdiscounts.Admin'}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach $discounts as $discount}
                            <tr>
                                <td>{$discount.id_custom_user_discount|intval}</td>
                                <td>
                                    {if $discount.discount_type == 'percentage'}
                                        <span class="badge badge-info">
                                            {l s='Percentage' d='Modules.Customuserdiscounts.Admin'}
                                        </span>
                                    {else}
                                        <span class="badge badge-success">
                                            {l s='Fixed Amount' d='Modules.Customuserdiscounts.Admin'}
                                        </span>
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
                                    {if $discount.active}
                                        <span class="badge badge-success">
                                            {l s='Active' d='Modules.Customuserdiscounts.Admin'}
                                        </span>
                                    {else}
                                        <span class="badge badge-danger">
                                            {l s='Inactive' d='Modules.Customuserdiscounts.Admin'}
                                        </span>
                                    {/if}
                                </td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <button type="button" 
                                                class="btn btn-link js-edit-discount" 
                                                data-toggle="modal" 
                                                data-target="#edit-discount-modal"
                                                data-discount-id="{$discount.id_custom_user_discount|intval}"
                                                data-discount-type="{$discount.discount_type|escape:'html':'UTF-8'}"
                                                data-discount-value="{$discount.discount_value|floatval}">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" 
                                                class="btn btn-link text-danger js-delete-discount" 
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

<!-- Modal para agregar descuento -->
<div class="modal fade" id="add-discount-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{l s='Add New Discount' d='Modules.Customuserdiscounts.Admin'}</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="add-discount-form">
                <div class="modal-body">
                    <input type="hidden" name="id_customer" value="{$customerId|intval}">
                    <div class="form-group">
                        <label class="form-control-label required">
                            {l s='Discount Type' d='Modules.Customuserdiscounts.Admin'}
                        </label>
                        <select name="discount_type" class="form-control" required>
                            <option value="percentage">{l s='Percentage' d='Modules.Customuserdiscounts.Admin'}</option>
                            <option value="amount">{l s='Fixed Amount' d='Modules.Customuserdiscounts.Admin'}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label required">
                            {l s='Discount Value' d='Modules.Customuserdiscounts.Admin'}
                        </label>
                        <div class="input-group">
                            <input type="number" 
                                   name="discount_value" 
                                   class="form-control" 
                                   min="0" 
                                   step="0.01" 
                                   required>
                            <div class="input-group-append">
                                <span class="input-group-text discount-symbol">%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                        {l s='Cancel' d='Admin.Actions'}
                    </button>
                    <button type="submit" class="btn btn-primary">
                        {l s='Save' d='Admin.Actions'}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para editar descuento -->
<div class="modal fade" id="edit-discount-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{l s='Edit Discount' d='Modules.Customuserdiscounts.Admin'}</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="edit-discount-form">
                <div class="modal-body">
                    <input type="hidden" name="id_customer" value="{$customerId|intval}">
                    <input type="hidden" name="id_discount" value="">
                    <div class="form-group">
                        <label class="form-control-label required">
                            {l s='Discount Type' d='Modules.Customuserdiscounts.Admin'}
                        </label>
                        <select name="discount_type" class="form-control" required>
                            <option value="percentage">{l s='Percentage' d='Modules.Customuserdiscounts.Admin'}</option>
                            <option value="amount">{l s='Fixed Amount' d='Modules.Customuserdiscounts.Admin'}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label required">
                            {l s='Discount Value' d='Modules.Customuserdiscounts.Admin'}
                        </label>
                        <div class="input-group">
                            <input type="number" 
                                   name="discount_value" 
                                   class="form-control" 
                                   min="0" 
                                   step="0.01" 
                                   required>
                            <div class="input-group-append">
                                <span class="input-group-text discount-symbol">%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                        {l s='Cancel' d='Admin.Actions'}
                    </button>
                    <button type="submit" class="btn btn-primary">
                        {l s='Save changes' d='Admin.Actions'}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // Actualizar el símbolo según el tipo de descuento
        $('select[name="discount_type"]').on('change', function() {
            $(this).closest('form').find('.discount-symbol')
                   .text($(this).val() === 'percentage' ? '%' : '{$currency->sign}');
        });

        // Manejar el envío del formulario para agregar descuento
        $('#add-discount-form').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: '{$link->getAdminLink('AdminCustomerForm')|addslashes}',
                method: 'POST',
                data: formData + '&ajax=1&action=saveDiscount&submitCustomerDiscount=1',
                success: function(response) {
                    if (response.success) {
                        showSuccessMessage(response.message);
                        $('#add-discount-modal').modal('hide');
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

        // Manejar el envío del formulario para editar descuento
        $('#edit-discount-form').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: '{$link->getAdminLink('AdminCustomerForm')|addslashes}',
                method: 'POST',
                data: formData + '&ajax=1&action=updateDiscount',
                success: function(response) {
                    if (response.success) {
                        showSuccessMessage(response.message);
                        $('#edit-discount-modal').modal('hide');
                        window.location.reload();
                    } else {
                        showErrorMessage(response.message || '{l s='Error updating discount' d='Modules.Customuserdiscounts.Admin' js=1}');
                    }
                },
                error: function() {
                    showErrorMessage('{l s='Error updating discount' d='Modules.Customuserdiscounts.Admin' js=1}');
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

        // Cargar datos en el modal de edición
        $('.js-edit-discount').on('click', function() {
            var $btn = $(this);
            var discountId = $btn.data('discount-id');
            var discountType = $btn.data('discount-type');
            var discountValue = $btn.data('discount-value');

            var $form = $('#edit-discount-form');
            $form.find('input[name="id_discount"]').val(discountId);
            $form.find('select[name="discount_type"]').val(discountType).trigger('change');
            $form.find('input[name="discount_value"]').val(discountValue);
        });
    });
</script>
