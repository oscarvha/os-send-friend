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

/* mail/send_post.twig */
class __TwigTemplate_e9a2f33ce4a11d35e3795a045176c630168cf2951c86abda4dcfe36e2b6c625c extends \Twig\Template
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
        echo "<p> Te han invitado a participar en la promoción: <br>
    <strong>";
        // line 2
        echo twig_escape_filter($this->env, ($context["name_post"] ?? null), "html", null, true);
        echo "</strong><br> de Dialsur
</p>
<p>Haz click <a href=\"";
        // line 4
        echo twig_escape_filter($this->env, ($context["url_post"] ?? null), "html", null, true);
        echo "\">Aqui</a> para participar<br>
    <img src=\"";
        // line 5
        echo twig_escape_filter($this->env, ($context["image_post"] ?? null), "html", null, true);
        echo "\" alt=\"\" width=\"200\">
</p>";
    }

    public function getTemplateName()
    {
        return "mail/send_post.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 5,  45 => 4,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "mail/send_post.twig", "/var/www/vhosts/ganacondialsur.es/httpdocs/wp/wp-content/plugins/os-send-friend/templates/mail/send_post.twig");
    }
}
