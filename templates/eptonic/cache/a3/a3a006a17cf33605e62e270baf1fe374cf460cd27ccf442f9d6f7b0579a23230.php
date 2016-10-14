<?php

/* service.html.twig */
class __TwigTemplate_c304f0d2b4db3bfae1996af1176bac7eda06965d0aae43fd6f4fb9111b4b84c1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("common/common.html.twig", "service.html.twig", 1);
        $this->blocks = array(
            'container' => array($this, 'block_container'),
            'script' => array($this, 'block_script'),
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
        echo "<body class=\"page-service\">
\t";
        // line 4
        $this->loadTemplate("navigation.html.twig", "service.html.twig", 4)->display($context);
        // line 5
        echo "\t<div class=\"curtain filter\">
\t\t";
        // line 6
        $context["curtain"] = $this->getAttribute(get_block("service_banner"), 0, array(), "array");
        echo "\t
\t\t<img src=\"";
        // line 7
        echo twig_escape_filter($this->env, common_url($this->getAttribute((isset($context["curtain"]) ? $context["curtain"] : null), "image_url", array())), "html", null, true);
        echo "\" alt=\"\">
\t\t<div class=\"curtain-content text-white row-md\" style=\"\">\t
\t\t\t<article>
\t\t\t\t<h2>";
        // line 10
        echo $this->getAttribute((isset($context["curtain"]) ? $context["curtain"] : null), "description", array());
        echo "</h2>
\t\t\t\t<p>\t";
        // line 11
        echo $this->getAttribute((isset($context["curtain"]) ? $context["curtain"] : null), "content", array());
        echo "</p>
\t\t\t</article>
\t\t</div>
\t</div>
\t<div class=\"container-fluid section-service\">
\t\t<div class=\"section \">\t
\t\t\t";
        // line 17
        $context["service"] = $this->getAttribute(get_block("service_text"), 0, array(), "array");
        // line 18
        echo "\t\t\t<div class=\"row-md\">\t\t
\t\t\t\t<article>
\t\t\t\t\t<h2>";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : null), "title", array()), "html", null, true);
        echo "</h2>
\t\t\t\t\t<p>\t";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : null), "description", array()), "html", null, true);
        echo "</p>
\t\t\t\t\t<hr>\t
\t\t\t\t</article>
\t\t\t\t";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["service"]) ? $context["service"] : null), "child", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 25
            echo "\t\t\t\t\t<div class=\"service-item col-md-4 col-sm-6\">
\t\t\t\t\t\t<div class=\"image\">\t
\t\t\t\t\t\t\t<img src=\"";
            // line 27
            echo twig_escape_filter($this->env, common_url($this->getAttribute($context["item"], "image_url", array())), "html", null, true);
            echo "\" alt=\"\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<h4>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "</h4>
\t\t\t\t\t\t<p>\t";
            // line 30
            echo $this->getAttribute($context["item"], "content", array());
            echo "</p>
\t\t\t\t\t</div>\t
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "\t\t\t</div>
\t\t</div>
\t</div>
\t<div class=\"container-fluid section-steps \">
\t\t<div class=\"section\">\t\t
\t\t";
        // line 38
        $context["steps"] = $this->getAttribute(get_block("service_info"), 0, array(), "array");
        // line 39
        echo "\t\t\t<div class=\"row-md\">
\t\t\t\t<article>
\t\t\t\t\t<h2>";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["steps"]) ? $context["steps"] : null), "title", array()), "html", null, true);
        echo "</h2>
\t\t\t\t\t<p>";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["steps"]) ? $context["steps"] : null), "description", array()), "html", null, true);
        echo "</p>
\t\t\t\t</article>
\t\t\t</div>
\t\t\t<div class=\"row-md\">
\t\t\t\t<span class=\"dotted-span col-xs-2 col-xs-offset-3\"></span>
\t\t\t\t<span class=\"col-xs-2\"><img class=\"hidden-xs\" src=\"";
        // line 47
        echo twig_escape_filter($this->env, static_url("image/platform/service-down-arrow.png"), "html", null, true);
        echo "\" alt=\"\"></span>
\t\t\t\t<span class=\"dotted-span col-xs-2\"></span>
\t\t\t</div>
\t\t\t<div class=\"row-width steps\">
\t\t\t\t<div class=\"step-odd hidden-xs\">
\t\t\t\t\t";
        // line 52
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["steps"]) ? $context["steps"] : null), "child", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            if (($this->getAttribute($context["item"], "sort", array()) % 2 == 1)) {
                // line 53
                echo "\t\t\t\t\t\t<div class=\"step-item col-md-12 col-xs-12\">
\t\t\t\t\t\t\t<div class=\"col-xs-10\">
\t\t\t\t\t\t\t\t<h4>";
                // line 55
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "description", array()), "html", null, true);
                echo "</h4>
