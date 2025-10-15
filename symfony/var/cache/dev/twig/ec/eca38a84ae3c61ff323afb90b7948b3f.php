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

/* partials/_form.html.twig */
class __TwigTemplate_d4c9fef9b14a6503d88bd32326f25693 extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/_form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/_form.html.twig"));

        // line 1
        yield "<div class=\"mb-3\">
    ";
        // line 2
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 2, $this->source); })()), "content", [], "any", false, false, false, 2), 'label', ["label" => "Contenu du message"]);
        yield "
    ";
        // line 3
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 3, $this->source); })()), "content", [], "any", false, false, false, 3), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Exprimez-vous..."]]);
        yield "
    ";
        // line 4
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 4, $this->source); })()), "content", [], "any", false, false, false, 4), 'errors');
        yield "
</div>

<div class=\"mb-3\">
    ";
        // line 8
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 8, $this->source); })()), "image", [], "any", false, false, false, 8), 'label', ["label" => "Image (optionnelle)"]);
        yield "
    ";
        // line 9
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 9, $this->source); })()), "image", [], "any", false, false, false, 9), 'widget', ["attr" => ["class" => "form-control", "onchange" => "previewImage(event)"]]);
        yield "
    ";
        // line 10
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 10, $this->source); })()), "image", [], "any", false, false, false, 10), 'errors');
        yield "

    ";
        // line 12
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 12, $this->source); })()), "image", [], "any", false, false, false, 12)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 13
            yield "        <div class=\"mt-2\">
            <img src=\"";
            // line 14
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 14, $this->source); })()), "image", [], "any", false, false, false, 14))), "html", null, true);
            yield "\" alt=\"Image actuelle\" class=\"img-thumbnail\" style=\"max-width: 200px;\">
        </div>
    ";
        }
        // line 17
        yield "
    <img id=\"imagePreview\" src=\"\" alt=\"Aperçu de l’image\" class=\"img-thumbnail mt-2\" style=\"max-width: 200px; display:none;\">
</div>


";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "partials/_form.html.twig";
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
        return array (  90 => 17,  84 => 14,  81 => 13,  79 => 12,  74 => 10,  70 => 9,  66 => 8,  59 => 4,  55 => 3,  51 => 2,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"mb-3\">
    {{ form_label(form.content, 'Contenu du message') }}
    {{ form_widget(form.content, {'attr': {'class': 'form-control', 'placeholder': 'Exprimez-vous...'}}) }}
    {{ form_errors(form.content) }}
</div>

<div class=\"mb-3\">
    {{ form_label(form.image, 'Image (optionnelle)') }}
    {{ form_widget(form.image, {'attr': {'class': 'form-control', 'onchange': 'previewImage(event)'}}) }}
    {{ form_errors(form.image) }}

    {% if message.image %}
        <div class=\"mt-2\">
            <img src=\"{{ asset('uploads/' ~ message.image) }}\" alt=\"Image actuelle\" class=\"img-thumbnail\" style=\"max-width: 200px;\">
        </div>
    {% endif %}

    <img id=\"imagePreview\" src=\"\" alt=\"Aperçu de l’image\" class=\"img-thumbnail mt-2\" style=\"max-width: 200px; display:none;\">
</div>


", "partials/_form.html.twig", "/var/www/html/templates/partials/_form.html.twig");
    }
}
