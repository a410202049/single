<?php

/* private.html.twig */
class __TwigTemplate_2b47e638bf983812ac05c9ea33bf091629701635c70ecd4f74a2847a27dfab4c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("common/common.html.twig", "private.html.twig", 1);
        $this->blocks = array(
            'container' => array($this, 'block_container'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "common/common.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_container($context, array $blocks = array())
    {
        // line 3
        echo "<body class=\"page-private\">
\t";
        // line 4
        $this->loadTemplate("navigation.html.twig", "private.html.twig", 4)->display($context);
        // line 5
        echo "\t";
        $context["private"] = $this->getAttribute(get_block("private_policy"), 0, array(), "array");
        // line 6
        echo "\t<div class=\"container-fluid private-container\">
\t\t<article class=\"row-md\">
\t\t\t<h2 class=\"private-title\">";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["private"]) ? $context["private"] : null), "title", array()), "html", null, true);
        echo "</h2>
\t\t\t";
        // line 9
        echo $this->getAttribute((isset($context["private"]) ? $context["private"] : null), "content", array());
        echo "
\t\t</article>
\t</div>
\t";
        // line 12
        $this->loadTemplate("contact.html.twig", "private.html.twig", 12)->display($context);
        // line 13
        echo "</body>
";
    }

    public function getTemplateName()
    {
        return "private.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 13,  53 => 12,  47 => 9,  43 => 8,  39 => 6,  36 => 5,  34 => 4,  31 => 3,  28 => 2,  11 => 1,);
    }
}
/* {% extends 'common/common.html.twig' %}*/
/* {% block container %}*/
/* <body class="page-private">*/
/* 	{% include 'navigation.html.twig' %}*/
/* 	{% set private = get_block("private_policy")[0] %}*/
/* 	<div class="container-fluid private-container">*/
/* 		<article class="row-md">*/
/* 			<h2 class="private-title">{{private.title}}</h2>*/
/* 			{{private.content|raw}}*/
/* 		</article>*/
/* 	</div>*/
/* 	{% include 'contact.html.twig' %}*/
/* </body>*/
/* {% endblock %}*/
