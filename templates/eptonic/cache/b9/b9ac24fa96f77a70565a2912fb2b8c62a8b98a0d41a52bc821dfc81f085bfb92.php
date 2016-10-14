<?php

/* index.html.twig */
class __TwigTemplate_033af403e31e768883f96a4cd2bdc79a5a08ecb865247d449dc339dac133f9cc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("common/common.html.twig", "index.html.twig", 1);
        $this->blocks = array(
            'style' => array($this, 'block_style'),
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
    public function block_style($context, array $blocks = array())
    {
    }

    // line 4
    public function block_container($context, array $blocks = array())
    {
        // line 5
        $context["banners"] = $this->getAttribute(get_block("20"), 0, array(), "array");
        // line 6
        echo "<body>
\t";
        // line 7
        $this->loadTemplate("navigation.html.twig", "index.html.twig", 7)->display($context);
        // line 8
        echo "\t<section class=\"section banner\" id=\"banner\">
\t\t<div class=\"banner-control banner-left\">
\t\t\t<i class=\"glyphicon glyphicon-menu-left\"></i>
\t\t\t<span class=\"banner-control-count\">\t
\t\t\t\t<span class=\"up\">1</span>
\t\t\t\t<hr class=\"line\">
\t\t\t\t<span class=\"down\">12</span>
\t\t\t</span>
\t\t</div>
\t\t<div class=\"banner-control banner-right\">
\t\t\t<i class=\"glyphicon glyphicon-menu-right\"></i>
\t\t\t<span class=\"banner-control-count\">\t
\t\t\t\t<span class=\"up\">1</span>
\t\t\t\t<hr class=\"line\">
\t\t\t\t<span class=\"down\">2</span>
\t\t\t</span>
\t\t</div>
\t\t<ul class=\"banner-counter\">
\t\t</ul>
\t\t<ul class=\"banner-list\">
\t\t\t";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["banners"]) ? $context["banners"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["banner"]) {
            // line 29
            echo "\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["banner"]);
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 30
                echo "\t\t\t\t\t<li title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
                echo "\">
\t\t\t\t\t\t<img src=\"";
                // line 31
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "image_url", array()), "html", null, true);
                echo "\" class=\"banner-back\" alt=\"\">
\t\t\t\t\t</li>\t        
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "\t\t\t    
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['banner'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "\t\t\t
\t\t</ul>\t\t
\t</section>
\t<section class=\"section section-global\">
\t";
        // line 38
        $context["global"] = $this->getAttribute(get_block("21"), 0, array(), "array");
        // line 39
        echo "\t\t<article>
\t\t\t<h2>";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["global"]) ? $context["global"] : null), "description", array()), "html", null, true);
        echo "</h2>
\t\t\t<p>";
        // line 41
        echo $this->getAttribute((isset($context["global"]) ? $context["global"] : null), "content", array());
        echo "</p>
\t\t\t<hr>
\t\t\t
\t\t</article>
\t\t<div class=\"row-md col-md-12\">
\t\t\t";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["global"]) ? $context["global"] : null), "child", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 47
            echo "\t\t\t    <div class=\"global-item col-md-4\">
\t\t\t    \t<img src=\"";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "image_url", array()), "html", null, true);
            echo "\" alt=\"\">
\t\t\t    \t<h4>";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "description", array()), "html", null, true);
            echo "</h4>
\t\t\t    \t<p>";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "content", array()), "html", null, true);
            echo "</p>
\t\t\t    </div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "\t\t</div>
\t</section>
\t<section class=\"section section-cloud\">
\t";
        // line 56
        $context["global"] = $this->getAttribute(get_block("22"), 0, array(), "array");
        echo "\t\t
\t\t<article>
\t\t<h2>";
        // line 58
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["global"]) ? $context["global"] : null), "description", array()), "html", null, true);
        echo "</h2>
\t\t";
        // line 59
        echo $this->getAttribute((isset($context["global"]) ? $context["global"] : null), "content", array());
        echo "
\t\t\t
\t\t</article>
\t\t<div class=\"section-cloud-img\">
\t\t\t<img src=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["global"]) ? $context["global"] : null), "image_url", array()), "html", null, true);
        echo "\" alt=\"\">
\t\t</div>
\t</section>
\t<section class=\"section section-platform\">
\t\t";
        // line 67
        $context["platform"] = $this->getAttribute(get_block("27"), 0, array(), "array");
        // line 68
        echo "\t\t";
        $context["advantage"] = $this->getAttribute(get_block("31"), 0, array(), "array");
        // line 69
        echo "\t\t<article>
