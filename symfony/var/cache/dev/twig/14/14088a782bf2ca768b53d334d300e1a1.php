<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* message/details.html.twig */
class __TwigTemplate_2b7f807996a257dc93086b782b761873 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 2
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "message/details.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "message/details.html.twig"));

        $this->parent = $this->load("base.html.twig", 2);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Message";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 7
        yield "    <div class=\"container mx-auto py-6 max-w-2xl\">

        ";
        // line 10
        yield "        <div class=\"bg-white dark:bg-gray-800 shadow-md rounded-lg p-4 mb-6\">
            <div class=\"flex items-center mb-2\">
                <span class=\"font-bold\">";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 12, $this->source); })()), "author", [], "any", false, false, false, 12), "firstname", [], "any", false, false, false, 12) . " ") . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 12, $this->source); })()), "author", [], "any", false, false, false, 12), "lastname", [], "any", false, false, false, 12)), "html", null, true);
        yield "</span>
                <span class=\"text-gray-500 text-sm ml-2\">";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 13, $this->source); })()), "createdAt", [], "any", false, false, false, 13), "d/m/Y H:i"), "html", null, true);
        yield "</span>
            </div>
            ";
        // line 15
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "title", [], "any", true, true, false, 15)) {
            // line 16
            yield "                <h2 class=\"font-semibold text-lg mb-2\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 16, $this->source); })()), "title", [], "any", false, false, false, 16), "html", null, true);
            yield "</h2>
            ";
        }
        // line 18
        yield "            <p class=\"mb-2\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 18, $this->source); })()), "content", [], "any", false, false, false, 18), "html", null, true);
        yield "</p>
            ";
        // line 19
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 19, $this->source); })()), "image", [], "any", false, false, false, 19)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 20
            yield "                <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 20, $this->source); })()), "image", [], "any", false, false, false, 20))), "html", null, true);
            yield "\" class=\"w-full rounded-lg\">
            ";
        }
        // line 22
        yield "        </div>

        ";
        // line 25
        yield "        ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 25, $this->source); })()), "user", [], "any", false, false, false, 25)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 26
            yield "            <div class=\"mb-4\">
                ";
            // line 27
            yield             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 27, $this->source); })()), 'form_start');
            yield "
                <div class=\"mb-2\">
                    ";
            // line 29
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 29, $this->source); })()), "content", [], "any", false, false, false, 29), 'widget', ["attr" => ["placeholder" => "Écris un commentaire...", "rows" => 2, "class" => "w-full border rounded p-2"]]);
            yield "
                    ";
            // line 30
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 30, $this->source); })()), "content", [], "any", false, false, false, 30), 'errors');
            yield "
                </div>
                ";
            // line 32
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 32, $this->source); })()), "submit", [], "any", false, false, false, 32), 'row');
            yield "
                ";
            // line 33
            yield             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 33, $this->source); })()), 'form_end');
            yield "
            </div>
        ";
        }
        // line 36
        yield "

        ";
        // line 39
        yield "        <div class=\"space-y-4\">
            ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 40, $this->source); })()), "comments", [], "any", false, false, false, 40));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 41
            yield "                <div class=\"flex items-start space-x-3 bg-gray-100 dark:bg-gray-700 p-3 rounded-lg\">
                    <div class=\"flex-1\">
                        <div class=\"flex justify-between items-center mb-1\">
                            <span class=\"font-bold\">";
            // line 44
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "author", [], "any", false, false, false, 44), "firstname", [], "any", false, false, false, 44) . " ") . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "author", [], "any", false, false, false, 44), "lastname", [], "any", false, false, false, 44)), "html", null, true);
            yield "</span>
                            <span class=\"text-gray-500 text-sm\">";
            // line 45
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "createdAt", [], "any", false, false, false, 45), "d/m/Y H:i"), "html", null, true);
            yield "</span>
                        </div>
                        <p>";
            // line 47
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "content", [], "any", false, false, false, 47), "html", null, true);
            yield "</p>

                        ";
            // line 49
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 49, $this->source); })()), "user", [], "any", false, false, false, 49) && ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 49, $this->source); })()), "user", [], "any", false, false, false, 49), "id", [], "any", false, false, false, 49) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "author", [], "any", false, false, false, 49), "id", [], "any", false, false, false, 49)) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")))) {
                // line 50
                yield "                            <div class=\"mt-1 flex space-x-2 text-sm text-gray-500\">
                                <a href=\"";
                // line 51
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("comment_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 51)]), "html", null, true);
                yield "\" class=\"hover:underline\">Modifier</a>
                                <a href=\"";
                // line 52
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("comment_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "id", [], "any", false, false, false, 52)]), "html", null, true);
                yield "\"
                                   class=\"hover:underline text-red-500\"
                                   onclick=\"return confirm('Voulez-vous vraiment supprimer ce commentaire ?');\">
                                    Supprimer
                                </a>
                            </div>
                        ";
            }
            // line 59
            yield "                    </div>
                </div>
            ";
            $context['_iterated'] = true;
        }
        // line 61
        if (!$context['_iterated']) {
            // line 62
            yield "                <p class=\"text-gray-500 dark:text-gray-400\">Aucun commentaire pour le moment.</p>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['comment'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 64
        yield "        </div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "message/details.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  237 => 64,  230 => 62,  228 => 61,  222 => 59,  212 => 52,  208 => 51,  205 => 50,  203 => 49,  198 => 47,  193 => 45,  189 => 44,  184 => 41,  179 => 40,  176 => 39,  172 => 36,  166 => 33,  162 => 32,  157 => 30,  153 => 29,  148 => 27,  145 => 26,  142 => 25,  138 => 22,  132 => 20,  130 => 19,  125 => 18,  119 => 16,  117 => 15,  112 => 13,  108 => 12,  104 => 10,  100 => 7,  87 => 6,  64 => 4,  41 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/message/details.html.twig #}
{% extends 'base.html.twig' %}

{% block title %}Message{% endblock %}

{% block body %}
    <div class=\"container mx-auto py-6 max-w-2xl\">

        {# Message principal #}
        <div class=\"bg-white dark:bg-gray-800 shadow-md rounded-lg p-4 mb-6\">
            <div class=\"flex items-center mb-2\">
                <span class=\"font-bold\">{{ message.author.firstname ~ ' ' ~ message.author.lastname }}</span>
                <span class=\"text-gray-500 text-sm ml-2\">{{ message.createdAt|date('d/m/Y H:i') }}</span>
            </div>
            {% if message.title is defined %}
                <h2 class=\"font-semibold text-lg mb-2\">{{ message.title }}</h2>
            {% endif %}
            <p class=\"mb-2\">{{ message.content }}</p>
            {% if message.image %}
                <img src=\"{{ asset('uploads/' ~ message.image) }}\" class=\"w-full rounded-lg\">
            {% endif %}
        </div>

        {# Formulaire de commentaire #}
        {% if app.user %}
            <div class=\"mb-4\">
                {{ form_start(form) }}
                <div class=\"mb-2\">
                    {{ form_widget(form.content, {'attr': {'placeholder': 'Écris un commentaire...', 'rows': 2, 'class': 'w-full border rounded p-2'}}) }}
                    {{ form_errors(form.content) }}
                </div>
                {{ form_row(form.submit) }}
                {{ form_end(form) }}
            </div>
        {% endif %}


        {# Liste des commentaires #}
        <div class=\"space-y-4\">
            {% for comment in message.comments %}
                <div class=\"flex items-start space-x-3 bg-gray-100 dark:bg-gray-700 p-3 rounded-lg\">
                    <div class=\"flex-1\">
                        <div class=\"flex justify-between items-center mb-1\">
                            <span class=\"font-bold\">{{ comment.author.firstname ~ ' ' ~ comment.author.lastname }}</span>
                            <span class=\"text-gray-500 text-sm\">{{ comment.createdAt|date('d/m/Y H:i') }}</span>
                        </div>
                        <p>{{ comment.content }}</p>

                        {% if app.user and (app.user.id == comment.author.id or is_granted('ROLE_ADMIN')) %}
                            <div class=\"mt-1 flex space-x-2 text-sm text-gray-500\">
                                <a href=\"{{ path('comment_edit', {'id': comment.id}) }}\" class=\"hover:underline\">Modifier</a>
                                <a href=\"{{ path('comment_delete', {'id': comment.id}) }}\"
                                   class=\"hover:underline text-red-500\"
                                   onclick=\"return confirm('Voulez-vous vraiment supprimer ce commentaire ?');\">
                                    Supprimer
                                </a>
                            </div>
                        {% endif %}
                    </div>
                </div>
            {% else %}
                <p class=\"text-gray-500 dark:text-gray-400\">Aucun commentaire pour le moment.</p>
            {% endfor %}
        </div>
    </div>
{% endblock %}
", "message/details.html.twig", "/var/www/html/templates/message/details.html.twig");
    }
}
