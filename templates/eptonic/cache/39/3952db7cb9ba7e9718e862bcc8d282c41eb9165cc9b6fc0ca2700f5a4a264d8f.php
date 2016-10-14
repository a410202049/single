<?php

/* index.html.twig */
class __TwigTemplate_8b54491d8b3c472d5d8964c79b9d1adf7b3fc60bf9e7072c0a51cb4410be73d1 extends Twig_Template
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
        $context["banners"] = $this->getAttribute(get_block("index_banner"), 0, array(), "array");
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
                // line 30
                echo "
\t\t\t\t\t";
                // line 31
                if (($this->getAttribute($context["loop"], "index", array()) == 1)) {
                    // line 32
                    echo "\t\t\t\t\t\t<li class=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "description", array()), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t<img src=\"";
                    // line 33
                    echo twig_escape_filter($this->env, common_url($this->getAttribute($context["item"], "image_url", array())), "html", null, true);
                    echo "\" class=\"banner-back\" alt=\"\">
\t\t\t\t\t\t\t<img src=\"";
                    // line 34
                    echo twig_escape_filter($this->env, static_url("image/banner/text.png"), "html", null, true);
                    echo "\" class=\"banner-1-text\" alt=\"\">
\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
                } else {
                    // line 37
                    echo "\t\t\t\t\t\t<li class=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "description", array()), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t<img src=\"";
                    // line 38
                    echo twig_escape_filter($this->env, common_url($this->getAttribute($context["item"], "image_url", array())), "html", null, true);
                    echo "\" class=\"banner-back\" alt=\"\">
\t\t\t\t\t\t\t<article>
\t\t\t\t\t\t\t\t";
                    // line 40
                    if (($this->getAttribute($context["item"], "description", array()) == "banner-salon")) {
                        // line 41
                        echo "\t\t\t\t\t\t\t\t\t<h2>
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        // line 42
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "url", array()), "html", null, true);
                        echo "\"><img src=\"";
                        echo twig_escape_filter($this->env, static_url("image/banner/banner-salon-icon.png"), "html", null, true);
                        echo "\" class=\"banner-4-text\" alt=\"\"></a>
\t\t\t\t\t\t\t\t\t</h2>
\t\t\t\t\t\t\t\t";
                    } else {
                        // line 45
                        echo "\t\t\t\t\t\t\t\t\t";
                        if ($this->getAttribute($context["item"], "title", array())) {
                            // line 46
                            echo "\t\t\t\t\t\t\t\t\t\t<h2>";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
                            echo "</h2>
\t\t\t\t\t\t\t\t\t";
                        }
                        // line 48
                        echo "
\t\t\t\t\t\t\t\t\t";
                        // line 49
                        if ($this->getAttribute($context["item"], "content", array())) {
                            // line 50
                            echo "\t\t\t\t\t\t\t\t\t\t<h4>
\t\t\t\t\t\t\t\t\t\t\t";
                            // line 51
                            echo $this->getAttribute($context["item"], "content", array());
                            echo "
\t\t\t\t\t\t\t\t\t\t</h4>
\t\t\t\t\t\t\t\t\t";
                        }
                        // line 54
                        echo "\t\t\t\t\t\t\t\t";
                    }
                    // line 55
                    echo "\t\t\t\t\t\t\t\t

\t\t\t\t\t\t\t</article>
\t\t\t\t\t\t</li>\t        
\t\t\t\t\t";
                }
                // line 60
                echo "\t\t\t\t";
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
            echo "\t\t\t    
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['banner'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "\t\t\t
\t\t</ul>\t\t
\t</section>
\t<section class=\"section section-global\">
\t";
        // line 65
        $context["global"] = $this->getAttribute(get_block("index_global"), 0, array(), "array");
        // line 66
        echo "\t\t<article>
\t\t\t<h2>";
        // line 67
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["global"]) ? $context["global"] : null), "description", array()), "html", null, true);
        echo "</h2>
\t\t\t<p>";
        // line 68
        echo $this->getAttribute((isset($context["global"]) ? $context["global"] : null), "content", array());
        echo "</p>
\t\t\t<hr>
\t\t\t
\t\t</article>
\t\t<div class=\"row-md col-md-12\">
\t\t\t";
        // line 73
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["global"]) ? $context["global"] : null), "child", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 74
            echo "\t\t\t    <div class=\"global-item col-md-4\">
