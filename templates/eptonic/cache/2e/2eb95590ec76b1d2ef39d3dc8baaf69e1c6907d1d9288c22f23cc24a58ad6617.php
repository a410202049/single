<?php

/* navigation.html.twig */
class __TwigTemplate_3c21b199c4301a7da590a9bb56a23fb388fafe38c45e2b85320d5c34f1282c9c extends Twig_Template
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
\t<span class=\"nav-control\">\t<i class=\"glyphicon glyphicon-menu-hamburger \"></i></span>
\t<div class=\"language-control hidden-xs\">
\t\t<div class=\"btn-group\" >
";
        // line 9
        echo "\t\t\t<a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "domains", array()), "zh_cn", array(), "array"), "domain", array(), "array"), "html", null, true);
        echo "\" class=\"btn button ";
        if (($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "current_lang", array()) == "zh_cn")) {
            echo "active";
        }
        echo " \"data-lang=\"zh_cn\">";
        echo twig_escape_filter($this->env, lang("zh_cn"), "html", null, true);
        echo "</a>
\t\t\t<a href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "domains", array()), "en_us", array()), "domain", array()), "html", null, true);
        echo "\" class=\"btn button  ";
        if (($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "current_lang", array()) == "en_us")) {
            echo "active";
        }
        echo " \"data-lang=\"en_us\">";
        echo twig_escape_filter($this->env, lang("en_us"), "html", null, true);
        echo "</a>
\t\t</div>
\t</div>\t
\t<ul class=\"nav-list hidden-xs\">
\t\t<div class=\"second-nav-container\"></div>
\t\t";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["navs"]) ? $context["navs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["nav"]) {
            // line 16
            echo "\t\t\t";
            if (twig_test_iterable($this->getAttribute($context["nav"], "child", array()))) {
                // line 17
                echo "\t\t\t\t<li class=\"nav-item dropdown \">
\t\t\t\t\t";
                // line 18
                echo twig_escape_filter($this->env, $this->getAttribute($context["nav"], "name", array()), "html", null, true);
                echo "
\t\t\t\t\t<ul class=\"second-nav-list\">
\t\t\t\t\t\t<span class=\"arrow-up\"></span>
\t\t\t\t\t\t";
                // line 21
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["nav"], "child", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 22
                    echo "\t\t\t\t\t\t    <a href=\"/";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "url", array()), "html", null, true);
                    echo "\" target=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "target", array()), "html", null, true);
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
                // line 24
                echo "\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t\t";
            } else {
                // line 27
                echo "\t\t\t\t<a href=\"/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["nav"], "url", array()), "html", null, true);
                echo "\" target=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["nav"], "target", array()), "html", null, true);
                echo "\">
\t\t\t\t\t<li class=\"nav-item nav-hover ";
                // line 28
                if (($this->getAttribute($context["nav"], "active", array()) == "true")) {
                    echo " active";
                }
                echo "\">
\t\t\t\t\t\t";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute($context["nav"], "name", array()), "html", null, true);
                echo "
\t\t\t\t\t</li>
\t\t\t\t</a>
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
\t<ul class=\"nav-list-mobile hide\">\t
\t\t";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["navs"]) ? $context["navs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["nav"]) {
            // line 37
            echo "\t\t\t";
            if (twig_test_iterable($this->getAttribute($context["nav"], "child", array()))) {
                // line 38
                echo "\t\t\t\t\t\t<a href=\"javascript:void(0)\" target=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "target", array()), "html", null, true);
                echo "\"><li data-target=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["nav"], "id", array()), "html", null, true);
                echo "\" class=\"nav-item has-child ";
                if (($this->getAttribute($context["nav"], "active", array()) == "true")) {
                    echo " active";
                }
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["nav"], "name", array()), "html", null, true);
                echo "</li></a>
\t\t\t\t\t\t<ul class=\"child-nav hide\" id=\"";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute($context["nav"], "id", array()), "html", null, true);
                echo "\">\t\t\t\t
