<?php

/* about.html.twig */
class __TwigTemplate_a150008e87ac915f24a18236e675650dc4c53623c9fab524a4b746f333384617 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("common/common.html.twig", "about.html.twig", 1);
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
        echo "
<body class=\"page-about\">
\t";
        // line 5
        $this->loadTemplate("navigation.html.twig", "about.html.twig", 5)->display($context);
        // line 6
        echo "\t<div class=\"curtain\">
\t\t";
        // line 7
        $context["curtain"] = $this->getAttribute(get_block("38"), 0, array(), "array");
        echo "\t
\t\t<img src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["curtain"]) ? $context["curtain"] : null), "image_url", array()), "html", null, true);
        echo "\" alt=\"\">
\t\t<div class=\"curtain-content text-white row-md\">
\t\t\t<article>
\t\t\t\t<h2>";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["curtain"]) ? $context["curtain"] : null), "title", array()), "html", null, true);
        echo "</h2>
\t\t\t\t<p>";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["curtain"]) ? $context["curtain"] : null), "description", array()), "html", null, true);
        echo "</p>
\t\t\t</article>\t
\t\t</div>
\t</div>
\t<div class=\"container-fluid section-container section-about-info\">
\t\t";
        // line 17
        $context["about"] = $this->getAttribute(get_block("39"), 0, array(), "array");
        // line 18
        echo "\t\t<div class=\"row-md\">\t\t
\t\t\t<article>
\t\t\t\t<h2>";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["about"]) ? $context["about"] : null), "title", array()), "html", null, true);
        echo " <span class=\"fake-border\"></span></h2>
\t\t\t\t
\t\t\t\t<hr>\t
\t\t\t\t<h4>";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["about"]) ? $context["about"] : null), "description", array()), "html", null, true);
        echo "</h4>
\t\t\t\t<p>\t";
        // line 24
        echo $this->getAttribute((isset($context["about"]) ? $context["about"] : null), "content", array());
        echo "</p>
\t\t\t</article>
\t\t</div>
\t</div>
\t<div class=\"container-fluid section-container section-contactus\">
\t\t";
        // line 29
        $context["contactus"] = $this->getAttribute(get_block("40"), 0, array(), "array");
        // line 30
        echo "\t\t<div class=\"row-md\">
\t\t\t<article>
\t\t\t\t<h2>";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contactus"]) ? $context["contactus"] : null), "title", array()), "html", null, true);
        echo "</h2>
\t\t\t\t<hr>\t
\t\t\t</article>
\t\t\t<div class=\"col-sm-12\">
\t\t\t\t";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["contactus"]) ? $context["contactus"] : null), "child", array()));
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
            // line 37
            echo "\t\t\t\t    <div class=\"contact-item col-sm-4\">
\t\t\t\t    \t<img src=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "image_url", array()), "html", null, true);
            echo "\" alt=\"\">
\t\t\t\t    \t";
            // line 39
            if (($this->getAttribute($context["loop"], "index", array()) == 2)) {
                // line 40
                echo "\t\t\t\t\t    \t<a href=\"mailto:";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "url", array()), "html", null, true);
                echo "\"><p>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
                echo "</p></a>
\t\t\t\t\t    \t";
            } else {
                // line 42
                echo "\t\t\t\t    \t    <p>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
                echo "</p>
\t\t\t\t    \t";
            }
            // line 44
            echo "
\t\t\t\t    </div>
\t\t\t\t";
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
        // line 47
        echo "\t\t\t</div>
\t\t</div>
\t</div>
\t<div class=\"section-map\">
\t\t<div id=\"imap\" class=\"map-item\">
\t\t\t
\t\t</div>
\t</div>
\t";
        // line 55
        $this->loadTemplate("contact.html.twig", "about.html.twig", 55)->display($context);
        // line 56
        echo "</body>