\t\t\t    \t<img src=\"";
            // line 75
            echo twig_escape_filter($this->env, common_url($this->getAttribute($context["item"], "image_url", array())), "html", null, true);
            echo "\" alt=\"\">
\t\t\t    \t<h4>";
            // line 76
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "description", array()), "html", null, true);
            echo "</h4>
\t\t\t    \t<p>";
            // line 77
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "content", array()), "html", null, true);
            echo "</p>
\t\t\t    </div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 80
        echo "\t\t</div>
\t</section>
\t<section class=\"section section-cloud\">
\t";
        // line 83
        $context["global"] = $this->getAttribute(get_block("index_cloud"), 0, array(), "array");
        echo "\t\t
\t\t<article>
\t\t<h2>";
        // line 85
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["global"]) ? $context["global"] : null), "description", array()), "html", null, true);
        echo "</h2>
\t\t";
        // line 86
        echo $this->getAttribute((isset($context["global"]) ? $context["global"] : null), "content", array());
        echo "
\t\t\t
\t\t</article>
\t\t<div class=\"section-cloud-img\">
\t\t\t<img src=\"";
        // line 90
        echo twig_escape_filter($this->env, common_url($this->getAttribute((isset($context["global"]) ? $context["global"] : null), "image_url", array())), "html", null, true);
        echo "\" alt=\"\">
\t\t</div>
\t</section>
\t<section class=\"section section-platform\">
\t\t";
        // line 94
        $context["platform"] = $this->getAttribute(get_block("index_platform"), 0, array(), "array");
        // line 95
        echo "\t\t";
        $context["advantage"] = $this->getAttribute(get_block("index_advantage"), 0, array(), "array");
        // line 96
        echo "\t\t<article>
\t\t\t<h2>";
        // line 97
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["platform"]) ? $context["platform"] : null), "description", array()), "html", null, true);
        echo "</h2>
\t\t\t";
        // line 98
        echo $this->getAttribute((isset($context["platform"]) ? $context["platform"] : null), "content", array());
        echo "
\t\t</article>
\t\t<hr class=\"hr-top\">
\t\t<div class=\"row-md\">
\t\t\t";
        // line 102
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
            // line 103
            echo "\t\t\t\t<div class=\"platform-item hide col-sm-6 col-md-3\">
\t\t\t\t\t<div class=\"img-container\">
\t\t\t\t\t\t<img src=\"";
            // line 105
            echo twig_escape_filter($this->env, common_url($this->getAttribute($context["item"], "image_url", array())), "html", null, true);
            echo "\" data-change=\"";
            echo twig_escape_filter($this->env, static_url("image/platform/"), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo ".png\" alt=\"\">
\t\t\t\t\t</div>
\t\t\t\t\t<h4>";
            // line 107
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "</h4>
\t\t\t\t\t<p>";
            // line 108
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
        // line 111
        echo "\t\t</div>
\t\t<div class=\"row-md\">
\t\t\t";
        // line 113
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["advantage"]) ? $context["advantage"] : null), "child", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 114
            echo "\t\t\t\t<div class=\"platform-info col-sm-4 hide\">
\t\t\t\t\t<div class=\"advantage-img\">
\t\t\t\t\t\t<img src=\"";
            // line 116
            echo twig_escape_filter($this->env, common_url($this->getAttribute($context["item"], "image_url", array())), "html", null, true);
            echo "\" alt=\"\">
\t\t\t\t\t\t<h3>";
            // line 117
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "</h3>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"advantage-info\">
\t\t\t\t\t\t<p>";
            // line 120
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "content", array()), "html", null, true);
            echo "</p>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 124
        echo "\t\t</div>
\t</section>
\t<section class=\"section section-stat\">
\t\t";
        // line 127
        $context["stat"] = $this->getAttribute(get_block("index_statistic"), 0, array(), "array");
        // line 128
        echo "\t\t<h2>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["stat"]) ? $context["stat"] : null), "description", array()), "html", null, true);
        echo "</h2>
\t\t<div class=\"row\">
\t\t\t";
        // line 130
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["stat"]) ? $context["stat"] : null), "child", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 131
            echo "\t\t\t    <div class=\"stat-item\">
\t\t\t\t\t<div class=\"stat-counter counter\" data-count=\"";
            // line 132
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "\">
\t\t\t\t\t\t<span class=\"counter-p\">0</span>
\t\t\t\t\t\t<span class=\"counter-content\">";
            // line 134
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "content", array()), "html", null, true);
            echo "</span></div>