\t\t\t<h2>";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["platform"]) ? $context["platform"] : null), "description", array()), "html", null, true);
        echo "</h2>
\t\t\t";
        // line 71
        echo $this->getAttribute((isset($context["platform"]) ? $context["platform"] : null), "content", array());
        echo "
\t\t</article>
\t\t<hr class=\"hr-top\">
\t\t<div class=\"row-md\">
\t\t\t";
        // line 75
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["platform"]) ? $context["platform"] : null), "child", array()));
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
            // line 76
            echo "\t\t\t\t<div class=\"platform-item hide col-sm-6 col-md-3\">
\t\t\t\t\t<div class=\"img-container\">
\t\t\t\t\t\t<img src=\"";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "image_url", array()), "html", null, true);
            echo "\" data-change=\"";
            echo twig_escape_filter($this->env, static_url("image/platform/"), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo ".png\" alt=\"\">
\t\t\t\t\t</div>
\t\t\t\t\t<h4>";
            // line 80
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "</h4>
\t\t\t\t\t<p>";
            // line 81
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "description", array()), "html", null, true);
            echo "</p>
\t\t\t\t</div>
\t\t\t";
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
        // line 84
        echo "\t\t</div>
\t\t<div class=\"row-md\">
\t\t\t";
        // line 86
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["advantage"]) ? $context["advantage"] : null), "child", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 87
            echo "\t\t\t\t<div class=\"platform-info col-sm-4 hide\">
\t\t\t\t\t<div class=\"advantage-img\">
\t\t\t\t\t\t<img src=\"";
            // line 89
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "image_url", array()), "html", null, true);
            echo "\" alt=\"\">
\t\t\t\t\t\t<h3>";
            // line 90
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "</h3>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"advantage-info\">
\t\t\t\t\t\t<p>";
            // line 93
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "content", array()), "html", null, true);
            echo "</p>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 97
        echo "\t\t</div>
\t</section>
\t<section class=\"section section-stat\">
\t\t";
        // line 100
        $context["stat"] = $this->getAttribute(get_block("28"), 0, array(), "array");
        // line 101
        echo "\t\t<h2>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["stat"]) ? $context["stat"] : null), "description", array()), "html", null, true);
        echo "</h2>
\t\t<div class=\"row\">
\t\t\t";
        // line 103
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["stat"]) ? $context["stat"] : null), "child", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 104
            echo "\t\t\t    <div class=\"stat-item\">
\t\t\t\t\t<div class=\"stat-counter counter\" data-count=\"";
            // line 105
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "\">
\t\t\t\t\t\t<span class=\"counter-p\">0</span>
\t\t\t\t\t\t<span class=\"counter-content\">";
            // line 107
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "content", array()), "html", null, true);
            echo "</span></div>
\t\t\t\t\t<h4 class=\"stat-title\">";
            // line 108
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "description", array()), "html", null, true);
            echo "</h4>\t\t\t    \t
\t\t\t    </div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 111
        echo "
\t\t</div>
\t</section>
\t<section class=\"section section-news\">
\t\t<h2>Eptonic<span></span>";
        // line 115
        echo twig_escape_filter($this->env, lang("news"), "html", null, true);
        echo "</h2>
\t\t<div class=\"row-md\">
\t\t\t<div class=\"col-md-6 col-xs-12 news news-left hide\">
\t\t\t\t";
        // line 118
        $context["activity"] = get_article_list("{
\t\t\t\t\t\"cid\":\"30\",
\t\t\t\t\t\"amount\":\"3\"
\t\t\t\t}");
        // line 122
        echo "
\t\t\t\t<h3 class=\"news-title\">";
        // line 123
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["activity"]) ? $context["activity"] : null), "articles", array()), 0, array(), "array"), "cate_name", array()), "html", null, true);
        echo "<a href=\"activity\">";
        echo twig_escape_filter($this->env, lang("more"), "html", null, true);
        echo "</a></h3>
\t\t\t\t<ul class=\"activity-list\">
\t\t\t\t\t";
        // line 125
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["activity"]) ? $context["activity"] : null), "articles", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 126
            echo "\t\t\t\t\t\t<li class=\"activity-item col-xs-12\">
\t\t\t\t\t\t\t<span class=\"activity-date pull-left col-sm-2 col-xs-12\">
\t\t\t\t\t\t\t\t";
            // line 128
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "art_release_time", array()), "M")), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t\t";
            // line 130
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "art_release_time", array()), "j", false)), "html", null, true);
            echo "