\t\t\t\t\t\t\t    <h3>";
                // line 56
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
                echo "</h3>
\t\t\t\t\t\t\t    <p>";
                // line 57
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "content", array()), "html", null, true);
                echo "</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"col-xs-2 hidden-xs hidden-sm\">
\t\t\t\t\t\t\t\t<img src=\"";
                // line 60
                echo twig_escape_filter($this->env, common_url($this->getAttribute($context["item"], "image_url", array())), "html", null, true);
                echo "\" alt=\"\">
\t\t\t\t\t\t\t\t<span class=\"dot\"></span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo "\t\t\t\t</div>
\t\t\t\t<div class=\"hidden-sm hidden-xs dot-container\">
\t\t\t\t\t<span></span>
\t\t\t\t</div>
\t\t\t\t<div class=\"step-even hidden-xs\">
\t\t\t\t\t";
        // line 70
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["steps"]) ? $context["steps"] : null), "child", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            if (($this->getAttribute($context["item"], "sort", array()) % 2 == 0)) {
                // line 71
                echo "\t\t\t\t\t\t<div class=\"step-item col-md-12 col-xs-12\">
\t\t\t\t\t\t\t<div class=\"col-xs-2 hidden-xs hidden-sm\">
\t\t\t\t\t\t\t\t<img src=\"";
                // line 73
                echo twig_escape_filter($this->env, common_url($this->getAttribute($context["item"], "image_url", array())), "html", null, true);
                echo "\" alt=\"\">
\t\t\t\t\t\t\t\t<span class=\"dot\"></span>
\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"col-xs-10\">
\t\t\t\t\t\t\t\t<h4>";
                // line 77
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "description", array()), "html", null, true);
                echo "</h4>
\t\t\t\t\t\t\t    <h3>";
                // line 78
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
                echo "</h3>
\t\t\t\t\t\t\t    <p>";
                // line 79
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "content", array()), "html", null, true);
                echo "</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 83
        echo "\t\t\t\t</div>
\t\t\t\t<div class=\"step visible-xs\">
\t\t\t\t\t";
        // line 85
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["steps"]) ? $context["steps"] : null), "child", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 86
            echo "\t\t\t\t\t\t<div class=\"step-item col-md-12 col-xs-12\">\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"col-xs-12\">
\t\t\t\t\t\t\t\t<h4>";
            // line 88
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "description", array()), "html", null, true);
            echo "</h4>
\t\t\t\t\t\t\t    <h3>";
            // line 89
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "</h3>
\t\t\t\t\t\t\t    <p>";
            // line 90
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "content", array()), "html", null, true);
            echo "</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 93
        echo "\t\t\t\t\t
\t\t\t\t</div>\t\t\t
\t\t\t</div>
\t\t</div>
\t</div>
\t<section class=\"section section-stat show\" style=\"background-color: rgb(10, 144, 226);\">
\t\t";
        // line 99
        $context["stat"] = $this->getAttribute(get_block("index_statistic"), 0, array(), "array");
        // line 100
        echo "\t\t<h2>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["stat"]) ? $context["stat"] : null), "description", array()), "html", null, true);
        echo "</h2>
\t\t<div class=\"row\">
\t\t\t";
        // line 102
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["stat"]) ? $context["stat"] : null), "child", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 103
            echo "\t\t\t    <div class=\"stat-item\">
\t\t\t\t\t<div class=\"stat-counter counter\" data-count=\"";
            // line 104
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "\">
\t\t\t\t\t\t<span class=\"counter-p\">";
            // line 105
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "</span>
\t\t\t\t\t\t<span class=\"counter-content\">";
            // line 106
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "content", array()), "html", null, true);
            echo "</span></div>
\t\t\t\t\t<h4 class=\"stat-title\">";
            // line 107
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "description", array()), "html", null, true);
            echo "</h4>\t\t\t    \t
\t\t\t    </div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 110
        echo "
\t\t</div>
\t</section>\t
\t<section class=\"section section-partner\">
\t\t";
        // line 114
        $context["partner"] = $this->getAttribute(get_block("index_partner"), 0, array(), "array");
        // line 115
        echo "\t\t<article>
\t\t\t<h2>";
        // line 116
        echo twig_escape_filter($this->env, lang("partner"), "html", null, true);
        echo "</h2>
\t\t</article>
\t\t<hr class=\"hr-top\">