\t\t\t\t\t<h4 class=\"stat-title\">";
            // line 135
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "description", array()), "html", null, true);
            echo "</h4>\t\t\t    \t
\t\t\t    </div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 138
        echo "
\t\t</div>
\t</section>
\t<section class=\"section section-news\">
\t\t<h2>Eptonic<span></span>";
        // line 142
        echo twig_escape_filter($this->env, lang("news"), "html", null, true);
        echo "</h2>
\t\t<div class=\"row-md\">
\t\t\t<div class=\"col-md-6 col-xs-12 news news-left hide\">
\t\t\t\t";
        // line 145
        $context["activity"] = get_article_list("{
\t\t\t\t\t\"cid\":\"30\",
\t\t\t\t\t\"amount\":\"3\"
\t\t\t\t}");
        // line 149
        echo "
\t\t\t\t<h3 class=\"news-title\">";
        // line 150
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["activity"]) ? $context["activity"] : null), "articles", array()), 0, array(), "array"), "cate_name", array()), "html", null, true);
        echo "<a href=\"activity\">";
        echo twig_escape_filter($this->env, lang("more"), "html", null, true);
        echo "</a></h3>
\t\t\t\t<ul class=\"news-list\">
\t\t\t\t\t";
        // line 152
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["activity"]) ? $context["activity"] : null), "articles", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 153
            echo "\t\t\t\t\t\t<li class=\"news-item col-xs-12\">
\t\t\t\t\t\t\t<span class=\"news-image col-xs-4 col-sm-4\">
\t\t\t\t\t\t\t\t<img src=\"";
            // line 155
            echo twig_escape_filter($this->env, common_url($this->getAttribute($context["item"], "art_cover_img", array())), "html", null, true);
            echo "\" alt=\"\" />
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t<div class=\"news-content col-xs-8 col-sm-8\">
\t\t\t\t\t\t\t\t<h3><a href=\"/article/";
            // line 158
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_title", array()), "html", null, true);
            echo "</a></h3>
\t\t\t\t\t\t\t\t<p class=\"news-date\">";
            // line 159
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_description", array()), "html", null, true);
            echo "</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</li>\t\t\t
\t\t\t\t\t    
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 164
        echo "\t\t\t\t</ul>
\t\t\t</div>
\t\t\t<div class=\"col-md-6 col-xs-12 news news-right hide\">
\t\t\t\t";
        // line 167
        $context["news"] = get_article_list("{
\t\t\t\t\t\"cid\":\"31\",
\t\t\t\t\t\"amount\":\"3\"
\t\t\t\t}");
        // line 171
        echo "\t\t\t\t<h3 class=\"news-title\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["news"]) ? $context["news"] : null), "articles", array()), 0, array(), "array"), "cate_name", array()), "html", null, true);
        echo "<a href=\"activity\">";
        echo twig_escape_filter($this->env, lang("more"), "html", null, true);
        echo "</a></h3>\t\t\t\t
\t\t\t\t<ul class=\"news-list\">
\t\t\t\t\t";
        // line 173
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["news"]) ? $context["news"] : null), "articles", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 174
            echo "\t\t\t\t\t\t<li class=\"news-item col-xs-12\">
\t\t\t\t\t\t\t<span class=\"news-image col-xs-4 col-sm-4\">
\t\t\t\t\t\t\t\t<img src=\"";
            // line 176
            echo twig_escape_filter($this->env, common_url($this->getAttribute($context["item"], "art_cover_img", array())), "html", null, true);
            echo "\" alt=\"\" />
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t<div class=\"news-content col-xs-8 col-sm-8\">
\t\t\t\t\t\t\t\t<h3><a href=\"/article/";
            // line 179
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_title", array()), "html", null, true);
            echo "</a></h3>
\t\t\t\t\t\t\t\t<p class=\"news-date\">";
            // line 180
            echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute($context["item"], "art_release_time", array()), 0, 11), "html", null, true);
            echo "</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</li>\t\t\t
\t\t\t\t\t    
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 185
        echo "\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t</section>
\t<section class=\"section section-partner\">
\t\t";
        // line 190
        $context["partner"] = $this->getAttribute(get_block("index_partner"), 0, array(), "array");
        // line 191
        echo "\t\t<article>
