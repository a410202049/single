<?php

/* common/common.html.twig */
class __TwigTemplate_43dbaf4181454688bedffc5b2d80b2b0c55282763566c6b53f26475b854ccff1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'style' => array($this, 'block_style'),
            'container' => array($this, 'block_container'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["site"] = get_site_info();
        // line 2
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <meta name=\"renderer\" content=\"webkit\">
        <meta http-equiv=\"Cache-Control\" content=\"no-siteapp\" />
        <title>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "site_name", array()), "html", null, true);
        echo "</title>
        <meta name=\"keywords\" content=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "keywords", array()), "html", null, true);
        echo "\">
        <meta name=\"description\" content=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "description", array()), "html", null, true);
        echo "\">
        <!--[if lt IE 9]>
        <meta http-equiv=\"refresh\" content=\"0;ie.html\" />
        <![endif]-->
        <link rel=\"shortcut icon\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, static_url("image/favicon.ico"), "html", null, true);
        echo "\">
        <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, common_url("sites/44/css/animate.css"), "html", null, true);
        echo "?v=1474956664683\" rel=\"stylesheet\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, static_url("css/style.css"), "html", null, true);
        echo "?v=1474956664683\">
        <script src=\"";
        // line 19
        echo twig_escape_filter($this->env, common_url("sites/common/js/jquery.min.js"), "html", null, true);
        echo "?v=1474956664683\"></script>
        <script src=\"";
        // line 20
        echo twig_escape_filter($this->env, common_url("sites/common/js/analytic.js"), "html", null, true);
        echo "?v=1474956664683\"></script>
        <script src=\"";
        // line 21
        echo twig_escape_filter($this->env, common_url("sites/common/js/bootstrap.min.js"), "html", null, true);
        echo "?v=1474956664683\"></script>
        
        ";
        // line 23
        $this->displayBlock('style', $context, $blocks);
        // line 24
        echo "    </head>
    ";
        // line 25
        $this->displayBlock('container', $context, $blocks);
        // line 26
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, static_url("js/common.js"), "html", null, true);
        echo "?v=1474956664683\"></script>
    ";
        // line 27
        $this->displayBlock('script', $context, $blocks);
        // line 33
        echo "</html>";
    }

    // line 23
    public function block_style($context, array $blocks = array())
    {
    }

    // line 25
    public function block_container($context, array $blocks = array())
    {
    }

    // line 27
    public function block_script($context, array $blocks = array())
    {
        // line 28
        echo "        <script>
          ga('create', 'UA-84294090-1', 'auto');
          ga('send', 'pageview');
        </script>
    ";
    }

    public function getTemplateName()
    {
        return "common/common.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 28,  102 => 27,  97 => 25,  92 => 23,  88 => 33,  86 => 27,  81 => 26,  79 => 25,  76 => 24,  74 => 23,  69 => 21,  65 => 20,  61 => 19,  57 => 18,  53 => 17,  49 => 16,  42 => 12,  38 => 11,  34 => 10,  24 => 2,  22 => 1,);
    }
}
/* {% set site = get_site_info() %}*/
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="utf-8">*/
/*         <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*         <meta name="viewport" content="width=device-width, initial-scale=1.0">*/
/*         <meta name="renderer" content="webkit">*/
/*         <meta http-equiv="Cache-Control" content="no-siteapp" />*/
/*         <title>{{site.site_name}}</title>*/
/*         <meta name="keywords" content="{{site.keywords}}">*/
/*         <meta name="description" content="{{site.description}}">*/
/*         <!--[if lt IE 9]>*/
/*         <meta http-equiv="refresh" content="0;ie.html" />*/
/*         <![endif]-->*/
/*         <link rel="shortcut icon" href="{{static_url("image/favicon.ico")}}">*/
/*         <link href="{{common_url('sites/44/css/animate.css')}}?v=1474956664683" rel="stylesheet">*/
/*         <link rel="stylesheet" type="text/css" href="{{static_url('css/style.css')}}?v=1474956664683">*/
/*         <script src="{{common_url('sites/common/js/jquery.min.js')}}?v=1474956664683"></script>*/
/*         <script src="{{common_url('sites/common/js/analytic.js')}}?v=1474956664683"></script>*/
/*         <script src="{{common_url('sites/common/js/bootstrap.min.js')}}?v=1474956664683"></script>*/
/*         */
/*         {% block style %}{% endblock %}*/
/*     </head>*/
/*     {% block container %}{% endblock %}*/
/*     <script src="{{static_url('js/common.js')}}?v=1474956664683"></script>*/
/*     {% block script %}*/
/*         <script>*/
/*           ga('create', 'UA-84294090-1', 'auto');*/
/*           ga('send', 'pageview');*/
/*         </script>*/
/*     {% endblock %}*/
/* </html>*/
