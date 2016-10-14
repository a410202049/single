<?php

/* navigation.html.twig */
class __TwigTemplate_21c470bd873322712ca78dbc84c44d473870c569a8eef53d35116aeacab52a5c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"nav navbar-fixed-top container-fluid ";
        if (($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "current_lang", array()) == "en_us")) {
            echo " font-en";
        }
        echo "\">
\t<div class=\"nav-img\">
\t\t<img src=\"";
        // line 3
        echo twig_escape_filter($this->env, static_url("image/logo.png"), "html", null, true);
        echo "\" alt=\"\">
\t</div>
\t<i class=\"glyphicon glyphicon-menu-hamburger nav-control\"></i>
\t<div class=\"language-control hidden-xs\">
\t\t<div class=\"btn-group\" >
\t\t\t<a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "domains", array()), "zh_cn", array(), "array"), "domain", array(), "array"), "html", null, true);
        echo "\" class=\"btn button ";
        if (($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "current_lang", array()) == "zh_cn")) {
            echo "active";
        }
        echo " \"data-lang=\"zh_cn\">";
        echo twig_escape_filter($this->env, lang("zh_cn"), "html", null, true);
        echo "</a>
\t\t\t<a href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "domains", array()), "en_us", array(), "array"), "domain", array(), "array"), "html", null, true);
        echo "\" class=\"btn button  ";
        if (($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "current_lang", array()) == "en_us")) {
            echo "active";
        }
        echo " \"data-lang=\"en_us\">";
        echo twig_escape_filter($this->env, lang("en_us"), "html", null, true);
        echo "</a>
\t\t</div>
\t</div>\t
\t<ul class=\"nav-list\">
\t\t<div class=\"second-nav-container\"></div>
\t\t";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["navs"]) ? $context["navs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["nav"]) {
            // line 15
            echo "\t\t\t";
            if (twig_test_iterable($this->getAttribute($context["nav"], "child", array()))) {
                // line 16
                echo "\t\t\t\t<li class=\"nav-item dropdown \">
\t\t\t\t\t";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute($context["nav"], "name", array()), "html", null, true);
                echo "
\t\t\t\t\t<ul class=\"second-nav-list\">
\t\t\t\t\t\t<span class=\"arrow-up\"></span>
\t\t\t\t\t\t";
                // line 20
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["nav"], "child", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 21
                    echo "\t\t\t\t\t\t    <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "url", array()), "html", null, true);
                    echo "\"><li class=\"second-nav-item nav-hover ";
                    if (($this->getAttribute($context["item"], "active", array()) == "true")) {
                        echo " active";
                    }
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                    echo "</li></a>
\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 23
                echo "\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t\t";
            } else {
                // line 26
                echo "\t\t\t\t<a href=\"/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["nav"], "url", array()), "html", null, true);
                echo "\" target=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["nav"], "target", array()), "html", null, true);
                echo "\">
\t\t\t\t\t<li class=\"nav-item nav-hover ";
                // line 27
                if (($this->getAttribute($context["nav"], "active", array()) == "true")) {
                    echo " active";
                }
                echo "\">
\t\t\t\t\t\t";
                // line 28
                echo twig_escape_filter($this->env, $this->getAttribute($context["nav"], "name", array()), "html", null, true);
                echo "
\t\t\t\t\t</li>
\t\t\t\t</a>
\t\t\t\t    
\t\t\t";
            }
            // line 33
            echo "\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['nav'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "\t</ul>
</div>";
    }

    public function getTemplateName()
    {
        return "navigation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 34,  120 => 33,  112 => 28,  106 => 27,  99 => 26,  94 => 23,  79 => 21,  75 => 20,  69 => 17,  66 => 16,  63 => 15,  59 => 14,  45 => 9,  35 => 8,  27 => 3,  19 => 1,);
    }
}
/* <div class="nav navbar-fixed-top container-fluid {% if site.current_lang == "en_us" %} font-en{% endif %}">*/
/* 	<div class="nav-img">*/
/* 		<img src="{{static_url('image/logo.png')}}" alt="">*/
/* 	</div>*/
/* 	<i class="glyphicon glyphicon-menu-hamburger nav-control"></i>*/
/* 	<div class="language-control hidden-xs">*/
/* 		<div class="btn-group" >*/
/* 			<a href="{{site.domains["zh_cn"]["domain"]}}" class="btn button {% if site.current_lang == "zh_cn" %}active{% endif %} "data-lang="zh_cn">{{lang("zh_cn")}}</a>*/
/* 			<a href="{{site.domains["en_us"]["domain"]}}" class="btn button  {% if site.current_lang == "en_us" %}active{% endif %} "data-lang="en_us">{{lang('en_us')}}</a>*/
/* 		</div>*/
/* 	</div>	*/
/* 	<ul class="nav-list">*/
/* 		<div class="second-nav-container"></div>*/
/* 		{% for nav in navs  %}*/
/* 			{% if nav.child is iterable %}*/
/* 				<li class="nav-item dropdown ">*/
/* 					{{nav.name}}*/
/* 					<ul class="second-nav-list">*/
/* 						<span class="arrow-up"></span>*/
/* 						{% for item in nav.child %}*/
/* 						    <a href="{{item.url}}"><li class="second-nav-item nav-hover {% if item.active == "true" %} active{% endif %}">{{item.name}}</li></a>*/
/* 						{% endfor %}*/
/* 					</ul>*/
/* 				</li>*/
/* 				{% else %}*/
/* 				<a href="/{{nav.url}}" target="{{nav.target}}">*/
/* 					<li class="nav-item nav-hover {% if nav.active == "true" %} active{% endif %}">*/
/* 						{{nav.name}}*/
/* 					</li>*/
/* 				</a>*/
/* 				    */
/* 			{% endif %}*/
/* 		{% endfor %}*/
/* 	</ul>*/
/* </div>*/