\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t<div class=\"activity-content col-sm-10 col-xs-12\">
\t\t\t\t\t\t\t\t<h3><a href=\"/article/";
            // line 134
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_title", array()), "html", null, true);
            echo "</a></h3>
\t\t\t\t\t\t\t\t<p>";
            // line 135
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_description", array()), "html", null, true);
            echo "</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 139
        echo "\t\t\t\t</ul>
\t\t\t</div>
\t\t\t<div class=\"col-md-6 col-xs-12 news news-right hide\">
\t\t\t\t";
        // line 142
        $context["news"] = get_article_list("{
\t\t\t\t\t\"cid\":\"31\",
\t\t\t\t\t\"amount\":\"3\"
\t\t\t\t}");
        // line 146
        echo "\t\t\t\t<h3 class=\"news-title\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["news"]) ? $context["news"] : null), "articles", array()), 0, array(), "array"), "cate_name", array()), "html", null, true);
        echo "<a href=\"activity\">";
        echo twig_escape_filter($this->env, lang("more"), "html", null, true);
        echo "</a></h3>\t\t\t\t
\t\t\t\t<ul class=\"news-list\">
\t\t\t\t\t";
        // line 148
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["news"]) ? $context["news"] : null), "articles", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 149
            echo "\t\t\t\t\t\t<li class=\"news-item col-xs-12\">
\t\t\t\t\t\t\t<span class=\"news-image col-xs-4 col-sm-4\">
\t\t\t\t\t\t\t\t<img src=\"";
            // line 151
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_cover_img", array()), "html", null, true);
            echo "\" alt=\"\" />
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t<div class=\"news-content col-xs-8 col-sm-8\">
\t\t\t\t\t\t\t\t<h3><a href=\"/article/";
            // line 154
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_title", array()), "html", null, true);
            echo "</a></h3>
\t\t\t\t\t\t\t\t<p class=\"news-date\">1</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</li>\t\t\t
\t\t\t\t\t    
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 160
        echo "\t\t\t</div>
\t\t</div>
\t</section>
\t<section class=\"section section-partner\">
\t\t";
        // line 164
        $context["partner"] = $this->getAttribute(get_block("29"), 0, array(), "array");
        // line 165
        echo "\t\t<article>
\t\t\t<h2>";
        // line 166
        echo twig_escape_filter($this->env, lang("partner"), "html", null, true);
        echo "</h2>
\t\t</article>
\t\t<hr>
\t\t<div class=\"row-md\" id=\"slider\">
\t\t\t<div class=\"partner-container slider-container\">\t
\t\t\t\t";
        // line 171
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["partner"]) ? $context["partner"] : null), "child", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 172
            echo "\t\t\t\t\t<div class=\"partner-item slider-item\">
\t\t\t\t\t\t<img src=\"";
            // line 173
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "image_url", array()), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "\" alt=\"\">
\t\t\t\t\t</div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 176
        echo "\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["partner"]) ? $context["partner"] : null), "child", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 177
            echo "\t\t\t\t\t<div class=\"partner-item slider-item\">
\t\t\t\t\t\t<img src=\"";
            // line 178
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "image_url", array()), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "\" alt=\"\">
\t\t\t\t\t</div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 180
        echo "\t\t\t\t
\t\t\t</div>
\t\t</div>
\t</section>
\t";
        // line 184
        $this->loadTemplate("contact.html.twig", "index.html.twig", 184)->display($context);
        // line 185
        echo "</body>
