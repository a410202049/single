<?php

/* activity.html.twig */
class __TwigTemplate_2e09e3a3302f086cea3fe2b3d9ed35459368410152ef272bbbda27cfac0589bc extends Twig_Template
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
\t\t<div class=\"row-lg row-header\">
\t\t\t<p class=\"header-span\">
\t\t\t\tNEWS
\t\t\t</p>
\t\t\t<img src=\"";
        // line 11
        echo twig_escape_filter($this->env, static_url("image/activity-bg.png"), "html", null, true);
        echo "\" alt=\"\">
\t\t</div>
\t\t<div class=\"row-md\">
\t\t\t<h3 class=\"article-header\">
\t\t\t\t<button class=\"button active\" data-target=\"activity\">";
        // line 15
        echo twig_escape_filter($this->env, lang("activity"), "html", null, true);
        echo "</button>
\t\t\t\t<span class=\"seperate\"></span>
\t\t\t\t<button class=\"button\" data-target=\"news\">";
        // line 17
        echo twig_escape_filter($this->env, lang("news"), "html", null, true);
        echo "</button>
\t\t\t</h3>
\t\t</div>
\t\t<div class=\"row-md article-list\" id=\"activity\">
\t\t\t";
        // line 21
        $context["activity"] = get_article_list("{
\t\t\t\t\"cid\":\"30\",
\t\t\t\t\"pageSize\":\"20\"
\t\t\t}");
        // line 25
        echo "\t\t\t<div class=\"article-container\">
\t\t\t\t";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["activity"]) ? $context["activity"] : null), "articles", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 27
            echo "\t\t\t\t<div class=\"article-item col-xs-12\">
\t\t\t\t\t<div class=\"article-title\">
\t\t\t\t\t\t<a href=\"/article/";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_id", array()), "html", null, true);
            echo "\"><h3>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_title", array()), "html", null, true);
            echo "</h3></a>
\t\t\t\t\t\t";
            // line 30
            if (($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "current_lang", array()) == "zh_cn")) {
                // line 31
                echo "\t\t\t\t\t\t\t<p>";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "art_release_time", array()), "Y年n月j日"), "html", null, true);
                echo "</p>
\t\t\t\t\t\t\t";
            } else {
                // line 33
                echo "\t\t\t\t\t\t\t<p>";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "art_release_time", array()), "Y-n-j"), "html", null, true);
                echo "</p>
\t\t\t\t\t\t\t    
\t\t\t\t\t\t";
            }
            // line 36
            echo "\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"article-content\">
\t\t\t\t\t\t<div class=\"article-img col-md-2 col-sm-3 col-xs-12\">
\t\t\t\t\t\t\t<img src=\"";
            // line 39
            echo twig_escape_filter($this->env, common_url($this->getAttribute($context["item"], "art_cover_img", array())), "html", null, true);
            echo "\" alt=\"\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"article col-md-10 col-sm-9 col-xs-12\">
\t\t\t\t\t\t\t<h4>";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_backup_one", array()), "html", null, true);
            echo "</h4>
\t\t\t\t\t\t\t<a href=\"/article/";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_id", array()), "html", null, true);
            echo "\"><button class=\"button\">";
            echo twig_escape_filter($this->env, lang("read_more"), "html", null, true);
            echo "</button></a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "\t\t\t</div>
\t\t\t";
        // line 49
        if (($this->getAttribute((isset($context["activity"]) ? $context["activity"] : null), "totalpage", array()) > 1)) {
            // line 50
            echo "
\t\t\t<div class=\"col-xs-12\">
\t\t\t\t<div class=\"pagination pull-right\">
\t\t\t\t\t<ul>
\t\t\t\t\t\t";
            // line 54
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
                // line 55
                echo "\t\t\t\t\t\t\t";
                if (($this->getAttribute($context["loop"], "index", array()) == 1)) {
                    // line 56
                    echo "\t\t\t\t\t\t\t\t<li class=\"active\"><a href=\"/activity?type=activity&page=";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "</a></li>
\t\t\t\t\t\t\t\t";
                } else {
                    // line 58
                    echo "\t\t\t\t\t\t\t\t<li class=\"\" data-page=\"";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "\"><a href=\"/activity?type=activity&page=";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "</a></li>
\t\t\t\t\t\t\t\t    
\t\t\t\t\t\t\t";
                }
                // line 61
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
            // line 63
            echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
        }
        // line 67
        echo "\t\t</div>