\t\t<div class=\"row-md\" id=\"slider\">
\t\t\t<div class=\"partner-container slider-container\">\t
\t\t\t\t";
        // line 122
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["partner"]) ? $context["partner"] : null), "child", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 123
            echo "\t\t\t\t\t<div class=\"partner-item slider-item\">
\t\t\t\t\t\t<img src=\"";
            // line 124
            echo twig_escape_filter($this->env, common_url($this->getAttribute($context["item"], "image_url", array())), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "\" alt=\"\">
\t\t\t\t\t</div>
\t\t\t\t    
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 128
        echo "\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["partner"]) ? $context["partner"] : null), "child", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 129
            echo "\t\t\t\t\t<div class=\"partner-item slider-item\">
\t\t\t\t\t\t<img src=\"";
            // line 130
            echo twig_escape_filter($this->env, common_url($this->getAttribute($context["item"], "image_url", array())), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "\" alt=\"\">
\t\t\t\t\t</div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 132
        echo "\t\t\t\t
\t\t\t</div>
\t\t</div>
\t</section>\t
\t";
        // line 136
        $this->loadTemplate("contact.html.twig", "service.html.twig", 136)->display($context);
        // line 137
        echo "</body>
";
    }

    // line 139
    public function block_script($context, array $blocks = array())
    {
        // line 140
        echo "\t<script>
\tvar partner = new slider({
\t\ttime:4000
\t});
\tpartner.init()
\t</script>
";
    }

    public function getTemplateName()
    {
        return "service.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  363 => 140,  360 => 139,  355 => 137,  353 => 136,  347 => 132,  336 => 130,  333 => 129,  328 => 128,  316 => 124,  313 => 123,  309 => 122,  300 => 116,  297 => 115,  295 => 114,  289 => 110,  280 => 107,  276 => 106,  272 => 105,  268 => 104,  265 => 103,  261 => 102,  255 => 100,  253 => 99,  245 => 93,  235 => 90,  231 => 89,  227 => 88,  223 => 86,  219 => 85,  215 => 83,  204 => 79,  200 => 78,  196 => 77,  189 => 73,  185 => 71,  180 => 70,  173 => 65,  161 => 60,  155 => 57,  151 => 56,  147 => 55,  143 => 53,  138 => 52,  130 => 47,  122 => 42,  118 => 41,  114 => 39,  112 => 38,  105 => 33,  96 => 30,  92 => 29,  87 => 27,  83 => 25,  79 => 24,  73 => 21,  69 => 20,  65 => 18,  63 => 17,  54 => 11,  50 => 10,  44 => 7,  40 => 6,  37 => 5,  35 => 4,  32 => 3,  29 => 2,  11 => 1,);
    }
}
/* {% extends 'common/common.html.twig' %}*/
/* {% block container %}*/
/* <body class="page-service">*/
/* 	{% include 'navigation.html.twig' %}*/
/* 	<div class="curtain filter">*/
/* 		{% set curtain = get_block("service_banner")[0] %}	*/
/* 		<img src="{{common_url(curtain.image_url)}}" alt="">*/
/* 		<div class="curtain-content text-white row-md" style="">	*/
/* 			<article>*/
/* 				<h2>{{curtain.description|raw}}</h2>*/
/* 				<p>	{{curtain.content|raw}}</p>*/
/* 			</article>*/
/* 		</div>*/
/* 	</div>*/
/* 	<div class="container-fluid section-service">*/
/* 		<div class="section ">	*/
/* 			{% set service = get_block("service_text")[0] %}*/
/* 			<div class="row-md">		*/
/* 				<article>*/
/* 					<h2>{{service.title}}</h2>*/
/* 					<p>	{{service.description}}</p>*/
/* 					<hr>	*/
/* 				</article>*/
/* 				{% for item in service.child %}*/
/* 					<div class="service-item col-md-4 col-sm-6">*/
/* 						<div class="image">	*/
/* 							<img src="{{common_url(item.image_url)}}" alt="">*/
/* 						</div>*/
/* 						<h4>{{item.title}}</h4>*/
/* 						<p>	{{item.content|raw}}</p>*/
/* 					</div>	*/
/* 				{% endfor %}*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* 	<div class="container-fluid section-steps ">*/
/* 		<div class="section">		*/
/* 		{% set steps  = get_block("service_info")[0] %}*/
/* 			<div class="row-md">*/
/* 				<article>*/
/* 					<h2>{{steps.title}}</h2>*/
/* 					<p>{{steps.description}}</p>*/
/* 				</article>*/
/* 			</div>*/
/* 			<div class="row-md">*/
/* 				<span class="dotted-span col-xs-2 col-xs-offset-3"></span>*/
/* 				<span class="col-xs-2"><img class="hidden-xs" src="{{static_url("image/platform/service-down-arrow.png")}}" alt=""></span>*/
/* 				<span class="dotted-span col-xs-2"></span>*/
/* 			</div>*/
/* 			<div class="row-width steps">*/
/* 				<div class="step-odd hidden-xs">*/
/* 					{% for item in steps.child if item.sort is odd %}*/
/* 						<div class="step-item col-md-12 col-xs-12">*/
/* 							<div class="col-xs-10">*/
/* 								<h4>{{item.description}}</h4>*/
/* 							    <h3>{{item.title}}</h3>*/
/* 							    <p>{{item.content}}</p>*/
/* 							</div>*/
/* 							<div class="col-xs-2 hidden-xs hidden-sm">*/
/* 								<img src="{{common_url(item.image_url)}}" alt="">*/
/* 								<span class="dot"></span>*/
/* 							</div>*/
/* 						</div>*/
/* 					{% endfor %}*/
/* 				</div>*/
/* 				<div class="hidden-sm hidden-xs dot-container">*/
/* 					<span></span>*/
/* 				</div>*/
/* 				<div class="step-even hidden-xs">*/
/* 					{% for item in steps.child if item.sort is even %}*/
/* 						<div class="step-item col-md-12 col-xs-12">*/
/* 							<div class="col-xs-2 hidden-xs hidden-sm">*/
/* 								<img src="{{common_url(item.image_url)}}" alt="">*/
/* 								<span class="dot"></span>*/
/* 							</div>							*/
/* 							<div class="col-xs-10">*/
/* 								<h4>{{item.description}}</h4>*/
/* 							    <h3>{{item.title}}</h3>*/
/* 							    <p>{{item.content}}</p>*/
/* 							</div>*/
/* 						</div>*/
/* 					{% endfor %}*/
/* 				</div>*/
/* 				<div class="step visible-xs">*/
/* 					{% for item in steps.child  %}*/
/* 						<div class="step-item col-md-12 col-xs-12">					*/
/* 							<div class="col-xs-12">*/
/* 								<h4>{{item.description}}</h4>*/
/* 							    <h3>{{item.title}}</h3>*/
/* 							    <p>{{item.content}}</p>*/
/* 							</div>*/
/* 						</div>*/
/* 					{% endfor %}					*/
/* 				</div>			*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* 	<section class="section section-stat show" style="background-color: rgb(10, 144, 226);">*/
/* 		{% set stat = get_block("index_statistic")[0] %}*/
/* 		<h2>{{stat.description}}</h2>*/
/* 		<div class="row">*/
/* 			{% for item in stat.child %}*/
/* 			    <div class="stat-item">*/
/* 					<div class="stat-counter counter" data-count="{{item.title}}">*/
/* 						<span class="counter-p">{{item.title}}</span>*/
/* 						<span class="counter-content">{{item.content}}</span></div>*/
/* 					<h4 class="stat-title">{{item.description}}</h4>			    	*/
/* 			    </div>*/
/* 			{% endfor %}*/
/* */
/* 		</div>*/
/* 	</section>	*/
/* 	<section class="section section-partner">*/
/* 		{% set partner = get_block("index_partner")[0] %}*/
/* 		<article>*/
/* 			<h2>{{lang("partner")}}</h2>*/
/* 		</article>*/
/* 		<hr class="hr-top">*/
/* */
/* 		<div class="row-md" id="slider">*/
/* 			<div class="partner-container slider-container">	*/
/* 				{% for item in partner.child %}*/
/* 					<div class="partner-item slider-item">*/
/* 						<img src="{{common_url(item.image_url)}}" title="{{item.title}}" alt="">*/
/* 					</div>*/
/* 				    */
/* 				{% endfor %}*/
/* 				{% for item in partner.child %}*/
/* 					<div class="partner-item slider-item">*/
/* 						<img src="{{common_url(item.image_url)}}" title="{{item.title}}" alt="">*/
/* 					</div>*/
/* 				{% endfor %}				*/
/* 			</div>*/
/* 		</div>*/
/* 	</section>	*/
/* 	{% include 'contact.html.twig' %}*/
/* </body>*/
/* {% endblock %}*/
/* {% block script %}*/
/* 	<script>*/
/* 	var partner = new slider({*/
/* 		time:4000*/
/* 	});*/
/* 	partner.init()*/
/* 	</script>*/
/* {% endblock %}*/
/* */
