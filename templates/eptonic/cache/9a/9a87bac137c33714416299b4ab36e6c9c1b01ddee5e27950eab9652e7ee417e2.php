<?php

/* article.html.twig */
class __TwigTemplate_0150bb827079f4c98c4d26f4f2b6eaeab6bb6c0a1bc959cdc5e57bc5c1cc5b96 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("common/common.html.twig", "article.html.twig", 1);
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
        echo "<body>
\t";
        // line 4
        $this->loadTemplate("navigation.html.twig", "article.html.twig", 4)->display($context);
        // line 5
        echo "\t<div class=\"container-fluid article-container\">
\t\t<div class=\"article-header row-md\">
\t\t\t<span for=\"\" class=\"article-category\">
\t\t\t\t";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["article"]) ? $context["article"] : null), "category", array()), "name", array()), "html", null, true);
        echo "
\t\t\t</span>
\t\t</div>
\t\t<article class=\"row-md article-content\">
\t\t\t<h3 class=\"article-title\">
\t\t\t\t";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "title", array()), "html", null, true);
        echo "
\t\t\t</h3>
\t\t\t<h5>
\t\t\t\t<span>";
        // line 16
        echo twig_escape_filter($this->env, lang("publisher"), "html", null, true);
        echo ":";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["article"]) ? $context["article"] : null), "publisher", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["article"]) ? $context["article"] : null), "publisher", array()), " -")) : (" -")), "html", null, true);
        echo "</span>
\t\t\t\t<span>";
        // line 17
        echo twig_escape_filter($this->env, lang("publish_time"), "html", null, true);
        echo ":";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "release_time", array()), "html", null, true);
        echo "</span>
\t\t\t</h5>
\t\t\t";
        // line 19
        echo $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "content", array());
        echo "
\t\t</article>
\t\t<div class=\"article-footer row-md\">
\t\t\t<a class=\"button ";
        // line 22
        if ($this->getAttribute((isset($context["article"]) ? $context["article"] : null), "prev", array())) {
            echo "button-active";
        }
        echo "\" ";
        if ($this->getAttribute((isset($context["article"]) ? $context["article"] : null), "prev", array())) {
            // line 23
            echo "\t\t\t\thref=\"/article/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["article"]) ? $context["article"] : null), "prev", array()), "id", array()), "html", null, true);
            echo "\"
\t\t\t";
        }
        // line 24
        echo ">";
        echo twig_escape_filter($this->env, lang("previous"), "html", null, true);
        echo "</a>
\t\t\t<a class=\"button ";
        // line 25
        if ($this->getAttribute((isset($context["article"]) ? $context["article"] : null), "next", array())) {
            echo "button-active";
        }
        echo "\" ";
        if ($this->getAttribute((isset($context["article"]) ? $context["article"] : null), "next", array())) {
            // line 26
            echo "\t\t\t\thref=\"/article/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["article"]) ? $context["article"] : null), "next", array()), "id", array()), "html", null, true);
            echo "\"
\t\t\t";
        }
        // line 27
        echo ">";
        echo twig_escape_filter($this->env, lang("next"), "html", null, true);
        echo "</a>
\t\t</div>
\t</div>
\t";
        // line 30
        $this->loadTemplate("contact.html.twig", "article.html.twig", 30)->display($context);
        // line 31
        echo "</body>
";
    }

    public function getTemplateName()
    {
        return "article.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 31,  110 => 30,  103 => 27,  97 => 26,  91 => 25,  86 => 24,  80 => 23,  74 => 22,  68 => 19,  61 => 17,  55 => 16,  49 => 13,  41 => 8,  36 => 5,  34 => 4,  31 => 3,  28 => 2,  11 => 1,);
    }
}
/* {% extends 'common/common.html.twig' %}*/
/* {% block container %}*/
/* <body>*/
/* 	{% include 'navigation.html.twig' %}*/
/* 	<div class="container-fluid article-container">*/
/* 		<div class="article-header row-md">*/
/* 			<span for="" class="article-category">*/
/* 				{{article.category.name}}*/
/* 			</span>*/
/* 		</div>*/
/* 		<article class="row-md article-content">*/
/* 			<h3 class="article-title">*/
/* 				{{article.title}}*/
/* 			</h3>*/
/* 			<h5>*/
/* 				<span>{{lang("publisher")}}:{{article.publisher|default(" -")}}</span>*/
/* 				<span>{{lang("publish_time")}}:{{article.release_time}}</span>*/
/* 			</h5>*/
/* 			{{article.content|raw}}*/
/* 		</article>*/
/* 		<div class="article-footer row-md">*/
/* 			<a class="button {% if article.prev %}button-active{% endif %}" {% if article.prev %}*/
/* 				href="/article/{{article.prev.id}}"*/
/* 			{% endif %}>{{lang("previous")}}</a>*/
/* 			<a class="button {% if article.next %}button-active{% endif %}" {% if article.next %}*/
/* 				href="/article/{{article.next.id}}"*/
/* 			{% endif %}>{{lang("next")}}</a>*/
/* 		</div>*/
/* 	</div>*/
/* 	{% include 'contact.html.twig' %}*/
/* </body>*/
/* {% endblock %}*/
