<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @Modules/customuserdiscounts/views/templates/admin/list.html.twig */
class __TwigTemplate_facda17b9a8abbe675460a9a2004482d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Modules/customuserdiscounts/views/templates/admin/list.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Modules/customuserdiscounts/views/templates/admin/list.html.twig"));

        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@Modules/customuserdiscounts/views/templates/admin/list.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 4
        echo "    <div class=\"row\">
        <div class=\"col-sm-12\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h3 class=\"card-header-title\">
                        ";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Custom User Discounts", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "
                    </h3>
                </div>
                <div class=\"card-body\">
                    <div class=\"table-responsive\">
                        <table class=\"table\">
                            <thead>
                                <tr>
                                    <th>";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("ID", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "</th>
                                    <th>";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Customer", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "</th>
                                    <th>";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Email", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "</th>
                                    <th>";
        // line 20
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Type", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "</th>
                                    <th class=\"text-right\">";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Value", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "</th>
                                    <th>";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Date Added", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "</th>
                                    <th class=\"text-right\">";
        // line 23
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Actions", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
        // line 27
        if ((array_key_exists("discounts", $context) && (twig_length_filter($this->env, (isset($context["discounts"]) || array_key_exists("discounts", $context) ? $context["discounts"] : (function () { throw new RuntimeError('Variable "discounts" does not exist.', 27, $this->source); })())) > 0))) {
            // line 28
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["discounts"]) || array_key_exists("discounts", $context) ? $context["discounts"] : (function () { throw new RuntimeError('Variable "discounts" does not exist.', 28, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["discount"]) {
                // line 29
                echo "                                        <tr>
                                            <td class=\"center\">";
                // line 30
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["discount"], "id", [], "any", false, false, false, 30), "html", null, true);
                echo "</td>
                                            <td>";
                // line 31
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["discount"], "customerName", [], "any", false, false, false, 31), "html", null, true);
                echo "</td>
                                            <td>";
                // line 32
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["discount"], "customerEmail", [], "any", false, false, false, 32), "html", null, true);
                echo "</td>
                                            <td>";
                // line 33
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["discount"], "discountType", [], "any", false, false, false, 33), "html", null, true);
                echo "</td>
                                            <td class=\"text-right\">";
                // line 34
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["discount"], "formattedValue", [], "any", false, false, false, 34), "html", null, true);
                echo "</td>
                                            <td>";
                // line 35
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["discount"], "dateAdd", [], "any", false, false, false, 35), "Y-m-d H:i:s"), "html", null, true);
                echo "</td>
                                            <td class=\"text-right\">
                                                <div class=\"btn-group\" role=\"group\">
                                                    <button type=\"button\" 
                                                            class=\"btn btn-default edit-discount\" 
                                                            data-id=\"";
                // line 40
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["discount"], "id", [], "any", false, false, false, 40), "html", null, true);
                echo "\"
                                                            data-type=\"";
                // line 41
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["discount"], "rawType", [], "any", false, false, false, 41), "html", null, true);
                echo "\"
                                                            data-value=\"";
                // line 42
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["discount"], "discountValue", [], "any", false, false, false, 42), "html", null, true);
                echo "\"
                                                            title=\"";
                // line 43
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Edit", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
                echo "\">
                                                        <i class=\"material-icons\">edit</i>
                                                    </button>
                                                    <button type=\"button\" 
                                                            class=\"btn btn-default delete-discount\" 
                                                            data-id=\"";
                // line 48
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["discount"], "id", [], "any", false, false, false, 48), "html", null, true);
                echo "\"
                                                            title=\"";
                // line 49
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Delete", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
                echo "\">
                                                        <i class=\"material-icons\">delete</i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['discount'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 56
            echo "                                ";
        } else {
            // line 57
            echo "                                    <tr>
                                        <td colspan=\"7\" class=\"text-center\">
                                            ";
            // line 59
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("No records found", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
            echo "
                                        </td>
                                    </tr>
                                ";
        }
        // line 63
        echo "                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        ";
        // line 71
        echo "        <div class=\"modal fade\" id=\"editDiscountModal\" tabindex=\"-1\" role=\"dialog\">
            <div class=\"modal-dialog\" role=\"document\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <h4 class=\"modal-title\">";
        // line 75
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Edit Discount", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "</h4>
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                    </div>
                    <div class=\"modal-body\">
                        <div class=\"form-group\">
                            <label for=\"discountType\">";
        // line 80
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Discount Type", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "</label>
                            <select class=\"form-control\" id=\"discountType\">
                                <option value=\"percentage\">";
        // line 82
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Percentage", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "</option>
                                <option value=\"amount\">";
        // line 83
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Fixed Amount", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "</option>
                            </select>
                        </div>
                        <div class=\"form-group\">
                            <label for=\"discountValue\">";
        // line 87
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Value", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "</label>
                            <input type=\"number\" class=\"form-control\" id=\"discountValue\" step=\"0.01\" min=\"0\">
                        </div>
                    </div>
                    <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">
                            ";
        // line 93
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cancel", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "
                        </button>
                        <button type=\"button\" class=\"btn btn-primary\" id=\"saveDiscount\">
                            ";
        // line 96
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Save", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "
                        </button>
                    </div>
                </div>
            </div>
        </div>

        ";
        // line 104
        echo "        <div class=\"modal fade\" id=\"deleteDiscountModal\" tabindex=\"-1\" role=\"dialog\">
            <div class=\"modal-dialog\" role=\"document\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <h4 class=\"modal-title\">";
        // line 108
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Delete Discount", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "</h4>
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                    </div>
                    <div class=\"modal-body\">
                        <p>";
        // line 112
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Are you sure you want to delete this discount?", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "</p>
                    </div>
                    <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">
                            ";
        // line 116
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cancel", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "
                        </button>
                        <button type=\"button\" class=\"btn btn-danger\" id=\"confirmDelete\">
                            ";
        // line 119
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Delete", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 128
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 129
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script>
        \$(document).ready(function() {
            const editUrl = '";
        // line 132
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_customuserdiscounts_edit", ["id" => 0]);
        echo "';
            const deleteUrl = '";
        // line 133
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_customuserdiscounts_delete", ["id" => 0]);
        echo "';
            let currentDiscountId = null;

            // Manejador para el botón de editar
            \$('.edit-discount').click(function(e) {
                e.preventDefault();
                currentDiscountId = \$(this).data('id');
                const type = \$(this).data('type');
                const value = \$(this).data('value');

                \$('#discountType').val(type);
                \$('#discountValue').val(value);
                \$('#editDiscountModal').modal('show');
            });

            // Manejador para guardar cambios
            \$('#saveDiscount').click(function() {
                if (!currentDiscountId) return;

                const url = editUrl.replace('/0', '/' + currentDiscountId);
                const data = {
                    discountType: \$('#discountType').val(),
                    discountValue: \$('#discountValue').val()
                };

                \$.ajax({
                    url: url,
                    method: 'POST',
                    data: JSON.stringify(data),
                    contentType: 'application/json',
                    success: function(response) {
                        if (response.success) {
                            \$('#editDiscountModal').modal('hide');
                            window.location.reload();
                        } else {
                            showErrorMessage('";
        // line 168
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Error updating discount", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "');
                        }
                    },
                    error: function() {
                        showErrorMessage('";
        // line 172
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Error updating discount", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "');
                    }
                });
            });

            // Manejador para el botón de eliminar
            \$('.delete-discount').click(function(e) {
                e.preventDefault();
                currentDiscountId = \$(this).data('id');
                \$('#deleteDiscountModal').modal('show');
            });

            // Manejador para confirmar eliminación
            \$('#confirmDelete').click(function() {
                if (!currentDiscountId) return;

                const url = deleteUrl.replace('/0', '/' + currentDiscountId);
                
                \$.ajax({
                    url: url,
                    method: 'POST',
                    success: function(response) {
                        if (response.success) {
                            \$('#deleteDiscountModal').modal('hide');
                            window.location.reload();
                        } else {
                            showErrorMessage('";
        // line 198
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Error deleting discount", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "');
                        }
                    },
                    error: function() {
                        showErrorMessage('";
        // line 202
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Error deleting discount", [], "Modules.Customuserdiscounts.Admin"), "html", null, true);
        echo "');
                    }
                });
            });

            function showErrorMessage(message) {
                \$.growl.error({ message: message });
            }
        });
    </script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "@Modules/customuserdiscounts/views/templates/admin/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  417 => 202,  410 => 198,  381 => 172,  374 => 168,  336 => 133,  332 => 132,  325 => 129,  315 => 128,  297 => 119,  291 => 116,  284 => 112,  277 => 108,  271 => 104,  261 => 96,  255 => 93,  246 => 87,  239 => 83,  235 => 82,  230 => 80,  222 => 75,  216 => 71,  207 => 63,  200 => 59,  196 => 57,  193 => 56,  180 => 49,  176 => 48,  168 => 43,  164 => 42,  160 => 41,  156 => 40,  148 => 35,  144 => 34,  140 => 33,  136 => 32,  132 => 31,  128 => 30,  125 => 29,  120 => 28,  118 => 27,  111 => 23,  107 => 22,  103 => 21,  99 => 20,  95 => 19,  91 => 18,  87 => 17,  76 => 9,  69 => 4,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends '@PrestaShop/Admin/layout.html.twig' %}

{% block content %}
    <div class=\"row\">
        <div class=\"col-sm-12\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h3 class=\"card-header-title\">
                        {{ 'Custom User Discounts'|trans([], 'Modules.Customuserdiscounts.Admin') }}
                    </h3>
                </div>
                <div class=\"card-body\">
                    <div class=\"table-responsive\">
                        <table class=\"table\">
                            <thead>
                                <tr>
                                    <th>{{ 'ID'|trans([], 'Modules.Customuserdiscounts.Admin') }}</th>
                                    <th>{{ 'Customer'|trans([], 'Modules.Customuserdiscounts.Admin') }}</th>
                                    <th>{{ 'Email'|trans([], 'Modules.Customuserdiscounts.Admin') }}</th>
                                    <th>{{ 'Type'|trans([], 'Modules.Customuserdiscounts.Admin') }}</th>
                                    <th class=\"text-right\">{{ 'Value'|trans([], 'Modules.Customuserdiscounts.Admin') }}</th>
                                    <th>{{ 'Date Added'|trans([], 'Modules.Customuserdiscounts.Admin') }}</th>
                                    <th class=\"text-right\">{{ 'Actions'|trans([], 'Modules.Customuserdiscounts.Admin') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                {% if discounts is defined and discounts|length > 0 %}
                                    {% for discount in discounts %}
                                        <tr>
                                            <td class=\"center\">{{ discount.id }}</td>
                                            <td>{{ discount.customerName }}</td>
                                            <td>{{ discount.customerEmail }}</td>
                                            <td>{{ discount.discountType }}</td>
                                            <td class=\"text-right\">{{ discount.formattedValue }}</td>
                                            <td>{{ discount.dateAdd|date('Y-m-d H:i:s') }}</td>
                                            <td class=\"text-right\">
                                                <div class=\"btn-group\" role=\"group\">
                                                    <button type=\"button\" 
                                                            class=\"btn btn-default edit-discount\" 
                                                            data-id=\"{{ discount.id }}\"
                                                            data-type=\"{{ discount.rawType }}\"
                                                            data-value=\"{{ discount.discountValue }}\"
                                                            title=\"{{ 'Edit'|trans([], 'Modules.Customuserdiscounts.Admin') }}\">
                                                        <i class=\"material-icons\">edit</i>
                                                    </button>
                                                    <button type=\"button\" 
                                                            class=\"btn btn-default delete-discount\" 
                                                            data-id=\"{{ discount.id }}\"
                                                            title=\"{{ 'Delete'|trans([], 'Modules.Customuserdiscounts.Admin') }}\">
                                                        <i class=\"material-icons\">delete</i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    {% endfor %}
                                {% else %}
                                    <tr>
                                        <td colspan=\"7\" class=\"text-center\">
                                            {{ 'No records found'|trans([], 'Modules.Customuserdiscounts.Admin') }}
                                        </td>
                                    </tr>
                                {% endif %}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {# Modal de edición #}
        <div class=\"modal fade\" id=\"editDiscountModal\" tabindex=\"-1\" role=\"dialog\">
            <div class=\"modal-dialog\" role=\"document\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <h4 class=\"modal-title\">{{ 'Edit Discount'|trans([], 'Modules.Customuserdiscounts.Admin') }}</h4>
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                    </div>
                    <div class=\"modal-body\">
                        <div class=\"form-group\">
                            <label for=\"discountType\">{{ 'Discount Type'|trans([], 'Modules.Customuserdiscounts.Admin') }}</label>
                            <select class=\"form-control\" id=\"discountType\">
                                <option value=\"percentage\">{{ 'Percentage'|trans([], 'Modules.Customuserdiscounts.Admin') }}</option>
                                <option value=\"amount\">{{ 'Fixed Amount'|trans([], 'Modules.Customuserdiscounts.Admin') }}</option>
                            </select>
                        </div>
                        <div class=\"form-group\">
                            <label for=\"discountValue\">{{ 'Value'|trans([], 'Modules.Customuserdiscounts.Admin') }}</label>
                            <input type=\"number\" class=\"form-control\" id=\"discountValue\" step=\"0.01\" min=\"0\">
                        </div>
                    </div>
                    <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">
                            {{ 'Cancel'|trans([], 'Modules.Customuserdiscounts.Admin') }}
                        </button>
                        <button type=\"button\" class=\"btn btn-primary\" id=\"saveDiscount\">
                            {{ 'Save'|trans([], 'Modules.Customuserdiscounts.Admin') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {# Modal de eliminación #}
        <div class=\"modal fade\" id=\"deleteDiscountModal\" tabindex=\"-1\" role=\"dialog\">
            <div class=\"modal-dialog\" role=\"document\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <h4 class=\"modal-title\">{{ 'Delete Discount'|trans([], 'Modules.Customuserdiscounts.Admin') }}</h4>
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                    </div>
                    <div class=\"modal-body\">
                        <p>{{ 'Are you sure you want to delete this discount?'|trans([], 'Modules.Customuserdiscounts.Admin') }}</p>
                    </div>
                    <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">
                            {{ 'Cancel'|trans([], 'Modules.Customuserdiscounts.Admin') }}
                        </button>
                        <button type=\"button\" class=\"btn btn-danger\" id=\"confirmDelete\">
                            {{ 'Delete'|trans([], 'Modules.Customuserdiscounts.Admin') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script>
        \$(document).ready(function() {
            const editUrl = '{{ path('admin_customuserdiscounts_edit', {'id': 0}) }}';
            const deleteUrl = '{{ path('admin_customuserdiscounts_delete', {'id': 0}) }}';
            let currentDiscountId = null;

            // Manejador para el botón de editar
            \$('.edit-discount').click(function(e) {
                e.preventDefault();
                currentDiscountId = \$(this).data('id');
                const type = \$(this).data('type');
                const value = \$(this).data('value');

                \$('#discountType').val(type);
                \$('#discountValue').val(value);
                \$('#editDiscountModal').modal('show');
            });

            // Manejador para guardar cambios
            \$('#saveDiscount').click(function() {
                if (!currentDiscountId) return;

                const url = editUrl.replace('/0', '/' + currentDiscountId);
                const data = {
                    discountType: \$('#discountType').val(),
                    discountValue: \$('#discountValue').val()
                };

                \$.ajax({
                    url: url,
                    method: 'POST',
                    data: JSON.stringify(data),
                    contentType: 'application/json',
                    success: function(response) {
                        if (response.success) {
                            \$('#editDiscountModal').modal('hide');
                            window.location.reload();
                        } else {
                            showErrorMessage('{{ 'Error updating discount'|trans([], 'Modules.Customuserdiscounts.Admin') }}');
                        }
                    },
                    error: function() {
                        showErrorMessage('{{ 'Error updating discount'|trans([], 'Modules.Customuserdiscounts.Admin') }}');
                    }
                });
            });

            // Manejador para el botón de eliminar
            \$('.delete-discount').click(function(e) {
                e.preventDefault();
                currentDiscountId = \$(this).data('id');
                \$('#deleteDiscountModal').modal('show');
            });

            // Manejador para confirmar eliminación
            \$('#confirmDelete').click(function() {
                if (!currentDiscountId) return;

                const url = deleteUrl.replace('/0', '/' + currentDiscountId);
                
                \$.ajax({
                    url: url,
                    method: 'POST',
                    success: function(response) {
                        if (response.success) {
                            \$('#deleteDiscountModal').modal('hide');
                            window.location.reload();
                        } else {
                            showErrorMessage('{{ 'Error deleting discount'|trans([], 'Modules.Customuserdiscounts.Admin') }}');
                        }
                    },
                    error: function() {
                        showErrorMessage('{{ 'Error deleting discount'|trans([], 'Modules.Customuserdiscounts.Admin') }}');
                    }
                });
            });

            function showErrorMessage(message) {
                \$.growl.error({ message: message });
            }
        });
    </script>
{% endblock %}", "@Modules/customuserdiscounts/views/templates/admin/list.html.twig", "/var/www/html/modules/customuserdiscounts/views/templates/admin/list.html.twig");
    }
}