\t\t<div class=\"row-md article-list hide\" id=\"news\">
\t\t\t";
        // line 69
        $context["news"] = get_article_list("{
\t\t\t\t\"cid\":\"31\",
\t\t\t\t\"pageSize\":\"20\"
\t\t\t}");
        // line 73
        echo "\t\t\t<div class=\"article-container\">
\t\t\t\t

\t\t\t";
        // line 76
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["news"]) ? $context["news"] : null), "articles", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 77
            echo "\t\t\t\t<div class=\"article-item col-xs-12\">
\t\t\t\t\t<div class=\"article-title\">
\t\t\t\t\t\t<a href=\"/article/";
            // line 79
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_id", array()), "html", null, true);
            echo "\"><h3>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_title", array()), "html", null, true);
            echo "</h3></a>
\t\t\t\t\t\t";
            // line 80
            if (($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "current_lang", array()) == "zh_cn")) {
                // line 81
                echo "\t\t\t\t\t\t\t<p>";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "art_release_time", array()), "Y年n月j日"), "html", null, true);
                echo "</p>
\t\t\t\t\t\t\t";
            } else {
                // line 83
                echo "\t\t\t\t\t\t\t<p>";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "art_release_time", array()), "Y-n-j"), "html", null, true);
                echo "</p>\t    
\t\t\t\t\t\t";
            }
            // line 85
            echo "\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"article-content\">
\t\t\t\t\t\t<div class=\"article-img col-md-2 col-sm-3 col-xs-12\">
\t\t\t\t\t\t\t<img src=\"";
            // line 88
            echo twig_escape_filter($this->env, common_url($this->getAttribute($context["item"], "art_cover_img", array())), "html", null, true);
            echo "\" alt=\"\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"article col-md-10 col-sm-9 col-xs-12\">
\t\t\t\t\t\t\t<h4>";
            // line 91
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_backup_one", array()), "html", null, true);
            echo "</h4>
\t\t\t\t\t\t\t<a href=\"/article/";
            // line 92
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "art_id", array()), "html", null, true);
            echo "\"><button class=\"button\">";
            echo twig_escape_filter($this->env, lang("read_more"), "html", null, true);
            echo "</button></a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 97
        echo "\t\t\t</div>
\t\t\t";
        // line 98
        if (($this->getAttribute((isset($context["news"]) ? $context["news"] : null), "totalpage", array()) > 1)) {
            // line 99
            echo "
\t\t\t<div class=\"col-xs-12\">
\t\t\t\t<div class=\"pagination pull-right\">
\t\t\t\t\t<ul>
\t\t\t\t\t\t\t";
            // line 103
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
                // line 104
                echo "\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($context["loop"], "index", array()) == 1)) {
                    // line 105
                    echo "\t\t\t\t\t\t\t\t\t<li class=\"active\"><a href=\"javascript:void(0);\">";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "</a></li>
\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 107
                    echo "\t\t\t\t\t\t\t\t\t<li class=\"\" data-page=\"";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "\"><a href=\"javascript:void(0);\">";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "</a></li>
\t\t\t\t\t\t\t\t\t    
\t\t\t\t\t\t\t\t";
                }
                // line 110
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
            // line 112
            echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>\t\t\t
\t\t\t";
        }
        // line 116
        echo "\t\t</div>\t\t
\t</div>
\t";
        // line 118
        $this->loadTemplate("contact.html.twig", "activity.html.twig", 118)->display($context);
        // line 119
        echo "</body>
