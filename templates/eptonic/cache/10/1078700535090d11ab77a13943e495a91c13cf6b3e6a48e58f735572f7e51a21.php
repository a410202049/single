<?php

/* activity.html.twig */
class __TwigTemplate_8390cfba8235a784388b8669aa55676e3be25b9f254bc68ec12e09690c09fcea extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("common/common.html.twig", "activity.html.twig", 1);
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
        echo "<body>
\t";
        // line 4
        $this->loadTemplate("navigation.html.twig", "activity.html.twig", 4)->display($context);
        // line 5
        echo "
\t<div class=\"container-fluid page-article-list\">
\t\t<div class=\"row-md\">
\t\t\t<h3 class=\"article-header\">
\t\t\t\t<button class=\"button active\" data-target=\"activity\">活动</button>
\t\t\t\t<span class=\"seperate\"></span>
\t\t\t\t<button class=\"button\" data-target=\"news\">资讯</button>
\t\t\t</h3>
\t\t</div>
\t\t<div class=\"row-md article-list\" id=\"activity\">
\t\t\t";
        // line 15
        $context["activity"] = get_article_list("{
\t\t\t\t\"cid\":\"30\",
\t\t\t\t\"pageSize\":\"3\"
\t\t\t}");
        // line 19
        echo "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["activity"]) ? $context["activity"] : null), "articles", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 20
            echo "\t\t\t<div class=\"article-item col-xs-12\">
\t\t\t\t<div class=\"article-title\">
\t\t\t\t\t<a href=\"/article/";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_id", array()), "html", null, true);
            echo "\"><h3>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_title", array()), "html", null, true);
            echo "</h3></a>
\t\t\t\t\t";
            // line 23
            if (($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "current_lang", array()) == "zh_cn")) {
                // line 24
                echo "\t\t\t\t\t\t<p>";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "art_release_time", array()), "Y年n月j日"), "html", null, true);
                echo "</p>
\t\t\t\t\t\t";
            } else {
                // line 26
                echo "\t\t\t\t\t\t<p>";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "art_release_time", array()), "Y-n-j"), "html", null, true);
                echo "</p>
\t\t\t\t\t\t    
\t\t\t\t\t";
            }
            // line 29
            echo "\t\t\t\t</div>
\t\t\t\t<div class=\"article-content\">
\t\t\t\t\t<div class=\"article-img col-md-2 col-sm-3 col-xs-12\">
\t\t\t\t\t\t<img src=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_cover_img", array()), "html", null, true);
            echo "\" alt=\"\">
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"article col-md-10 col-sm-9 col-xs-12\">
\t\t\t\t\t\t<h4>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_backup_one", array()), "html", null, true);
            echo "</h4>
\t\t\t\t\t\t<a href=\"/article/";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_id", array()), "html", null, true);
            echo "\"><button class=\"button\">";
            echo twig_escape_filter($this->env, lang("read_more"), "html", null, true);
            echo "</button></a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "\t\t\t";
        if (($this->getAttribute((isset($context["activity"]) ? $context["activity"] : null), "totalpage", array()) != 1)) {
            // line 42
            echo "
\t\t\t<div class=\"col-xs-12\">
\t\t\t\t<div class=\"pagination pull-right\">
\t\t\t\t\t<ul>
\t\t\t\t\t\t";
            // line 46
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, $this->getAttribute((isset($context["activity"]) ? $context["activity"] : null), "totalpage", array())));
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
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 47
                echo "\t\t\t\t\t\t\t";
                if (($this->getAttribute($context["loop"], "index", array()) == 1)) {
                    // line 48
                    echo "\t\t\t\t\t\t\t\t<li class=\"active\"><a href=\"javascript:void(0);\">";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "</a></li>
\t\t\t\t\t\t\t\t";
                } else {
                    // line 50
                    echo "\t\t\t\t\t\t\t\t<li class=\"\" data-page=\"";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "\"><a href=\"javascript:void(0);\">";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "</a></li>
\t\t\t\t\t\t\t\t    
\t\t\t\t\t\t\t";
                }
                // line 53
                echo "\t\t\t\t\t\t    
\t\t\t\t\t\t";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 55
            echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
        }
        // line 59
        echo "\t\t</div>
\t\t<div class=\"row-md article-list hide\" id=\"news\">
\t\t\t";
        // line 61
        $context["news"] = get_article_list("{
\t\t\t\t\"cid\":\"31\",
\t\t\t\t\"pageSize\":\"3\"
\t\t\t}");
        // line 65
        echo "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["news"]) ? $context["news"] : null), "articles", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 66
            echo "\t\t\t<div class=\"article-item col-xs-12\">
\t\t\t\t<div class=\"article-title\">
\t\t\t\t\t<a href=\"/article/";
            // line 68
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_id", array()), "html", null, true);
            echo "\"><h3>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_title", array()), "html", null, true);
            echo "</h3></a>
