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
            'customuserdiscounts_listing' => [$this, 'block_customuserdiscounts_listing'],
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

        // line 2
        $macros["ps"] = $this->macros["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@Modules/customuserdiscounts/views/templates/admin/list.html.twig", 2)->unwrap();
        // line 1
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@Modules/customuserdiscounts/views/templates/admin/list.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 5
        echo "    ";
        $this->displayBlock('customuserdiscounts_listing', $context, $blocks);
        // line 78
        echo "
    ";
        // line 79
        $this->displayBlock('javascripts', $context, $blocks);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    public function block_customuserdiscounts_listing($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "customuserdiscounts_listing"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "customuserdiscounts_listing"));

        // line 6
        echo "        <div class=\"row\">
            <div class=\"col\">
                <div class=\"card\">
                    <div class=\"card-header\">
                        <h3 class=\"card-header-title\">
                            ";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Custom User Discounts", [], "Admin.Global"), "html", null, true);
        echo "
                        </h3>
                    </div>
                    <div class=\"card-body\">
                        <table class=\"table\">
                            <thead>
                                <tr class=\"column-headers\">
                                    <th scope=\"col\">";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("ID", [], "Admin.Global"), "html", null, true);
        echo "</th>
                                    <th scope=\"col\">";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Customer", [], "Admin.Global"), "html", null, true);
        echo "</th>
                                    <th scope=\"col\">";
        // line 20
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Email", [], "Admin.Global"), "html", null, true);
        echo "</th>
                                    <th scope=\"col\">";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Type", [], "Admin.Global"), "html", null, true);
        echo "</th>
                                    <th scope=\"col\" class=\"text-right\">";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Value", [], "Admin.Global"), "html", null, true);
        echo "</th>
                                    <th scope=\"col\">";
        // line 23
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Date Added", [], "Admin.Global"), "html", null, true);
        echo "</th>
                                    <th scope=\"col\" class=\"text-right\">";
        // line 24
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Actions", [], "Admin.Global"), "html", null, true);
        echo "</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
        // line 28
        if ((array_key_exists("discounts", $context) && (twig_length_filter($this->env, (isset($context["discounts"]) || array_key_exists("discounts", $context) ? $context["discounts"] : (function () { throw new RuntimeError('Variable "discounts" does not exist.', 28, $this->source); })())) > 0))) {
            // line 29
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["discounts"]) || array_key_exists("discounts", $context) ? $context["discounts"] : (function () { throw new RuntimeError('Variable "discounts" does not exist.', 29, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["discount"]) {
                // line 30
                echo "                                        <tr>
                                            <td class=\"center\">";
                // line 31
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["discount"], "id", [], "any", false, false, false, 31), "html", null, true);
                echo "</td>
<td>";
                // line 32
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["discount"], "customerName", [], "any", false, false, false, 32), "html", null, true);
                echo "</td>
<td>";
                // line 33
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["discount"], "customerEmail", [], "any", false, false, false, 33), "html", null, true);
                echo "</td>
<td>";
                // line 34
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["discount"], "discountType", [], "any", false, false, false, 34), "html", null, true);
                echo "</td>
<td class=\"text-right\">
    ";
                // line 36
                if ((twig_get_attribute($this->env, $this->source, $context["discount"], "discountType", [], "any", false, false, false, 36) == "percentage")) {
                    // line 37
                    echo "        ";
                    echo twig_escape_filter($this->env, twig_round(twig_get_attribute($this->env, $this->source, $context["discount"], "discountValue", [], "any", false, false, false, 37)), "html", null, true);
                    echo "%
    ";
                } else {
                    // line 39
                    echo "        ";
                    echo twig_escape_filter($this->env, $this->extensions['PrestaShopBundle\Twig\Extension\LocalizationExtension']->priceFormat(twig_get_attribute($this->env, $this->source, $context["discount"], "discountValue", [], "any", false, false, false, 39)), "html", null, true);
                    echo "
    ";
                }
                // line 41
                echo "</td>
<td>";
                // line 42
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["discount"], "dateAdd", [], "any", false, false, false, 42), "Y-m-d H:i:s"), "html", null, true);
                echo "</td>
<td class=\"text-right\">
    <div class=\"btn-group\" role=\"group\">
        ";
                // line 45
                if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("edit", twig_get_attribute($this->env, $this->source, $context["discount"], "id", [], "any", false, false, false, 45))) {
                    // line 46
                    echo "            <a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_customuserdiscounts_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["discount"], "id", [], "any", false, false, false, 46)]), "html", null, true);
                    echo "\" 
               class=\"btn btn-default\" 
               title=\"";
                    // line 48
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Edit", [], "Admin.Actions"), "html", null, true);
                    echo "\">
                <i class=\"material-icons\">edit</i>
            </a>
        ";
                }
                // line 52
                echo "        ";
                if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("delete", twig_get_attribute($this->env, $this->source, $context["discount"], "id", [], "any", false, false, false, 52))) {
                    // line 53
                    echo "            <a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_customuserdiscounts_delete", ["id" => twig_get_attribute($this->env, $this->source, $context["discount"], "id", [], "any", false, false, false, 53)]), "html", null, true);
                    echo "\" 
               class=\"btn btn-default\" 
               title=\"";
                    // line 55
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Delete", [], "Admin.Actions"), "html", null, true);
                    echo "\"
               onclick=\"return confirm('";
                    // line 56
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Are you sure?", [], "Admin.Notifications.Warning"), "html", null, true);
                    echo "');\">
                <i class=\"material-icons\">delete</i>
            </a>
        ";
                }
                // line 60
                echo "    </div>
