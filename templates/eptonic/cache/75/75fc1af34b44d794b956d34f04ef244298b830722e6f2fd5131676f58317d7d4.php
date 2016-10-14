<?php

/* social.html.twig */
class __TwigTemplate_dca866a6e7f757e907db216e187ecbd68409eccb541c12db7b4c298ed344bcf5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("common/common.html.twig", "social.html.twig", 1);
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
        echo "
<body class=\"page-social\">
\t";
        // line 5
        $this->loadTemplate("navigation.html.twig", "social.html.twig", 5)->display($context);
        // line 6
        echo "\t<div class=\"curtain\">
\t\t";
        // line 7
        $context["curtain"] = $this->getAttribute(get_block("social_block"), 0, array(), "array");
        echo "\t
\t\t<img src=\"";
        // line 8
        echo twig_escape_filter($this->env, common_url($this->getAttribute((isset($context["curtain"]) ? $context["curtain"] : null), "image_url", array())), "html", null, true);
        echo "\" alt=\"\">
\t\t<div class=\"curtain-content text-white row-md\">
\t\t\t<article>
\t\t\t\t<h2>";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["curtain"]) ? $context["curtain"] : null), "title", array()), "html", null, true);
        echo "</h2>
\t\t\t\t<h3>";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["curtain"]) ? $context["curtain"] : null), "description", array()), "html", null, true);
        echo "</h3>
\t\t\t</article>\t
\t\t</div>
\t</div>
\t<div class=\"container-fluid no-pd\">
\t\t";
        // line 17
        $context["social"] = $this->getAttribute(get_block("social_block"), 0, array(), "array");
        // line 18
        echo "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["social"]) ? $context["social"] : null), "child", array()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 19
            echo "\t\t\t\t";
            if (($this->getAttribute($context["loop"], "index", array()) % 2 == 1)) {
                // line 20
                echo "\t\t\t\t    <div class=\"section social-left\">
\t\t\t\t    \t<div class=\"row-md\">
\t\t\t\t    \t\t<div class=\"col-sm-6 social-content \">
\t\t\t\t    \t\t\t<h3>";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
                echo "</h3>
\t\t\t\t    \t\t\t<p>";
                // line 24
                echo $this->getAttribute($context["item"], "content", array());
                echo "</p>
\t\t\t\t    \t\t</div>
\t\t\t\t    \t\t<div class=\"col-sm-6 social-image\">
\t\t\t\t    \t\t\t<img src=\"";
                // line 27
                echo twig_escape_filter($this->env, common_url($this->getAttribute($context["item"], "image_url", array())), "html", null, true);
                echo "\" alt=\"\">
\t\t\t\t    \t\t</div>
\t\t\t\t    \t</div>
\t\t\t\t    </div>
\t\t\t\t\t";
            } else {
                // line 32
                echo " \t\t\t\t    <div class=\"section social-right bg\">
\t\t\t\t    \t<div class=\"row-md\">
\t\t\t\t    \t\t<div class=\"col-sm-6 social-image\">
\t\t\t\t    \t\t\t<img src=\"";
                // line 35
                echo twig_escape_filter($this->env, common_url($this->getAttribute($context["item"], "image_url", array())), "html", null, true);
                echo "\" alt=\"\">
\t\t\t\t    \t\t</div>
\t\t\t\t    \t\t<div class=\"col-sm-6 social-content\">
\t\t\t\t    \t\t\t<h3>";
                // line 38
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
                echo "</h3>
\t\t\t\t    \t\t\t<p>";
                // line 39
                echo $this->getAttribute($context["item"], "content", array());
                echo "</p>
\t\t\t\t    \t\t</div>
\t\t\t\t    \t</div>
\t\t\t\t    </div>   
\t\t\t\t";
            }
            // line 44
            echo "\t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "\t</div>
\t";
        // line 46
        $this->loadTemplate("contact.html.twig", "social.html.twig", 46)->display($context);
        // line 47
        echo "</body>
";
    }

    public function getTemplateName()
    {
        return "social.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 47,  148 => 46,  145 => 45,  131 => 44,  123 => 39,  119 => 38,  113 => 35,  108 => 32,  100 => 27,  94 => 24,  90 => 23,  85 => 20,  82 => 19,  64 => 18,  62 => 17,  54 => 12,  50 => 11,  44 => 8,  40 => 7,  37 => 6,  35 => 5,  31 => 3,  28 => 2,  11 => 1,);
    }
}
/* {% extends 'common/common.html.twig' %}*/
/* {% block container %}*/
/* */
/* <body class="page-social">*/
/* 	{% include 'navigation.html.twig' %}*/
/* 	<div class="curtain">*/
/* 		{% set curtain = get_block("social_block")[0] %}	*/
/* 		<img src="{{common_url(curtain.image_url)}}" alt="">*/
/* 		<div class="curtain-content text-white row-md">*/
/* 			<article>*/
/* 				<h2>{{curtain.title}}</h2>*/
/* 				<h3>{{curtain.description}}</h3>*/
/* 			</article>	*/
/* 		</div>*/
/* 	</div>*/
/* 	<div class="container-fluid no-pd">*/
/* 		{% set social = get_block("social_block")[0] %}*/
/* 			{% for item in social.child %}*/
/* 				{% if loop.index is odd %}*/
/* 				    <div class="section social-left">*/
/* 				    	<div class="row-md">*/
/* 				    		<div class="col-sm-6 social-content ">*/
/* 				    			<h3>{{item.title}}</h3>*/
/* 				    			<p>{{item.content|raw}}</p>*/
/* 				    		</div>*/
/* 				    		<div class="col-sm-6 social-image">*/
/* 				    			<img src="{{common_url(item.image_url)}}" alt="">*/
/* 				    		</div>*/
/* 				    	</div>*/
/* 				    </div>*/
/* 					{% else %}*/
/*  				    <div class="section social-right bg">*/
/* 				    	<div class="row-md">*/
/* 				    		<div class="col-sm-6 social-image">*/
/* 				    			<img src="{{common_url(item.image_url)}}" alt="">*/
/* 				    		</div>*/
/* 				    		<div class="col-sm-6 social-content">*/
/* 				    			<h3>{{item.title}}</h3>*/
/* 				    			<p>{{item.content|raw}}</p>*/
/* 				    		</div>*/
/* 				    	</div>*/
/* 				    </div>   */
/* 				{% endif %}*/
/* 			{% endfor %}*/
/* 	</div>*/
/* 	{% include 'contact.html.twig' %}*/
/* </body>*/
/* {% endblock %}*/
/* */
