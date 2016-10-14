<?php

/* contact.html.twig */
class __TwigTemplate_2b3e6db8d95f9633c02c61fa061604d34abba9b1dac2f946d79f4f7942a685eb extends Twig_Template
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
        echo "<footer class=\"section footer-home container-fluid\">
\t<div class=\"row-md row-email\">
\t\t<h4 class=\"pull-left\">
\t\t\t";
        // line 4
        echo twig_escape_filter($this->env, lang("contact"), "html", null, true);
        echo "<span></span><a href=\"mailto:";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "email", array()), "html", null, true);
        echo "\">Eptonic</a>
\t\t</h4>
\t</div>
\t<div class=\"row-md row-contact\">
\t\t
\t\t<h4 class=\"pull-left\">";
        // line 9
        echo twig_escape_filter($this->env, lang("phone"), "html", null, true);
        echo ":";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "phone", array()), "html", null, true);
        echo "</h4>
\t</div>
\t<div class=\"row-md row-contact\">
\t\t<h4 class=\"pull-left\">";
        // line 12
        echo twig_escape_filter($this->env, lang("email"), "html", null, true);
        echo ":<a href=\"mailto:";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "email", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "email", array()), "html", null, true);
        echo "</a></h4>
\t\t<div class=\"pull-right\">
\t\t\t";
        // line 14
        $context["contact"] = $this->getAttribute(get_block("contact_block"), 0, array(), "array");
        // line 15
        echo "\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["contact"]) ? $context["contact"] : null), "child", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 16
            echo "\t\t\t\t    ";
            if (($this->getAttribute($context["item"], "id", array()) == 77)) {
                // line 17
                echo "\t\t\t\t\t\t<div class=\"contact-item hidden-xs contact-wechat\">
\t\t\t\t\t\t\t<img src=\"";
                // line 18
                echo twig_escape_filter($this->env, common_url($this->getAttribute($context["item"], "image_url", array())), "html", null, true);
                echo "\" alt=\"\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t<div class=\"wechat-code\">
\t\t\t\t\t\t\t\t<img src=\"";
                // line 20
                echo twig_escape_filter($this->env, static_url("image/wechat-code.jpg"), "html", null, true);
                echo "\" alt=\"\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
            } else {
                // line 24
                echo "\t\t\t\t\t\t<div class=\"contact-item hidden-xs\">
\t\t\t\t\t\t\t<a href=\"";
                // line 25
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "url", array()), "html", null, true);
                echo "\" target=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "target", array()), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
                echo "\"><img src=\"";
                echo twig_escape_filter($this->env, common_url($this->getAttribute($context["item"], "image_url", array())), "html", null, true);
                echo "\" alt=\"\"></a>
\t\t\t\t\t\t</div>
\t\t\t\t    ";
            }
            // line 28
            echo "\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "\t\t</div>
\t</div>
\t<div class=\"row-md row-address\">
\t\t<h5 class=\"pull-left\">";
        // line 32
        echo twig_escape_filter($this->env, lang("address"), "html", null, true);
        echo ":";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "address", array()), "html", null, true);
        echo "</h5>
\t\t<h5 class=\"pull-right\">&copy; Copyright 2016 Eptonic. All Rights Reserved. <a href=\"/private\">Private Policy</a></h5>
\t</div>
</footer>
";
    }

    public function getTemplateName()
    {
        return "contact.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 32,  99 => 29,  93 => 28,  81 => 25,  78 => 24,  71 => 20,  64 => 18,  61 => 17,  58 => 16,  53 => 15,  51 => 14,  42 => 12,  34 => 9,  24 => 4,  19 => 1,);
    }
}
/* <footer class="section footer-home container-fluid">*/
/* 	<div class="row-md row-email">*/
/* 		<h4 class="pull-left">*/
/* 			{{lang('contact')}}<span></span><a href="mailto:{{site.email}}">Eptonic</a>*/
/* 		</h4>*/
/* 	</div>*/
/* 	<div class="row-md row-contact">*/
/* 		*/
/* 		<h4 class="pull-left">{{lang('phone')}}:{{site.phone}}</h4>*/
/* 	</div>*/
/* 	<div class="row-md row-contact">*/
/* 		<h4 class="pull-left">{{lang("email")}}:<a href="mailto:{{site.email}}">{{site.email}}</a></h4>*/
/* 		<div class="pull-right">*/
/* 			{% set contact = get_block("contact_block")[0] %}*/
/* 				{% for item in contact.child %}*/
/* 				    {% if item.id==77 %}*/
/* 						<div class="contact-item hidden-xs contact-wechat">*/
/* 							<img src="{{common_url(item.image_url)}}" alt="" title="{{item.title}}">*/
/* 							<div class="wechat-code">*/
/* 								<img src="{{static_url('image/wechat-code.jpg')}}" alt="">*/
/* 							</div>*/
/* 						</div>*/
/* 					{% else %}*/
/* 						<div class="contact-item hidden-xs">*/
/* 							<a href="{{item.url}}" target="{{item.target}}" title="{{item.title}}"><img src="{{common_url(item.image_url)}}" alt=""></a>*/
/* 						</div>*/
/* 				    {% endif %}*/
/* 				{% endfor %}*/
/* 		</div>*/
/* 	</div>*/
/* 	<div class="row-md row-address">*/
/* 		<h5 class="pull-left">{{lang("address")}}:{{site.address}}</h5>*/
/* 		<h5 class="pull-right">&copy; Copyright 2016 Eptonic. All Rights Reserved. <a href="/private">Private Policy</a></h5>*/
/* 	</div>*/
/* </footer>*/
/* */