";
    }

    // line 58
    public function block_script($context, array $blocks = array())
    {
        // line 59
        echo "<script src=\"http://webapi.amap.com/maps?v=1.3&key=79a7e91865aefe5954c2b0e94eac0f47\"></script>\t
<script>
\tjQuery(document).ready(function(\$) {
\t\tfunction initMap(){
\t\t\tvar map = new AMap.Map('imap',{
\t\t            resizeEnable: true,
\t\t            zoom: 15,
\t\t      \t\tlang:\"";
        // line 66
        echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "current_lang", array()), 0, 2), "html", null, true);
        echo "\",
\t\t            center: [104.07243, 30.538968]
\t\t    });
\t\t    var marker = new AMap.Marker({
\t\t            position: [104.07243, 30.538968]
\t\t    });
\t\t    if(navigator.userAgent.indexOf('Firefox')>0){
\t\t   \tAMap.plugin(['AMap.ToolBar','AMap.Scale'],
\t\t        function(){
\t\t            map.addControl(new AMap.ToolBar());
\t\t            map.addControl(new AMap.Scale());
\t\t    });
\t\t   }
\t\t    marker.setMap(map);
\t\t    var circle = new AMap.Circle({
\t\t            center: [104.07243, 30.538968],
\t\t            redius: 100,
\t\t            fillOpacity:0,
\t\t            fillColor:'#09f',
\t\t            strokeColor:'#09f',
\t\t            strokeWeight:2
\t\t    })
\t\t   
\t\t    map.setFitView()
\t\t    var info = new AMap.InfoWindow({
\t\t        content: '<div class=\"titleTO\">Eptonic</div>'
\t\t                ,
\t\t        offset:new AMap.Pixel(0,-28),
\t\t        size:new AMap.Size(200,0)
\t\t    })
\t\t    info.open(map,marker.getPosition())
\t\t}
\t\tinitMap()
\t});
</script>
";
    }

    public function getTemplateName()
    {
        return "about.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  185 => 66,  176 => 59,  173 => 58,  168 => 56,  166 => 55,  156 => 47,  140 => 44,  134 => 42,  126 => 40,  124 => 39,  120 => 38,  117 => 37,  100 => 36,  93 => 32,  89 => 30,  87 => 29,  79 => 24,  75 => 23,  69 => 20,  65 => 18,  63 => 17,  55 => 12,  51 => 11,  45 => 8,  41 => 7,  38 => 6,  36 => 5,  32 => 3,  29 => 2,  11 => 1,);
    }
}
/* {% extends 'common/common.html.twig' %}*/
/* {% block container %}*/
/* */
/* <body class="page-about">*/
/* 	{% include 'navigation.html.twig' %}*/
/* 	<div class="curtain">*/
/* 		{% set curtain = get_block("38")[0] %}	*/
/* 		<img src="{{curtain.image_url}}" alt="">*/
/* 		<div class="curtain-content text-white row-md">*/
/* 			<article>*/
/* 				<h2>{{curtain.title}}</h2>*/
/* 				<p>{{curtain.description}}</p>*/
/* 			</article>	*/
/* 		</div>*/
/* 	</div>*/
/* 	<div class="container-fluid section-container section-about-info">*/
/* 		{% set about = get_block("39")[0] %}*/
/* 		<div class="row-md">		*/
/* 			<article>*/
/* 				<h2>{{about.title}} <span class="fake-border"></span></h2>*/
/* 				*/
/* 				<hr>	*/
/* 				<h4>{{about.description}}</h4>*/
/* 				<p>	{{about.content|raw}}</p>*/
/* 			</article>*/
/* 		</div>*/
/* 	</div>*/
/* 	<div class="container-fluid section-container section-contactus">*/
/* 		{% set contactus = get_block("40")[0] %}*/
/* 		<div class="row-md">*/
/* 			<article>*/
/* 				<h2>{{contactus.title}}</h2>*/
/* 				<hr>	*/
/* 			</article>*/
/* 			<div class="col-sm-12">*/
/* 				{% for item in contactus.child %}*/
/* 				    <div class="contact-item col-sm-4">*/
/* 				    	<img src="{{item.image_url}}" alt="">*/
/* 				    	{% if loop.index == 2 %}*/
/* 					    	<a href="mailto:{{item.url}}"><p>{{item.title}}</p></a>*/
/* 					    	{% else %}*/
/* 				    	    <p>{{item.title}}</p>*/
/* 				    	{% endif %}*/
/* */
/* 				    </div>*/
/* 				{% endfor %}*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* 	<div class="section-map">*/
/* 		<div id="imap" class="map-item">*/
/* 			*/
/* 		</div>*/
/* 	</div>*/
/* 	{% include 'contact.html.twig' %}*/
/* </body>*/
/* {% endblock %}*/
/* {% block script %}*/
/* <script src="http://webapi.amap.com/maps?v=1.3&key=79a7e91865aefe5954c2b0e94eac0f47"></script>	*/
/* <script>*/
/* 	jQuery(document).ready(function($) {*/
/* 		function initMap(){*/
/* 			var map = new AMap.Map('imap',{*/
/* 		            resizeEnable: true,*/
/* 		            zoom: 15,*/
/* 		      		lang:"{{site.current_lang|slice(0,2)}}",*/
/* 		            center: [104.07243, 30.538968]*/
/* 		    });*/
/* 		    var marker = new AMap.Marker({*/
/* 		            position: [104.07243, 30.538968]*/
/* 		    });*/
/* 		    if(navigator.userAgent.indexOf('Firefox')>0){*/
/* 		   	AMap.plugin(['AMap.ToolBar','AMap.Scale'],*/
/* 		        function(){*/
/* 		            map.addControl(new AMap.ToolBar());*/
/* 		            map.addControl(new AMap.Scale());*/
/* 		    });*/
/* 		   }*/
/* 		    marker.setMap(map);*/
/* 		    var circle = new AMap.Circle({*/
/* 		            center: [104.07243, 30.538968],*/
/* 		            redius: 100,*/
/* 		            fillOpacity:0,*/
/* 		            fillColor:'#09f',*/
/* 		            strokeColor:'#09f',*/
/* 		            strokeWeight:2*/
/* 		    })*/
/* 		   */
/* 		    map.setFitView()*/
/* 		    var info = new AMap.InfoWindow({*/
/* 		        content: '<div class="titleTO">Eptonic</div>'*/
/* 		                ,*/
/* 		        offset:new AMap.Pixel(0,-28),*/
/* 		        size:new AMap.Size(200,0)*/
/* 		    })*/
/* 		    info.open(map,marker.getPosition())*/
/* 		}*/
/* 		initMap()*/
/* 	});*/
/* </script>*/
/* {% endblock %}*/
/* */