";
    }

    // line 187
    public function block_script($context, array $blocks = array())
    {
        // line 188
        echo "\t<script src=\"";
        echo twig_escape_filter($this->env, static_url("js/banner.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 189
        echo twig_escape_filter($this->env, static_url("js/index.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  497 => 189,  492 => 188,  489 => 187,  484 => 185,  482 => 184,  476 => 180,  465 => 178,  462 => 177,  457 => 176,  446 => 173,  443 => 172,  439 => 171,  431 => 166,  428 => 165,  426 => 164,  420 => 160,  406 => 154,  400 => 151,  396 => 149,  392 => 148,  384 => 146,  379 => 142,  374 => 139,  364 => 135,  358 => 134,  351 => 130,  346 => 128,  342 => 126,  338 => 125,  331 => 123,  328 => 122,  323 => 118,  317 => 115,  311 => 111,  302 => 108,  298 => 107,  293 => 105,  290 => 104,  286 => 103,  280 => 101,  278 => 100,  273 => 97,  263 => 93,  257 => 90,  253 => 89,  249 => 87,  245 => 86,  241 => 84,  224 => 81,  220 => 80,  212 => 78,  208 => 76,  191 => 75,  184 => 71,  180 => 70,  177 => 69,  174 => 68,  172 => 67,  165 => 63,  158 => 59,  154 => 58,  149 => 56,  144 => 53,  135 => 50,  131 => 49,  127 => 48,  124 => 47,  120 => 46,  112 => 41,  108 => 40,  105 => 39,  103 => 38,  97 => 34,  90 => 33,  81 => 31,  76 => 30,  71 => 29,  67 => 28,  45 => 8,  43 => 7,  40 => 6,  38 => 5,  35 => 4,  30 => 2,  11 => 1,);
    }
}
/* {% extends 'common/common.html.twig' %}*/
/* {% block style %}*/
/* {% endblock %}*/
/* {% block container %}*/
/* {% set banners = get_block("20")[0]%}*/
/* <body>*/
/* 	{% include 'navigation.html.twig' %}*/
/* 	<section class="section banner" id="banner">*/
/* 		<div class="banner-control banner-left">*/
/* 			<i class="glyphicon glyphicon-menu-left"></i>*/
/* 			<span class="banner-control-count">	*/
/* 				<span class="up">1</span>*/
/* 				<hr class="line">*/
/* 				<span class="down">12</span>*/
/* 			</span>*/
/* 		</div>*/
/* 		<div class="banner-control banner-right">*/
/* 			<i class="glyphicon glyphicon-menu-right"></i>*/
/* 			<span class="banner-control-count">	*/
/* 				<span class="up">1</span>*/
/* 				<hr class="line">*/
/* 				<span class="down">2</span>*/
/* 			</span>*/
/* 		</div>*/
/* 		<ul class="banner-counter">*/
/* 		</ul>*/
/* 		<ul class="banner-list">*/
/* 			{% for banner in banners %}*/
/* 				{% for item in banner %}*/
/* 					<li title="{{item.title}}">*/
/* 						<img src="{{item.image_url}}" class="banner-back" alt="">*/
/* 					</li>	        */
/* 				{% endfor %}			    */
/* 			{% endfor %}			*/
/* 		</ul>		*/
/* 	</section>*/
/* 	<section class="section section-global">*/
/* 	{% set global = get_block("21")[0] %}*/
/* 		<article>*/
/* 			<h2>{{global.description}}</h2>*/
/* 			<p>{{global.content|raw}}</p>*/
/* 			<hr>*/
/* 			*/
/* 		</article>*/
/* 		<div class="row-md col-md-12">*/
/* 			{% for item in global.child %}*/
/* 			    <div class="global-item col-md-4">*/
/* 			    	<img src="{{item.image_url}}" alt="">*/
/* 			    	<h4>{{item.description}}</h4>*/
/* 			    	<p>{{item.content}}</p>*/
/* 			    </div>*/
/* 			{% endfor %}*/
/* 		</div>*/
/* 	</section>*/
/* 	<section class="section section-cloud">*/
/* 	{% set global = get_block("22")[0] %}		*/
/* 		<article>*/
/* 		<h2>{{global.description}}</h2>*/
/* 		{{global.content|raw}}*/
/* 			*/
/* 		</article>*/
/* 		<div class="section-cloud-img">*/
/* 			<img src="{{global.image_url}}" alt="">*/
/* 		</div>*/
/* 	</section>*/
/* 	<section class="section section-platform">*/
/* 		{% set platform = get_block("27")[0] %}*/
/* 		{% set advantage = get_block("31")[0] %}*/
/* 		<article>*/
/* 			<h2>{{platform.description}}</h2>*/
/* 			{{platform.content|raw}}*/
/* 		</article>*/
/* 		<hr class="hr-top">*/
/* 		<div class="row-md">*/
/* 			{% for item in platform.child %}*/
/* 				<div class="platform-item hide col-sm-6 col-md-3">*/
/* 					<div class="img-container">*/
/* 						<img src="{{item.image_url}}" data-change="{{static_url('image/platform/')}}{{loop.index}}.png" alt="">*/
/* 					</div>*/
/* 					<h4>{{item.title}}</h4>*/
/* 					<p>{{item.description}}</p>*/
/* 				</div>*/
/* 			{% endfor %}*/
/* 		</div>*/
/* 		<div class="row-md">*/
/* 			{% for item in advantage.child %}*/
/* 				<div class="platform-info col-sm-4 hide">*/
/* 					<div class="advantage-img">*/
/* 						<img src="{{item.image_url}}" alt="">*/
/* 						<h3>{{item.title}}</h3>*/
/* 					</div>*/
/* 					<div class="advantage-info">*/
/* 						<p>{{item.content}}</p>*/
/* 					</div>*/
/* 				</div>*/
/* 			{% endfor %}*/
/* 		</div>*/
/* 	</section>*/
/* 	<section class="section section-stat">*/
/* 		{% set stat = get_block("28")[0] %}*/
/* 		<h2>{{stat.description}}</h2>*/
/* 		<div class="row">*/
/* 			{% for item in stat.child %}*/
/* 			    <div class="stat-item">*/
/* 					<div class="stat-counter counter" data-count="{{item.title}}">*/
/* 						<span class="counter-p">0</span>*/
/* 						<span class="counter-content">{{item.content}}</span></div>*/
/* 					<h4 class="stat-title">{{item.description}}</h4>			    	*/
/* 			    </div>*/
/* 			{% endfor %}*/
/* */
/* 		</div>*/
/* 	</section>*/
/* 	<section class="section section-news">*/
/* 		<h2>Eptonic<span></span>{{lang("news")}}</h2>*/
/* 		<div class="row-md">*/
/* 			<div class="col-md-6 col-xs-12 news news-left hide">*/
/* 				{% set activity = get_article_list('{*/
/* 					"cid":"30",*/
/* 					"amount":"3"*/
/* 				}') %}*/
/* */
/* 				<h3 class="news-title">{{activity.articles[0].cate_name}}<a href="activity">{{lang("more")}}</a></h3>*/
/* 				<ul class="activity-list">*/
/* 					{% for item in activity.articles %}*/
/* 						<li class="activity-item col-xs-12">*/
/* 							<span class="activity-date pull-left col-sm-2 col-xs-12">*/
/* 								{{item.art_release_time|date("M")|upper}}*/
/* 								<br>*/
/* 								{{item.art_release_time|date("j",false)|upper}}*/
/* */
/* 							</span>*/
/* 							<div class="activity-content col-sm-10 col-xs-12">*/
/* 								<h3><a href="/article/{{item.art_id}}">{{item.art_title}}</a></h3>*/
/* 								<p>{{item.art_description}}</p>*/
/* 							</div>*/
/* 						</li>*/
/* 					{% endfor %}*/
/* 				</ul>*/
/* 			</div>*/
/* 			<div class="col-md-6 col-xs-12 news news-right hide">*/
/* 				{% set news = get_article_list('{*/
/* 					"cid":"31",*/
/* 					"amount":"3"*/
/* 				}') %}*/
/* 				<h3 class="news-title">{{news.articles[0].cate_name}}<a href="activity">{{lang("more")}}</a></h3>				*/
/* 				<ul class="news-list">*/
/* 					{% for item in news.articles %}*/
/* 						<li class="news-item col-xs-12">*/
/* 							<span class="news-image col-xs-4 col-sm-4">*/
/* 								<img src="{{item.art_cover_img}}" alt="" />*/
/* 							</span>*/
/* 							<div class="news-content col-xs-8 col-sm-8">*/
/* 								<h3><a href="/article/{{item.art_id}}">{{item.art_title}}</a></h3>*/
/* 								<p class="news-date">1</p>*/
/* 							</div>*/
/* 						</li>			*/
/* 					    */
/* 					{% endfor %}*/
/* 			</div>*/
/* 		</div>*/
/* 	</section>*/
/* 	<section class="section section-partner">*/
/* 		{% set partner = get_block("29")[0] %}*/
/* 		<article>*/
/* 			<h2>{{lang("partner")}}</h2>*/
/* 		</article>*/
/* 		<hr>*/
/* 		<div class="row-md" id="slider">*/
/* 			<div class="partner-container slider-container">	*/
/* 				{% for item in partner.child %}*/
/* 					<div class="partner-item slider-item">*/
/* 						<img src="{{item.image_url}}" title="{{item.title}}" alt="">*/
/* 					</div>*/
/* 				{% endfor %}*/
/* 				{% for item in partner.child %}*/
/* 					<div class="partner-item slider-item">*/
/* 						<img src="{{item.image_url}}" title="{{item.title}}" alt="">*/
/* 					</div>*/
/* 				{% endfor %}				*/
/* 			</div>*/
/* 		</div>*/
/* 	</section>*/
/* 	{% include 'contact.html.twig'%}*/
/* </body>*/
/* {% endblock %}*/
/* {% block script %}*/
/* 	<script src="{{static_url('js/banner.js')}}"></script>*/
/* 	<script src="{{static_url('js/index.js')}}"></script>*/
/* {% endblock %}*/