</td>
                                        </tr>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['discount'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 64
            echo "                                ";
        } else {
            // line 65
            echo "                                    <tr>
                                        <td colspan=\"7\" class=\"text-center\">
                                            ";
            // line 67
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("No records found", [], "Admin.Global"), "html", null, true);
            echo "
                                        </td>
                                    </tr>
                                ";
        }
        // line 71
        echo "                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 79
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 80
        echo "        ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
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
        return array (  281 => 80,  271 => 79,  255 => 71,  248 => 67,  244 => 65,  241 => 64,  232 => 60,  225 => 56,  221 => 55,  215 => 53,  212 => 52,  205 => 48,  199 => 46,  197 => 45,  191 => 42,  188 => 41,  182 => 39,  176 => 37,  174 => 36,  169 => 34,  165 => 33,  161 => 32,  157 => 31,  154 => 30,  149 => 29,  147 => 28,  140 => 24,  136 => 23,  132 => 22,  128 => 21,  124 => 20,  120 => 19,  116 => 18,  106 => 11,  99 => 6,  89 => 5,  79 => 79,  76 => 78,  73 => 5,  63 => 4,  52 => 1,  50 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends '@PrestaShop/Admin/layout.html.twig' %}
{% import '@PrestaShop/Admin/macros.html.twig' as ps %}

{% block content %}
    {% block customuserdiscounts_listing %}
        <div class=\"row\">
            <div class=\"col\">
                <div class=\"card\">
                    <div class=\"card-header\">
                        <h3 class=\"card-header-title\">
                            {{ 'Custom User Discounts'|trans({}, 'Admin.Global') }}
                        </h3>
                    </div>
                    <div class=\"card-body\">
                        <table class=\"table\">
                            <thead>
                                <tr class=\"column-headers\">
                                    <th scope=\"col\">{{ 'ID'|trans({}, 'Admin.Global') }}</th>
                                    <th scope=\"col\">{{ 'Customer'|trans({}, 'Admin.Global') }}</th>
                                    <th scope=\"col\">{{ 'Email'|trans({}, 'Admin.Global') }}</th>
                                    <th scope=\"col\">{{ 'Type'|trans({}, 'Admin.Global') }}</th>
                                    <th scope=\"col\" class=\"text-right\">{{ 'Value'|trans({}, 'Admin.Global') }}</th>
                                    <th scope=\"col\">{{ 'Date Added'|trans({}, 'Admin.Global') }}</th>
                                    <th scope=\"col\" class=\"text-right\">{{ 'Actions'|trans({}, 'Admin.Global') }}</th>
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
<td class=\"text-right\">
    {% if discount.discountType == 'percentage' %}
        {{ discount.discountValue|round }}%
    {% else %}
        {{ discount.discountValue|price_format }}
    {% endif %}
</td>
<td>{{ discount.dateAdd|date('Y-m-d H:i:s') }}</td>
<td class=\"text-right\">
    <div class=\"btn-group\" role=\"group\">
        {% if is_granted('edit', discount.id) %}
            <a href=\"{{ path('admin_customuserdiscounts_edit', {'id': discount.id}) }}\" 
               class=\"btn btn-default\" 
               title=\"{{ 'Edit'|trans({}, 'Admin.Actions') }}\">
                <i class=\"material-icons\">edit</i>
            </a>
        {% endif %}
        {% if is_granted('delete', discount.id) %}
            <a href=\"{{ path('admin_customuserdiscounts_delete', {'id': discount.id}) }}\" 
               class=\"btn btn-default\" 
               title=\"{{ 'Delete'|trans({}, 'Admin.Actions') }}\"
               onclick=\"return confirm('{{ 'Are you sure?'|trans({}, 'Admin.Notifications.Warning') }}');\">
                <i class=\"material-icons\">delete</i>
            </a>
        {% endif %}
    </div>
</td>
                                        </tr>
                                    {% endfor %}
                                {% else %}
                                    <tr>
                                        <td colspan=\"7\" class=\"text-center\">
                                            {{ 'No records found'|trans({}, 'Admin.Global') }}
                                        </td>
                                    </tr>
                                {% endif %}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    {% endblock %}

    {% block javascripts %}
        {{ parent() }}
    {% endblock %}
{% endblock %}", "@Modules/customuserdiscounts/views/templates/admin/list.html.twig", "/var/www/html/modules/customuserdiscounts/views/templates/admin/list.html.twig");
    }
}
