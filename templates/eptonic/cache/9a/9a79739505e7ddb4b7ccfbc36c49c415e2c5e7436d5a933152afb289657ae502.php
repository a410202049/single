<?php

/* common/common.html.twig */
class __TwigTemplate_f9672b5f96d504f3ab099cf171181d7e34036c45e24c7440086c50a7b40e162b extends Twig_Template
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
        <link rel=\"shortcut icon\" href=\"favicon.ico\">
        <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, static_url("css/animate.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, static_url("css/style.css"), "html", null, true);
        echo "\">

        <script src=\"";
        // line 20
        echo twig_escape_filter($this->env, base_url("public/home/js/jquery.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 21
        echo twig_escape_filter($this->env, base_url("public/home/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
        ";
        // line 22
        $this->displayBlock('style', $context, $blocks);
        // line 23
        echo "    </head>
    ";
        // line 24
        $this->displayBlock('container', $context, $blocks);
        // line 25
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, static_url("js/common.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 26
        echo twig_escape_filter($this->env, base_url("public/home/js/jquery.cookie.js"), "html", null, true);
        echo "\"></script>
    ";
        // line 27
        $this->displayBlock('script', $context, $blocks);
        // line 28
        echo "</html>";
    }

    // line 22
    public function block_style($context, array $blocks = array())
    {
    }

    // line 24
    public function block_container($context, array $blocks = array())
    {
    }

    // line 27
    public function block_script($context, array $blocks = array())
    {
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
        return array (  99 => 27,  94 => 24,  89 => 22,  85 => 28,  83 => 27,  79 => 26,  74 => 25,  72 => 24,  69 => 23,  67 => 22,  63 => 21,  59 => 20,  54 => 18,  50 => 17,  42 => 12,  38 => 11,  34 => 10,  24 => 2,  22 => 1,);
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
/*         <link rel="shortcut icon" href="favicon.ico">*/
/*         <link href="{{static_url('css/animate.css')}}" rel="stylesheet">*/
/*         <link rel="stylesheet" type="text/css" href="{{static_url('css/style.css')}}">*/
/* */
/*         <script src="{{base_url('public/home/js/jquery.min.js')}}"></script>*/
/*         <script src="{{base_url('public/home/js/bootstrap.min.js')}}"></script>*/
/*         {% block style %}{% endblock %}*/
/*     </head>*/
/*     {% block container %}{% endblock %}*/
/*     <script src="{{static_url('js/common.js')}}"></script>*/
/*     <script src="{{base_url('public/home/js/jquery.cookie.js')}}"></script>*/
/*     {% block script %}{% endblock %}*/
/* </html>*/