\t\t\t\t\t";
            // line 69
            if (($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "current_lang", array()) == "zh_cn")) {
                // line 70
                echo "\t\t\t\t\t\t<p>";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "realease_time", array()), "Y年n月j日"), "html", null, true);
                echo "</p>
\t\t\t\t\t\t";
            } else {
                // line 72
                echo "\t\t\t\t\t\t<p>";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "realease_time", array()), "Y-n-j"), "html", null, true);
                echo "</p>
\t\t\t\t\t\t    
\t\t\t\t\t";
            }
            // line 75
            echo "\t\t\t\t</div>
\t\t\t\t<div class=\"article-content\">
\t\t\t\t\t<div class=\"article-img col-md-2 col-sm-3 col-xs-12\">
\t\t\t\t\t\t<img src=\"";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_cover_img", array()), "html", null, true);
            echo "\" alt=\"\">
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"article col-md-10 col-sm-9 col-xs-12\">
\t\t\t\t\t\t<h4>";
            // line 81
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_title", array()), "html", null, true);
            echo "</h4>
\t\t\t\t\t\t<a href=\"/article/";
            // line 82
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_id", array()), "html", null, true);
            echo "\"><button class=\"button\">";
            echo twig_escape_filter($this->env, lang("read_more"), "html", null, true);
            echo "</button></a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 87
        echo "\t\t\t";
        if (($this->getAttribute((isset($context["news"]) ? $context["news"] : null), "totalpage", array()) != 1)) {
            // line 88
            echo "\t\t\t<div class=\"col-xs-12\">
\t\t\t\t<div class=\"pagination pull-right\">
\t\t\t\t\t<ul>
\t\t\t\t\t\t\t";
            // line 91
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, $this->getAttribute((isset($context["news"]) ? $context["news"] : null), "totalpage", array())));
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
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 92
                echo "\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($context["loop"], "index", array()) == 1)) {
                    // line 93
                    echo "\t\t\t\t\t\t\t\t\t<li class=\"active\"><a href=\"javascript:void(0);\">";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "</a></li>
\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 95
                    echo "\t\t\t\t\t\t\t\t\t<li class=\"\" data-page=\"";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "\"><a href=\"javascript:void(0);\">";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "</a></li>
\t\t\t\t\t\t\t\t\t    
\t\t\t\t\t\t\t\t";
                }
                // line 98
                echo "\t\t\t\t\t\t\t    
\t\t\t\t\t\t\t";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 100
            echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>\t\t\t
\t\t\t";
        }
        // line 104
        echo "\t\t</div>\t\t
\t</div>
\t";
        // line 106
        $this->loadTemplate("contact.html.twig", "activity.html.twig", 106)->display($context);
        // line 107
        echo "</body>
