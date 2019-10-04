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

/* form.twig */
class __TwigTemplate_ba9d91b5cbfa1ec63a3c40f0be2bdda6071fdfa03aac835117e72065e8c15acb extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"share_wrapper\">
    <h3>Enviar promoción a un amigo</h3>

    <form id=\"share_form\" class=\"form-share js-share_form\" action=\"#\" method=\"post\">
        <label for=\"email\">Email</label>
        <input type=\"hidden\" name=\"action\" value=\"send_friend\"/>
        <input type=\"hidden\" name=\"post\" value=\"";
        // line 7
        echo twig_escape_filter($this->env, ($context["id_post"] ?? null), "html", null, true);
        echo "\">
        <input  class=\"form-share__input js-input-mail\" type=\"email\" name=\"email\" required>
        <button class=\"button-share\" type=\"submit\"> Enviar </button>
    </form>
    <div class=\"share-message js-share_message\"></div>
</div>";
    }

    public function getTemplateName()
    {
        return "form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "form.twig", "/var/www/vhosts/ganacondialsur.es/httpdocs/wp/wp-content/plugins/os-send-friend/templates/form.twig");
    }
}