\t\t\t\t\t\t\t";
                // line 40
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["nav"], "child", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 41
                    echo "\t\t\t\t\t\t\t    <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "url", array()), "html", null, true);
                    echo "\" target=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "target", array()), "html", null, true);
                    echo "\"><li class=\"nav-item second-nav-item ";
                    if (($this->getAttribute($context["item"], "active", array()) == "true")) {
                        echo " active";
                    }
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                    echo "</li></a>
\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 43
                echo "\t\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t\t";
            } else {
                // line 46
                echo "\t\t\t\t<a href=\"/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["nav"], "url", array()), "html", null, true);
                echo "\" target=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["nav"], "target", array()), "html", null, true);
                echo "\">
\t\t\t\t\t<li class=\"nav-item";
                // line 47
                if (($this->getAttribute($context["nav"], "active", array()) == "true")) {
                    echo " active";
                }
                echo "\">
\t\t\t\t\t\t";
                // line 48
                echo twig_escape_filter($this->env, $this->getAttribute($context["nav"], "name", array()), "html", null, true);
                echo "
\t\t\t\t\t</li>
\t\t\t\t</a>
\t\t\t";
            }
            // line 52
            echo "\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['nav'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "\t\t";
        if (($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "current_lang", array()) == "zh_cn")) {
            // line 54
            echo "\t\t\t<a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "domains", array()), "en_us", array()), "domain", array()), "html", null, true);
            echo "\" data-lang=\"en_us\"><li class=\"nav-item\">";
            echo twig_escape_filter($this->env, lang("change_lang"), "html", null, true);
            echo "</li></a>
\t\t\t";
        } else {
            // line 56
            echo "\t\t\t<a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "domains", array()), "zh_cn", array()), "domain", array()), "html", null, true);
            echo "\" data-lang=\"zh_cn\"><li class=\"nav-item\">";
            echo twig_escape_filter($this->env, lang("change_lang"), "html", null, true);
            echo "</li></a>  \t
\t\t";
        }
        // line 58
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
        return array (  227 => 58,  219 => 56,  211 => 54,  208 => 53,  202 => 52,  195 => 48,  189 => 47,  182 => 46,  177 => 43,  160 => 41,  156 => 40,  152 => 39,  139 => 38,  136 => 37,  132 => 36,  128 => 34,  122 => 33,  115 => 29,  109 => 28,  102 => 27,  97 => 24,  80 => 22,  76 => 21,  70 => 18,  67 => 17,  64 => 16,  60 => 15,  46 => 10,  35 => 9,  27 => 3,  19 => 1,);
    }
}
/* <div class="nav navbar-fixed-top container-fluid {% if site.current_lang == "en_us" %} font-en{% endif %}">*/
/* 	<div class="nav-img">*/
/* 		<img src="{{static_url('image/logo.png')}}" alt="">*/
/* 	</div>*/
/* 	<span class="nav-control">	<i class="glyphicon glyphicon-menu-hamburger "></i></span>*/
/* 	<div class="language-control hidden-xs">*/
/* 		<div class="btn-group" >*/
/* {# 			{{site|dump}} #}*/
/* 			<a href="{{site.domains["zh_cn"]["domain"]}}" class="btn button {% if site.current_lang == "zh_cn" %}active{% endif %} "data-lang="zh_cn">{{lang("zh_cn")}}</a>*/
/* 			<a href="{{site.domains.en_us.domain}}" class="btn button  {% if site.current_lang == "en_us" %}active{% endif %} "data-lang="en_us">{{lang('en_us')}}</a>*/
/* 		</div>*/
/* 	</div>	*/
/* 	<ul class="nav-list hidden-xs">*/
/* 		<div class="second-nav-container"></div>*/
/* 		{% for nav in navs  %}*/
/* 			{% if nav.child is iterable %}*/
/* 				<li class="nav-item dropdown ">*/
/* 					{{nav.name}}*/
/* 					<ul class="second-nav-list">*/
/* 						<span class="arrow-up"></span>*/
/* 						{% for item in nav.child %}*/
/* 						    <a href="/{{item.url}}" target="{{item.target}}"><li class="second-nav-item nav-hover {% if item.active == "true" %} active{% endif %}">{{item.name}}</li></a>*/
/* 						{% endfor %}*/
/* 					</ul>*/
/* 				</li>*/
/* 				{% else %}*/
/* 				<a href="/{{nav.url}}" target="{{nav.target}}">*/
/* 					<li class="nav-item nav-hover {% if nav.active == "true" %} active{% endif %}">*/
/* 						{{nav.name}}*/
/* 					</li>*/
/* 				</a>*/
/* 			{% endif %}*/
/* 		{% endfor %}*/
/* 	</ul>*/
/* 	<ul class="nav-list-mobile hide">	*/
/* 		{% for nav in navs  %}*/
/* 			{% if nav.child is iterable %}*/
/* 						<a href="javascript:void(0)" target="{{item.target}}"><li data-target="{{nav.id}}" class="nav-item has-child {% if nav.active == "true" %} active{% endif %}">{{nav.name}}</li></a>*/
/* 						<ul class="child-nav hide" id="{{nav.id}}">				*/
/* 							{% for item in nav.child %}*/
/* 							    <a href="{{item.url}}" target="{{item.target}}"><li class="nav-item second-nav-item {% if item.active == "true" %} active{% endif %}">{{item.name}}</li></a>*/
/* 							{% endfor %}*/
/* 						</ul>*/
/* 				</li>*/
/* 				{% else %}*/
/* 				<a href="/{{nav.url}}" target="{{nav.target}}">*/
/* 					<li class="nav-item{% if nav.active == "true" %} active{% endif %}">*/
/* 						{{nav.name}}*/
/* 					</li>*/
/* 				</a>*/
/* 			{% endif %}*/
/* 		{% endfor %}*/
/* 		{% if site.current_lang == 'zh_cn' %}*/
/* 			<a href="{{site.domains.en_us.domain}}" data-lang="en_us"><li class="nav-item">{{lang('change_lang')}}</li></a>*/
/* 			{% else %}*/
/* 			<a href="{{site.domains.zh_cn.domain}}" data-lang="zh_cn"><li class="nav-item">{{lang('change_lang')}}</li></a>  	*/
/* 		{% endif %}*/
/* 	</ul>*/
/* </div>*/