";
    }

    // line 109
    public function block_script($context, array $blocks = array())
    {
        // line 110
        echo "\t<script>
\tjQuery(document).ready(function(\$) {
\t\t\$(document).on('click', '.article-header .button', function(event) {
\t\t\tevent.preventDefault();
\t\t\tvar target = \$(this).data(\"target\");
\t\t\t\$(this).addClass('active').siblings('.button').removeClass('active')
\t\t\ttarget = \$(\"#\"+target);
\t\t\ttarget.removeClass('hide').siblings('.article-list').addClass('hide')
\t\t});
\t});
\t</script>
";
    }

    public function getTemplateName()
    {
        return "activity.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  322 => 110,  319 => 109,  314 => 107,  312 => 106,  308 => 104,  302 => 100,  287 => 98,  278 => 95,  272 => 93,  269 => 92,  252 => 91,  247 => 88,  244 => 87,  231 => 82,  227 => 81,  221 => 78,  216 => 75,  209 => 72,  203 => 70,  201 => 69,  195 => 68,  191 => 66,  186 => 65,  181 => 61,  177 => 59,  171 => 55,  156 => 53,  147 => 50,  141 => 48,  138 => 47,  121 => 46,  115 => 42,  112 => 41,  99 => 36,  95 => 35,  89 => 32,  84 => 29,  77 => 26,  71 => 24,  69 => 23,  63 => 22,  59 => 20,  54 => 19,  49 => 15,  37 => 5,  35 => 4,  32 => 3,  29 => 2,  11 => 1,);
    }
}
/* {% extends 'common/common.html.twig' %}*/
/* {% block container %}*/
/* <body>*/
/* 	{% include 'navigation.html.twig' %}*/
/* */
/* 	<div class="container-fluid page-article-list">*/
/* 		<div class="row-md">*/
/* 			<h3 class="article-header">*/
/* 				<button class="button active" data-target="activity">活动</button>*/
/* 				<span class="seperate"></span>*/
/* 				<button class="button" data-target="news">资讯</button>*/
/* 			</h3>*/
/* 		</div>*/
/* 		<div class="row-md article-list" id="activity">*/
/* 			{% set activity = get_article_list('{*/
/* 				"cid":"30",*/
/* 				"pageSize":"3"*/
/* 			}') %}*/
/* 			{% for item in activity.articles %}*/
/* 			<div class="article-item col-xs-12">*/
/* 				<div class="article-title">*/
/* 					<a href="/article/{{item.art_id}}"><h3>{{item.art_title}}</h3></a>*/
/* 					{% if site.current_lang=="zh_cn" %}*/
/* 						<p>{{item.art_release_time|date("Y年n月j日")}}</p>*/
/* 						{% else %}*/
/* 						<p>{{item.art_release_time|date("Y-n-j")}}</p>*/
/* 						    */
/* 					{% endif %}*/
/* 				</div>*/
/* 				<div class="article-content">*/
/* 					<div class="article-img col-md-2 col-sm-3 col-xs-12">*/
/* 						<img src="{{item.art_cover_img}}" alt="">*/
/* 					</div>*/
/* 					<div class="article col-md-10 col-sm-9 col-xs-12">*/
/* 						<h4>{{item.art_backup_one}}</h4>*/
/* 						<a href="/article/{{item.art_id}}"><button class="button">{{lang("read_more")}}</button></a>*/
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/* 			{% endfor %}*/
/* 			{% if activity.totalpage!=1 %}*/
/* */
/* 			<div class="col-xs-12">*/
/* 				<div class="pagination pull-right">*/
/* 					<ul>*/
/* 						{% for i in 1..(activity.totalpage) %}*/
/* 							{% if loop.index == 1  %}*/
/* 								<li class="active"><a href="javascript:void(0);">{{i}}</a></li>*/
/* 								{% else %}*/
/* 								<li class="" data-page="{{i}}"><a href="javascript:void(0);">{{i}}</a></li>*/
/* 								    */
/* 							{% endif %}*/
/* 						    */
/* 						{% endfor %}*/
/* 					</ul>*/
/* 				</div>*/
/* 			</div>*/
/* 			{% endif %}*/
/* 		</div>*/
/* 		<div class="row-md article-list hide" id="news">*/
/* 			{% set news = get_article_list('{*/
/* 				"cid":"31",*/
/* 				"pageSize":"3"*/
/* 			}') %}*/
/* 			{% for item in news.articles %}*/
/* 			<div class="article-item col-xs-12">*/
/* 				<div class="article-title">*/
/* 					<a href="/article/{{item.art_id}}"><h3>{{item.art_title}}</h3></a>*/
/* 					{% if site.current_lang=="zh_cn" %}*/
/* 						<p>{{item.realease_time|date("Y年n月j日")}}</p>*/
/* 						{% else %}*/
/* 						<p>{{item.realease_time|date("Y-n-j")}}</p>*/
/* 						    */
/* 					{% endif %}*/
/* 				</div>*/
/* 				<div class="article-content">*/
/* 					<div class="article-img col-md-2 col-sm-3 col-xs-12">*/
/* 						<img src="{{item.art_cover_img}}" alt="">*/
/* 					</div>*/
/* 					<div class="article col-md-10 col-sm-9 col-xs-12">*/
/* 						<h4>{{item.art_title}}</h4>*/
/* 						<a href="/article/{{item.art_id}}"><button class="button">{{lang("read_more")}}</button></a>*/
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/* 			{% endfor %}*/
/* 			{% if news.totalpage!=1 %}*/
/* 			<div class="col-xs-12">*/
/* 				<div class="pagination pull-right">*/
/* 					<ul>*/
/* 							{% for i in 1..(news.totalpage) %}*/
/* 								{% if loop.index == 1  %}*/
/* 									<li class="active"><a href="javascript:void(0);">{{i}}</a></li>*/
/* 									{% else %}*/
/* 									<li class="" data-page="{{i}}"><a href="javascript:void(0);">{{i}}</a></li>*/
/* 									    */
/* 								{% endif %}*/
/* 							    */
/* 							{% endfor %}*/
/* 					</ul>*/
/* 				</div>*/
/* 			</div>			*/
/* 			{% endif %}*/
/* 		</div>		*/
/* 	</div>*/
/* 	{% include 'contact.html.twig' %}*/
/* </body>*/
/* {% endblock %}*/
/* {% block script %}*/
/* 	<script>*/
/* 	jQuery(document).ready(function($) {*/
/* 		$(document).on('click', '.article-header .button', function(event) {*/
/* 			event.preventDefault();*/
/* 			var target = $(this).data("target");*/
/* 			$(this).addClass('active').siblings('.button').removeClass('active')*/
/* 			target = $("#"+target);*/
/* 			target.removeClass('hide').siblings('.article-list').addClass('hide')*/
/* 		});*/
/* 	});*/
/* 	</script>*/
/* {% endblock %}*/