";
    }

    // line 121
    public function block_script($context, array $blocks = array())
    {
        // line 122
        echo "\t<script>
\tjQuery(document).ready(function(\$) {
\t\t\$(document).on('click', '.article-header .button', function(event) {
\t\t\tevent.preventDefault();
\t\t\tvar target = \$(this).data(\"target\");
\t\t\t\$(this).addClass('active').siblings('.button').removeClass('active')
\t\t\ttarget = \$(\"#\"+target);
\t\t\ttarget.removeClass('hide').siblings('.article-list').addClass('hide');
\t\t\t// setUrl({type:\$(this).data(\"target\"),page:1});
\t\t});
\t\t// initArticle();
\t\t// window.onpopstate = function(){
\t\t// \tinitArticle();
\t\t// }
\t\t// function initArticle(){
\t\t// \tvar type = \$.getUrlParam(\"type\");
\t\t// \tvar page = \$.getUrlParam(\"page\");
\t\t// \tif(type!=null){
\t\t// \t\t\$(\"#\"+type).removeClass('hide').siblings('.article-list').addClass('hide')
\t\t// \t\t\$('.article-header .button[data-target=\"'+type+'\"]').addClass(\"active\").siblings('.button').removeClass('active')
\t\t// \t}
\t\t// \tif(page!=null){
\t\t// \t\tvar data = {
\t\t// \t\t\tcid:
\t\t// \t\t}
\t\t// \t\t\$.get('/path/to/file', function(data) {
\t\t// \t\t\t/*optional stuff to do after success */
\t\t// \t\t});
\t\t// \t}
\t\t// }
\t\t// function setUrl(option){
\t\t// \tvar param = [];
\t\t// \tfor(var i in option){
\t\t// \t\tparam.push(i+\"=\"+option[i]);
\t\t// \t}
\t\t// \tparam = param.join(\"&\")
\t\t//     var url = location.pathname + '?'+param
\t\t//     history.pushState({url: url, title: document.title}, document.title, url)
\t\t// }
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
        return array (  351 => 122,  348 => 121,  343 => 119,  341 => 118,  337 => 116,  331 => 112,  316 => 110,  307 => 107,  301 => 105,  298 => 104,  281 => 103,  275 => 99,  273 => 98,  270 => 97,  257 => 92,  253 => 91,  247 => 88,  242 => 85,  236 => 83,  230 => 81,  228 => 80,  222 => 79,  218 => 77,  214 => 76,  209 => 73,  204 => 69,  200 => 67,  194 => 63,  179 => 61,  168 => 58,  160 => 56,  157 => 55,  140 => 54,  134 => 50,  132 => 49,  129 => 48,  116 => 43,  112 => 42,  106 => 39,  101 => 36,  94 => 33,  88 => 31,  86 => 30,  80 => 29,  76 => 27,  72 => 26,  69 => 25,  64 => 21,  57 => 17,  52 => 15,  45 => 11,  37 => 5,  35 => 4,  32 => 3,  29 => 2,  11 => 1,);
    }
}
/* {% extends 'common/common.html.twig' %}*/
/* {% block container %}*/
/* <body>*/
/* 	{% include 'navigation.html.twig' %}*/
/* */
/* 	<div class="container-fluid page-article-list">*/
/* 		<div class="row-lg row-header">*/
/* 			<p class="header-span">*/
/* 				NEWS*/
/* 			</p>*/
/* 			<img src="{{static_url("image/activity-bg.png")}}" alt="">*/
/* 		</div>*/
/* 		<div class="row-md">*/
/* 			<h3 class="article-header">*/
/* 				<button class="button active" data-target="activity">{{lang("activity")}}</button>*/
/* 				<span class="seperate"></span>*/
/* 				<button class="button" data-target="news">{{lang("news")}}</button>*/
/* 			</h3>*/
/* 		</div>*/
/* 		<div class="row-md article-list" id="activity">*/
/* 			{% set activity = get_article_list('{*/
/* 				"cid":"30",*/
/* 				"pageSize":"20"*/
/* 			}') %}*/
/* 			<div class="article-container">*/
/* 				{% for item in activity.articles %}*/
/* 				<div class="article-item col-xs-12">*/
/* 					<div class="article-title">*/
/* 						<a href="/article/{{item.art_id}}"><h3>{{item.art_title}}</h3></a>*/
/* 						{% if site.current_lang=="zh_cn" %}*/
/* 							<p>{{item.art_release_time|date("Y年n月j日")}}</p>*/
/* 							{% else %}*/
/* 							<p>{{item.art_release_time|date("Y-n-j")}}</p>*/
/* 							    */
/* 						{% endif %}*/
/* 					</div>*/
/* 					<div class="article-content">*/
/* 						<div class="article-img col-md-2 col-sm-3 col-xs-12">*/
/* 							<img src="{{common_url(item.art_cover_img)}}" alt="">*/
/* 						</div>*/
/* 						<div class="article col-md-10 col-sm-9 col-xs-12">*/
/* 							<h4>{{item.art_backup_one}}</h4>*/
/* 							<a href="/article/{{item.art_id}}"><button class="button">{{lang("read_more")}}</button></a>*/
/* 						</div>*/
/* 					</div>*/
/* 				</div>*/
/* 				{% endfor %}*/
/* 			</div>*/
/* 			{% if activity.totalpage > 1 %}*/
/* */
/* 			<div class="col-xs-12">*/
/* 				<div class="pagination pull-right">*/
/* 					<ul>*/
/* 						{% for i in 1..(activity.totalpage) %}*/
/* 							{% if loop.index == 1  %}*/
/* 								<li class="active"><a href="/activity?type=activity&page={{i}}">{{i}}</a></li>*/
/* 								{% else %}*/
/* 								<li class="" data-page="{{i}}"><a href="/activity?type=activity&page={{i}}">{{i}}</a></li>*/
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
/* 				"pageSize":"20"*/
/* 			}') %}*/
/* 			<div class="article-container">*/
/* 				*/
/* */
/* 			{% for item in news.articles %}*/
/* 				<div class="article-item col-xs-12">*/
/* 					<div class="article-title">*/
/* 						<a href="/article/{{item.art_id}}"><h3>{{item.art_title}}</h3></a>*/
/* 						{% if site.current_lang=="zh_cn" %}*/
/* 							<p>{{item.art_release_time|date("Y年n月j日")}}</p>*/
/* 							{% else %}*/
/* 							<p>{{item.art_release_time|date("Y-n-j")}}</p>	    */
/* 						{% endif %}*/
/* 					</div>*/
/* 					<div class="article-content">*/
/* 						<div class="article-img col-md-2 col-sm-3 col-xs-12">*/
/* 							<img src="{{common_url(item.art_cover_img)}}" alt="">*/
/* 						</div>*/
/* 						<div class="article col-md-10 col-sm-9 col-xs-12">*/
/* 							<h4>{{item.art_backup_one}}</h4>*/
/* 							<a href="/article/{{item.art_id}}"><button class="button">{{lang("read_more")}}</button></a>*/
/* 						</div>*/
/* 					</div>*/
/* 				</div>*/
/* 				{% endfor %}*/
/* 			</div>*/
/* 			{% if news.totalpage > 1 %}*/
/* */
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
/* 			target.removeClass('hide').siblings('.article-list').addClass('hide');*/
/* 			// setUrl({type:$(this).data("target"),page:1});*/
/* 		});*/
/* 		// initArticle();*/
/* 		// window.onpopstate = function(){*/
/* 		// 	initArticle();*/
/* 		// }*/
/* 		// function initArticle(){*/
/* 		// 	var type = $.getUrlParam("type");*/
/* 		// 	var page = $.getUrlParam("page");*/
/* 		// 	if(type!=null){*/
/* 		// 		$("#"+type).removeClass('hide').siblings('.article-list').addClass('hide')*/
/* 		// 		$('.article-header .button[data-target="'+type+'"]').addClass("active").siblings('.button').removeClass('active')*/
/* 		// 	}*/
/* 		// 	if(page!=null){*/
/* 		// 		var data = {*/
/* 		// 			cid:*/
/* 		// 		}*/
/* 		// 		$.get('/path/to/file', function(data) {*/
/* 		// 			/*optional stuff to do after success *//* */
/* 		// 		});*/
/* 		// 	}*/
/* 		// }*/
/* 		// function setUrl(option){*/
/* 		// 	var param = [];*/
/* 		// 	for(var i in option){*/
/* 		// 		param.push(i+"="+option[i]);*/
/* 		// 	}*/
/* 		// 	param = param.join("&")*/
/* 		//     var url = location.pathname + '?'+param*/
/* 		//     history.pushState({url: url, title: document.title}, document.title, url)*/
/* 		// }*/
/* 	});*/
/* 	</script>*/
/* {% endblock %}*/
