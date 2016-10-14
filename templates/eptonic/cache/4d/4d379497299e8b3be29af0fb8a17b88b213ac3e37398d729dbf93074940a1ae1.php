<?php

/* tech.html.twig */
class __TwigTemplate_229ae005fd983b77e0dfb0be4532a96e91553ba5419aa813f49141ecfab921d4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("common/common.html.twig", "tech.html.twig", 1);
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
        echo "<body class=\"page-tech-advantage\">
\t";
        // line 4
        $this->loadTemplate("navigation.html.twig", "tech.html.twig", 4)->display($context);
        // line 5
        echo "\t<div class=\"curtain filter\">
\t\t";
        // line 6
        $context["curtain"] = $this->getAttribute(get_block("tech_banner"), 0, array(), "array");
        echo "\t
\t\t<img src=\"";
        // line 7
        echo twig_escape_filter($this->env, common_url($this->getAttribute((isset($context["curtain"]) ? $context["curtain"] : null), "image_url", array())), "html", null, true);
        echo "\" alt=\"\">
\t\t<div class=\"curtain-content text-white row-md\" style=\"\">
\t\t\t<article>
\t\t\t\t<h2>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["curtain"]) ? $context["curtain"] : null), "description", array()), "html", null, true);
        echo "</h2>
\t\t\t\t<p>\t";
        // line 11
        echo $this->getAttribute((isset($context["curtain"]) ? $context["curtain"] : null), "content", array());
        echo "</p>
\t\t\t</article>\t
\t\t</div>
\t</div>
\t<div class=\"container-fluid section-container\">
\t\t";
        // line 16
        $context["tech_adv"] = $this->getAttribute(get_block("tech_advantage"), 0, array(), "array");
        // line 17
        echo "\t\t<div class=\"row-md\">\t\t
\t\t\t<article>
\t\t\t\t<h2>";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tech_adv"]) ? $context["tech_adv"] : null), "title", array()), "html", null, true);
        echo "</h2>
\t\t\t\t<p>\t";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tech_adv"]) ? $context["tech_adv"] : null), "description", array()), "html", null, true);
        echo "</p>
\t\t\t\t<hr>\t
\t\t\t</article>
\t\t\t";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["tech_adv"]) ? $context["tech_adv"] : null), "child", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 24
            echo "\t\t\t\t<div class=\"tech-item col-md-3 col-xs-12 col-sm-6\">\t
\t\t\t\t\t<img src=\"";
            // line 25
            echo twig_escape_filter($this->env, common_url($this->getAttribute($context["item"], "image_url", array())), "html", null, true);
            echo "\" alt=\"\">
\t\t\t\t\t<h4>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "</h4>
\t\t\t\t\t<p>\t";
            // line 27
            echo $this->getAttribute($context["item"], "content", array());
            echo "</p>
\t\t\t\t</div>\t
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "\t\t</div>
\t</div>
\t";
        // line 32
        $this->loadTemplate("contact.html.twig", "tech.html.twig", 32)->display($context);
        // line 33
        echo "</body>
";
    }

    public function getTemplateName()
    {
        return "tech.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 33,  105 => 32,  101 => 30,  92 => 27,  88 => 26,  84 => 25,  81 => 24,  77 => 23,  71 => 20,  67 => 19,  63 => 17,  61 => 16,  53 => 11,  49 => 10,  43 => 7,  39 => 6,  36 => 5,  34 => 4,  31 => 3,  28 => 2,  11 => 1,);
    }
}
/* {% extends 'common/common.html.twig' %}*/
/* {% block container %}*/
/* <body class="page-tech-advantage">*/
/* 	{% include 'navigation.html.twig' %}*/
/* 	<div class="curtain filter">*/
/* 		{% set curtain = get_block("tech_banner")[0] %}	*/
/* 		<img src="{{common_url(curtain.image_url)}}" alt="">*/
/* 		<div class="curtain-content text-white row-md" style="">*/
/* 			<article>*/
/* 				<h2>{{curtain.description}}</h2>*/
/* 				<p>	{{curtain.content|raw}}</p>*/
/* 			</article>	*/
/* 		</div>*/
/* 	</div>*/
/* 	<div class="container-fluid section-container">*/
/* 		{% set tech_adv = get_block("tech_advantage")[0] %}*/
/* 		<div class="row-md">		*/
/* 			<article>*/
/* 				<h2>{{tech_adv.title}}</h2>*/
/* 				<p>	{{tech_adv.description}}</p>*/
/* 				<hr>	*/
/* 			</article>*/
/* 			{% for item in tech_adv.child %}*/
/* 				<div class="tech-item col-md-3 col-xs-12 col-sm-6">	*/
/* 					<img src="{{common_url(item.image_url)}}" alt="">*/
/* 					<h4>{{item.title}}</h4>*/
/* 					<p>	{{item.content|raw}}</p>*/
/* 				</div>	*/
/* 			{% endfor %}*/
/* 		</div>*/
/* 	</div>*/
/* 	{% include 'contact.html.twig' %}*/
/* </body>*/
/* {% endblock %}*/
/* */