\t\t\t<h2>";
        // line 192
        echo twig_escape_filter($this->env, lang("partner"), "html", null, true);
        echo "</h2>
\t\t</article>
\t\t<hr>
\t\t<div class=\"row-md\" id=\"slider\">
\t\t\t<div class=\"partner-container slider-container\">\t
\t\t\t\t";
        // line 197
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["partner"]) ? $context["partner"] : null), "child", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 198
            echo "\t\t\t\t\t<div class=\"partner-item slider-item\">
\t\t\t\t\t\t<img src=\"";
            // line 199
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
        // line 202
        echo "\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["partner"]) ? $context["partner"] : null), "child", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 203
            echo "\t\t\t\t\t<div class=\"partner-item slider-item\">
\t\t\t\t\t\t<img src=\"";
            // line 204
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
        // line 206
        echo "\t\t\t\t
\t\t\t</div>
\t\t</div>
\t</section>
\t";
        // line 210
        $this->loadTemplate("contact.html.twig", "index.html.twig", 210)->display($context);
        // line 211
        echo "</body>
";
    }

    // line 213
    public function block_script($context, array $blocks = array())
    {
        // line 214
        echo "\t<script src=\"";
        echo twig_escape_filter($this->env, static_url("js/banner.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 215
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
        return array (  584 => 215,  579 => 214,  576 => 213,  571 => 211,  569 => 210,  563 => 206,  552 => 204,  549 => 203,  544 => 202,  533 => 199,  530 => 198,  526 => 197,  518 => 192,  515 => 191,  513 => 190,  506 => 185,  495 => 180,  489 => 179,  483 => 176,  479 => 174,  475 => 173,  467 => 171,  462 => 167,  457 => 164,  446 => 159,  440 => 158,  434 => 155,  430 => 153,  426 => 152,  419 => 150,  416 => 149,  411 => 145,  405 => 142,  399 => 138,  390 => 135,  386 => 134,  381 => 132,  378 => 131,  374 => 130,  368 => 128,  366 => 127,  361 => 124,  351 => 120,  345 => 117,  341 => 116,  337 => 114,  333 => 113,  329 => 111,  312 => 108,  308 => 107,  300 => 105,  296 => 103,  279 => 102,  272 => 98,  268 => 97,  265 => 96,  262 => 95,  260 => 94,  253 => 90,  246 => 86,  242 => 85,  237 => 83,  232 => 80,  223 => 77,  219 => 76,  215 => 75,  212 => 74,  208 => 73,  200 => 68,  196 => 67,  193 => 66,  191 => 65,  185 => 61,  165 => 60,  158 => 55,  155 => 54,  149 => 51,  146 => 50,  144 => 49,  141 => 48,  135 => 46,  132 => 45,  124 => 42,  121 => 41,  119 => 40,  114 => 38,  109 => 37,  103 => 34,  99 => 33,  94 => 32,  92 => 31,  89 => 30,  71 => 29,  67 => 28,  45 => 8,  43 => 7,  40 => 6,  38 => 5,  35 => 4,  30 => 2,  11 => 1,);
    }
}
/* {% extends 'common/common.html.twig' %}*/
/* {% block style %}*/
/* {% endblock %}*/
/* {% block container %}*/
/* {% set banners = get_block("index_banner")[0]%}*/
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
/* */
/* 					{% if loop.index == 1 %}*/
/* 						<li class="{{item.description}}">*/
/* 							<img src="{{common_url(item.image_url)}}" class="banner-back" alt="">*/
/* 							<img src="{{static_url("image/banner/text.png")}}" class="banner-1-text" alt="">*/
/* 						</li>*/
/* 						{% else %}*/
/* 						<li class="{{item.description}}">*/
/* 							<img src="{{common_url(item.image_url)}}" class="banner-back" alt="">*/
/* 							<article>*/
/* 								{% if item.description == "banner-salon" %}*/
/* 									<h2>*/
/* 										<a href="{{item.url}}"><img src="{{static_url("image/banner/banner-salon-icon.png")}}" class="banner-4-text" alt=""></a>*/
/* 									</h2>*/
/* 								{% else %}*/
/* 									{% if item.title %}*/
/* 										<h2>{{item.title}}</h2>*/
/* 									{% endif %}*/
/* */
/* 									{% if item.content %}*/
/* 										<h4>*/
/* 											{{item.content|raw}}*/
/* 										</h4>*/
/* 									{% endif %}*/
/* 								{% endif %}*/
/* 								*/
/* */
/* 							</article>*/
/* 						</li>	        */
/* 					{% endif %}*/
/* 				{% endfor %}			    */
/* 			{% endfor %}			*/
/* 		</ul>		*/
/* 	</section>*/
/* 	<section class="section section-global">*/
/* 	{% set global = get_block("index_global")[0] %}*/
/* 		<article>*/
/* 			<h2>{{global.description}}</h2>*/
/* 			<p>{{global.content|raw}}</p>*/
/* 			<hr>*/
/* 			*/
/* 		</article>*/
/* 		<div class="row-md col-md-12">*/
/* 			{% for item in global.child %}*/
/* 			    <div class="global-item col-md-4">*/
/* 			    	<img src="{{common_url(item.image_url)}}" alt="">*/
/* 			    	<h4>{{item.description}}</h4>*/
/* 			    	<p>{{item.content}}</p>*/
/* 			    </div>*/
/* 			{% endfor %}*/
/* 		</div>*/
/* 	</section>*/
/* 	<section class="section section-cloud">*/
/* 	{% set global = get_block("index_cloud")[0] %}		*/
/* 		<article>*/
/* 		<h2>{{global.description}}</h2>*/
/* 		{{global.content|raw}}*/
/* 			*/
/* 		</article>*/
/* 		<div class="section-cloud-img">*/
/* 			<img src="{{common_url(global.image_url)}}" alt="">*/
/* 		</div>*/
/* 	</section>*/
/* 	<section class="section section-platform">*/
/* 		{% set platform = get_block("index_platform")[0] %}*/
/* 		{% set advantage = get_block("index_advantage")[0] %}*/
/* 		<article>*/
/* 			<h2>{{platform.description}}</h2>*/
/* 			{{platform.content|raw}}*/
/* 		</article>*/
/* 		<hr class="hr-top">*/
/* 		<div class="row-md">*/
/* 			{% for item in platform.child %}*/
/* 				<div class="platform-item hide col-sm-6 col-md-3">*/
/* 					<div class="img-container">*/
/* 						<img src="{{common_url(item.image_url)}}" data-change="{{static_url('image/platform/')}}{{loop.index}}.png" alt="">*/
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
/* 						<img src="{{common_url(item.image_url)}}" alt="">*/
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
/* 		{% set stat = get_block("index_statistic")[0] %}*/
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
/* 				<ul class="news-list">*/
/* 					{% for item in activity.articles %}*/
/* 						<li class="news-item col-xs-12">*/
/* 							<span class="news-image col-xs-4 col-sm-4">*/
/* 								<img src="{{common_url(item.art_cover_img)}}" alt="" />*/
/* 							</span>*/
/* 							<div class="news-content col-xs-8 col-sm-8">*/
/* 								<h3><a href="/article/{{item.art_id}}">{{item.art_title}}</a></h3>*/
/* 								<p class="news-date">{{item.art_description}}</p>*/
/* 							</div>*/
/* 						</li>			*/
/* 					    */
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
/* 								<img src="{{common_url(item.art_cover_img)}}" alt="" />*/
/* 							</span>*/
/* 							<div class="news-content col-xs-8 col-sm-8">*/
/* 								<h3><a href="/article/{{item.art_id}}">{{item.art_title}}</a></h3>*/
/* 								<p class="news-date">{{item.art_release_time|slice(0,11)}}</p>*/
/* 							</div>*/
/* 						</li>			*/
/* 					    */
/* 					{% endfor %}*/
/* 				</ul>*/
/* 			</div>*/
/* 		</div>*/
/* 	</section>*/
/* 	<section class="section section-partner">*/
/* 		{% set partner = get_block("index_partner")[0] %}*/
/* 		<article>*/
/* 			<h2>{{lang("partner")}}</h2>*/
/* 		</article>*/
/* 		<hr>*/
/* 		<div class="row-md" id="slider">*/
/* 			<div class="partner-container slider-container">	*/
/* 				{% for item in partner.child %}*/
/* 					<div class="partner-item slider-item">*/
/* 						<img src="{{common_url(item.image_url)}}" title="{{item.title}}" alt="">*/
/* 					</div>*/
/* 				{% endfor %}*/
/* 				{% for item in partner.child %}*/
/* 					<div class="partner-item slider-item">*/
/* 						<img src="{{common_url(item.image_url)}}" title="{{item.title}}" alt="">*/
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
