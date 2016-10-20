<?php

/* index.html.twig */
class __TwigTemplate_b38a17f376bb45e70516a4f24ed83ede252398ba769ae5f47f3afeef6b571792 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("common.html.twig", "index.html.twig", 1);
        $this->blocks = array(
            'container' => array($this, 'block_container'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "common.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_container($context, array $blocks = array())
    {
        // line 3
        echo "\t<!-- BLOG -->
\t<section id=\"main\">
\t\t<div class=\"container\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-md-9\">
\t\t\t\t\t<div class=\"single-blog\">
\t\t\t\t\t\t<article>
\t\t\t\t\t\t\t<div class=\"post-thumb\"><img class=\"img-responsive\" src=\"";
        // line 10
        echo twig_escape_filter($this->env, common_url("public/home/images/blog/01.jpg"), "html", null, true);
        echo "\" alt=\"\"></div>
\t\t\t\t\t\t\t<h4 class=\"post-title\"><a href=\"\">Kpsum dolor sit amet, consectetur adipisicing elit.</a></h4>
\t\t\t\t\t\t\t<div class=\"post-meta text-uppercase\">
\t\t\t\t\t\t\t\t<span>Appril 3, 2014</span>
\t\t\t\t\t\t\t\t<span>In <a href=\"\">Design</a></span>
\t\t\t\t\t\t\t\t<span>By <a href=\"\">Admin</a></span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"post-article\">
\t\t\t\t\t\t\t\tLorem ipsum dolor sit amet, consectetur adipisicing elit. Error accusamus, repudiandae tenetur itaque rem sapiente inventore vel deserunt officiis, facilis veritatis doloremque debitis id perferendis, eveniet esse molestiae eum minus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error accusamus, repudiandae tenetur itaque rem sapiente inventore vel deserunt officiis, facilis veritatis doloremque debitis id perferendis, eveniet esse molestiae
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<a href=\"\" class=\"btn btn-readmore\">Read More</a>
\t\t\t\t\t\t</article>
\t\t\t\t\t</div>
\t\t\t\t\t<hr>
\t\t\t\t\t<div class=\"single-blog\">
\t\t\t\t\t\t<article>
\t\t\t\t\t\t\t<div class=\"post-link\"><a href=\"\">www.yourdomain.com</a></div>
\t\t\t\t\t\t\t<h4 class=\"post-title\"><a href=\"\">Kpsum dolor sit amet, consectetur adipisicing elit.</a></h4>
\t\t\t\t\t\t\t<div class=\"post-meta text-uppercase\">
\t\t\t\t\t\t\t\t<span>Appril 3, 2014</span>
\t\t\t\t\t\t\t\t<span>In <a href=\"\">Design</a></span>
\t\t\t\t\t\t\t\t<span>By <a href=\"\">Admin</a></span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"post-article\">
\t\t\t\t\t\t\t\tLorem ipsum dolor sit amet, consectetur adipisicing elit. Error accusamus, repudiandae tenetur itaque rem sapiente inventore vel deserunt officiis, facilis veritatis doloremque debitis id perferendis, eveniet esse molestiae eum minus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error accusamus, repudiandae tenetur itaque rem sapiente inventore vel deserunt officiis, facilis veritatis doloremque debitis id perferendis, eveniet esse molestiae
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<a href=\"\" class=\"btn btn-readmore\">Read More</a>
\t\t\t\t\t\t</article>
\t\t\t\t\t</div>
\t\t\t\t\t<hr>
\t\t\t\t\t<div class=\"single-blog\">
\t\t\t\t\t\t<article>
\t\t\t\t\t\t\t<div class=\"post-slider\">
\t\t\t\t\t\t\t\t<div id=\"post-carousel\" class=\"carousel slide\" data-ride=\"carousel\">\t\t\t
\t\t\t\t\t\t\t\t\t<div class=\"carousel-inner\">
\t\t\t\t\t\t\t\t\t\t<div class=\"item active\">
\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
        // line 46
        echo twig_escape_filter($this->env, common_url("public/home/images/blog/01.jpg"), "html", null, true);
        echo "\" alt=\"\">
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"item\">
\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
        // line 49
        echo twig_escape_filter($this->env, common_url("public/home/images/blog/02.jpg"), "html", null, true);
        echo "\" alt=\"\">\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"item\">
\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
        // line 52
        echo twig_escape_filter($this->env, common_url("public/home/images/blog/03.jpg"), "html", null, true);
        echo "\" alt=\"\">\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<a class=\"post-carousel-left\" href=\"#post-carousel\" data-slide=\"prev\"><i class=\"fa fa-angle-left\"></i></a>
\t\t\t\t\t\t\t\t\t\t<a class=\"post-carousel-right\" href=\"#post-carousel\" data-slide=\"next\"><i class=\"fa fa-angle-right\"></i></a>
\t\t\t\t\t\t\t\t\t</div>\t\t
\t\t\t\t\t\t\t\t</div> 
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<h4 class=\"post-title\"><a href=\"\">Kpsum dolor sit amet, consectetur adipisicing elit.</a></h4>
\t\t\t\t\t\t\t<div class=\"post-meta text-uppercase\">
\t\t\t\t\t\t\t\t<span>Appril 3, 2014</span>
\t\t\t\t\t\t\t\t<span>In <a href=\"\">Design</a></span>
\t\t\t\t\t\t\t\t<span>By <a href=\"\">Admin</a></span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"post-article\">
\t\t\t\t\t\t\t\tLorem ipsum dolor sit amet, consectetur adipisicing elit. Error accusamus, repudiandae tenetur itaque rem sapiente inventore vel deserunt officiis, facilis veritatis doloremque debitis id perferendis, eveniet esse molestiae eum minus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error accusamus, repudiandae tenetur itaque rem sapiente inventore vel deserunt officiis, facilis veritatis doloremque debitis id perferendis, eveniet esse molestiae
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<a href=\"\" class=\"btn btn-readmore\">Read More</a>
\t\t\t\t\t\t</article>
\t\t\t\t\t</div>
\t\t\t\t\t<hr>
\t\t\t\t\t<div class=\"single-blog\">
\t\t\t\t\t\t<article>
\t\t\t\t\t\t\t<div class=\"post-quote\">¡°Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti minus quasi temporibus reiciendis veniam reprehenderit, consequuntur. At blanditiis¡±</div>
\t\t\t\t\t\t\t<h4 class=\"post-title\"><a href=\"\">Kpsum dolor sit amet, consectetur adipisicing elit.</a></h4>
\t\t\t\t\t\t\t<div class=\"post-meta text-uppercase\">
\t\t\t\t\t\t\t\t<span>Appril 3, 2014</span>
\t\t\t\t\t\t\t\t<span>In <a href=\"\">Design</a></span>
\t\t\t\t\t\t\t\t<span>By <a href=\"\">Admin</a></span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"post-article\">
\t\t\t\t\t\t\t\tLorem ipsum dolor sit amet, consectetur adipisicing elit. Error accusamus, repudiandae tenetur itaque rem sapiente inventore vel deserunt officiis, facilis veritatis doloremque debitis id perferendis, eveniet esse molestiae eum minus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error accusamus, repudiandae tenetur itaque rem sapiente inventore vel deserunt officiis, facilis veritatis doloremque debitis id perferendis, eveniet esse molestiae
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<a href=\"\" class=\"btn btn-readmore\">Read More</a>
\t\t\t\t\t\t</article>
\t\t\t\t\t</div>
\t\t\t\t\t<hr>
\t\t\t\t\t<div class=\"single-blog\">
\t\t\t\t\t\t<article>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<h4 class=\"post-title\"><a href=\"\">Kpsum dolor sit amet, consectetur adipisicing elit.</a></h4>
\t\t\t\t\t\t\t<div class=\"post-meta text-uppercase\">
\t\t\t\t\t\t\t\t<span>Appril 3, 2014</span>
\t\t\t\t\t\t\t\t<span>In <a href=\"\">Design</a></span>
\t\t\t\t\t\t\t\t<span>By <a href=\"\">Admin</a></span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"post-article\">
\t\t\t\t\t\t\t\tLorem ipsum dolor sit amet, consectetur adipisicing elit. Error accusamus, repudiandae tenetur itaque rem sapiente inventore vel deserunt officiis, facilis veritatis doloremque debitis id perferendis, eveniet esse molestiae eum minus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error accusamus, repudiandae tenetur itaque rem sapiente inventore vel deserunt officiis, facilis veritatis doloremque debitis id perferendis, eveniet esse molestiae
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<a href=\"\" class=\"btn btn-readmore\">Read More</a>
\t\t\t\t\t\t</article>
\t\t\t\t\t</div>
\t\t\t\t\t<hr>
\t\t\t\t\t<ul class=\"pagination\">
\t\t\t\t\t\t<li><a href=\"#\"><i class=\"fa fa-angle-left\"></i></a></li>
\t\t\t\t\t\t<li class=\"active\"><a href=\"#\">1</a></li>
\t\t\t\t\t\t<li><a href=\"#\">2</a></li>
\t\t\t\t\t\t<li><a href=\"#\">3</a></li>
\t\t\t\t\t\t<li><a href=\"#\">4</a></li>
\t\t\t\t\t\t<li><a href=\"#\"><i class=\"fa fa-angle-right\"></i></a></li>
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t<div class=\"sidebar-widget\">
\t\t\t\t\t\t<div class=\"blog-search\">
                            <form>
                                <input type=\"text\" name=\"search\">
                                <span>
                                \t<button id=\"submit_btn\" class=\"search-submit\" type=\"submit\">
                                    <i class=\"fa fa-search\"></i>
                                    </button>
                                </span>
                            </form>
                        </div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"sidebar-widget\">
\t\t\t\t\t\t<h4 class=\"sidebar-title\">Categories</h4>
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<li><a href=\"\">Web Design</a></li>
\t\t\t\t\t\t\t<li><a href=\"\">Web Development</a></li>
\t\t\t\t\t\t\t<li><a href=\"\">Video</a></li>
\t\t\t\t\t\t\t<li><a href=\"\">HTML</a></li>
\t\t\t\t\t\t\t<li><a href=\"\">CSS</a></li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"sidebar-widget\">
\t\t\t\t\t\t<h4 class=\"sidebar-title\">Flickr</h4>
\t\t\t\t\t\t<ul class=\"content-flickr\">
\t\t\t\t\t\t\t<li>
                                <a href=\"#\" title=\"\">
                                    <img class=\"img-responsive\" src=\"";
        // line 142
        echo twig_escape_filter($this->env, common_url("public/home/images/img1.png"), "html", null, true);
        echo "\" alt=\"\">
                                </a>
                            </li>
                            <li>
                                <a href=\"#\">
                                    <img class=\"img-responsive\" src=\"";
        // line 147
        echo twig_escape_filter($this->env, common_url("public/home/images/img2.png"), "html", null, true);
        echo "\" alt=\"\">
                                </a>
                            </li>
                            <li>
                                <a href=\"#\">
                                    <img class=\"img-responsive\" src=\"";
        // line 152
        echo twig_escape_filter($this->env, common_url("public/home/images/img3.png"), "html", null, true);
        echo "\" alt=\"\">
                                </a>
                            </li>
                            <li>
                                <a href=\"#\">
                                    <img class=\"img-responsive\" src=\"";
        // line 157
        echo twig_escape_filter($this->env, common_url("public/home/images/img4.png"), "html", null, true);
        echo "\" alt=\"\">
                                </a>
                            </li>
                            <li>
                                <a href=\"#\">
                                    <img class=\"img-responsive\" src=\"";
        // line 162
        echo twig_escape_filter($this->env, common_url("public/home/images/img5.png"), "html", null, true);
        echo "\" alt=\"\">
                                </a>
                            </li>
                            <li>
                                <a href=\"#\">
                                    <img class=\"img-responsive\" src=\"";
        // line 167
        echo twig_escape_filter($this->env, common_url("public/home/images/img6.png"), "html", null, true);
        echo "\" alt=\"\">
                                </a>
                            </li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"sidebar-widget\">
\t\t\t\t\t\t<h4 class=\"sidebar-title\">Tags</h4>
\t\t\t\t\t\t<div class=\"tagcloud\">
\t\t\t\t\t\t\t<a href=\"\">design</a>
\t\t\t\t\t\t\t<a href=\"\">html</a>
\t\t\t\t\t\t\t<a href=\"\">php</a>
\t\t\t\t\t\t\t<a href=\"\">wordpress</a>
\t\t\t\t\t\t\t<a href=\"\">css</a>
\t\t\t\t\t\t\t<a href=\"\">development</a>
\t\t\t\t\t\t\t<a href=\"\">theme</a>
\t\t\t\t\t\t\t<a href=\"\">plugin</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</section>
\t<!-- /BLOG -->
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
        return array (  224 => 167,  216 => 162,  208 => 157,  200 => 152,  192 => 147,  184 => 142,  91 => 52,  85 => 49,  79 => 46,  40 => 10,  31 => 3,  28 => 2,  11 => 1,);
    }
}
/* {% extends 'common.html.twig' %}*/
/* {% block container %}*/
/* 	<!-- BLOG -->*/
/* 	<section id="main">*/
/* 		<div class="container">*/
/* 			<div class="row">*/
/* 				<div class="col-md-9">*/
/* 					<div class="single-blog">*/
/* 						<article>*/
/* 							<div class="post-thumb"><img class="img-responsive" src="{{common_url('public/home/images/blog/01.jpg')}}" alt=""></div>*/
/* 							<h4 class="post-title"><a href="">Kpsum dolor sit amet, consectetur adipisicing elit.</a></h4>*/
/* 							<div class="post-meta text-uppercase">*/
/* 								<span>Appril 3, 2014</span>*/
/* 								<span>In <a href="">Design</a></span>*/
/* 								<span>By <a href="">Admin</a></span>*/
/* 							</div>*/
/* 							<div class="post-article">*/
/* 								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error accusamus, repudiandae tenetur itaque rem sapiente inventore vel deserunt officiis, facilis veritatis doloremque debitis id perferendis, eveniet esse molestiae eum minus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error accusamus, repudiandae tenetur itaque rem sapiente inventore vel deserunt officiis, facilis veritatis doloremque debitis id perferendis, eveniet esse molestiae*/
/* 							</div>*/
/* 							<a href="" class="btn btn-readmore">Read More</a>*/
/* 						</article>*/
/* 					</div>*/
/* 					<hr>*/
/* 					<div class="single-blog">*/
/* 						<article>*/
/* 							<div class="post-link"><a href="">www.yourdomain.com</a></div>*/
/* 							<h4 class="post-title"><a href="">Kpsum dolor sit amet, consectetur adipisicing elit.</a></h4>*/
/* 							<div class="post-meta text-uppercase">*/
/* 								<span>Appril 3, 2014</span>*/
/* 								<span>In <a href="">Design</a></span>*/
/* 								<span>By <a href="">Admin</a></span>*/
/* 							</div>*/
/* 							<div class="post-article">*/
/* 								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error accusamus, repudiandae tenetur itaque rem sapiente inventore vel deserunt officiis, facilis veritatis doloremque debitis id perferendis, eveniet esse molestiae eum minus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error accusamus, repudiandae tenetur itaque rem sapiente inventore vel deserunt officiis, facilis veritatis doloremque debitis id perferendis, eveniet esse molestiae*/
/* 							</div>*/
/* 							<a href="" class="btn btn-readmore">Read More</a>*/
/* 						</article>*/
/* 					</div>*/
/* 					<hr>*/
/* 					<div class="single-blog">*/
/* 						<article>*/
/* 							<div class="post-slider">*/
/* 								<div id="post-carousel" class="carousel slide" data-ride="carousel">			*/
/* 									<div class="carousel-inner">*/
/* 										<div class="item active">*/
/* 											<img src="{{common_url('public/home/images/blog/01.jpg')}}" alt="">*/
/* 										</div>*/
/* 										<div class="item">*/
/* 											<img src="{{common_url('public/home/images/blog/02.jpg')}}" alt="">			*/
/* 										</div>*/
/* 										<div class="item">*/
/* 											<img src="{{common_url('public/home/images/blog/03.jpg')}}" alt="">			*/
/* 										</div>*/
/* 										*/
/* 										<a class="post-carousel-left" href="#post-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>*/
/* 										<a class="post-carousel-right" href="#post-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>*/
/* 									</div>		*/
/* 								</div> */
/* 							</div>*/
/* 							<h4 class="post-title"><a href="">Kpsum dolor sit amet, consectetur adipisicing elit.</a></h4>*/
/* 							<div class="post-meta text-uppercase">*/
/* 								<span>Appril 3, 2014</span>*/
/* 								<span>In <a href="">Design</a></span>*/
/* 								<span>By <a href="">Admin</a></span>*/
/* 							</div>*/
/* 							<div class="post-article">*/
/* 								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error accusamus, repudiandae tenetur itaque rem sapiente inventore vel deserunt officiis, facilis veritatis doloremque debitis id perferendis, eveniet esse molestiae eum minus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error accusamus, repudiandae tenetur itaque rem sapiente inventore vel deserunt officiis, facilis veritatis doloremque debitis id perferendis, eveniet esse molestiae*/
/* 							</div>*/
/* 							<a href="" class="btn btn-readmore">Read More</a>*/
/* 						</article>*/
/* 					</div>*/
/* 					<hr>*/
/* 					<div class="single-blog">*/
/* 						<article>*/
/* 							<div class="post-quote">¡°Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti minus quasi temporibus reiciendis veniam reprehenderit, consequuntur. At blanditiis¡±</div>*/
/* 							<h4 class="post-title"><a href="">Kpsum dolor sit amet, consectetur adipisicing elit.</a></h4>*/
/* 							<div class="post-meta text-uppercase">*/
/* 								<span>Appril 3, 2014</span>*/
/* 								<span>In <a href="">Design</a></span>*/
/* 								<span>By <a href="">Admin</a></span>*/
/* 							</div>*/
/* 							<div class="post-article">*/
/* 								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error accusamus, repudiandae tenetur itaque rem sapiente inventore vel deserunt officiis, facilis veritatis doloremque debitis id perferendis, eveniet esse molestiae eum minus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error accusamus, repudiandae tenetur itaque rem sapiente inventore vel deserunt officiis, facilis veritatis doloremque debitis id perferendis, eveniet esse molestiae*/
/* 							</div>*/
/* 							<a href="" class="btn btn-readmore">Read More</a>*/
/* 						</article>*/
/* 					</div>*/
/* 					<hr>*/
/* 					<div class="single-blog">*/
/* 						<article>*/
/* 							*/
/* 							<h4 class="post-title"><a href="">Kpsum dolor sit amet, consectetur adipisicing elit.</a></h4>*/
/* 							<div class="post-meta text-uppercase">*/
/* 								<span>Appril 3, 2014</span>*/
/* 								<span>In <a href="">Design</a></span>*/
/* 								<span>By <a href="">Admin</a></span>*/
/* 							</div>*/
/* 							<div class="post-article">*/
/* 								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error accusamus, repudiandae tenetur itaque rem sapiente inventore vel deserunt officiis, facilis veritatis doloremque debitis id perferendis, eveniet esse molestiae eum minus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error accusamus, repudiandae tenetur itaque rem sapiente inventore vel deserunt officiis, facilis veritatis doloremque debitis id perferendis, eveniet esse molestiae*/
/* 							</div>*/
/* 							<a href="" class="btn btn-readmore">Read More</a>*/
/* 						</article>*/
/* 					</div>*/
/* 					<hr>*/
/* 					<ul class="pagination">*/
/* 						<li><a href="#"><i class="fa fa-angle-left"></i></a></li>*/
/* 						<li class="active"><a href="#">1</a></li>*/
/* 						<li><a href="#">2</a></li>*/
/* 						<li><a href="#">3</a></li>*/
/* 						<li><a href="#">4</a></li>*/
/* 						<li><a href="#"><i class="fa fa-angle-right"></i></a></li>*/
/* 					</ul>*/
/* 				</div>*/
/* 				<div class="col-md-3">*/
/* 					<div class="sidebar-widget">*/
/* 						<div class="blog-search">*/
/*                             <form>*/
/*                                 <input type="text" name="search">*/
/*                                 <span>*/
/*                                 	<button id="submit_btn" class="search-submit" type="submit">*/
/*                                     <i class="fa fa-search"></i>*/
/*                                     </button>*/
/*                                 </span>*/
/*                             </form>*/
/*                         </div>*/
/* 					</div>*/
/* 					<div class="sidebar-widget">*/
/* 						<h4 class="sidebar-title">Categories</h4>*/
/* 						<ul>*/
/* 							<li><a href="">Web Design</a></li>*/
/* 							<li><a href="">Web Development</a></li>*/
/* 							<li><a href="">Video</a></li>*/
/* 							<li><a href="">HTML</a></li>*/
/* 							<li><a href="">CSS</a></li>*/
/* 						</ul>*/
/* 					</div>*/
/* 					<div class="sidebar-widget">*/
/* 						<h4 class="sidebar-title">Flickr</h4>*/
/* 						<ul class="content-flickr">*/
/* 							<li>*/
/*                                 <a href="#" title="">*/
/*                                     <img class="img-responsive" src="{{common_url('public/home/images/img1.png')}}" alt="">*/
/*                                 </a>*/
/*                             </li>*/
/*                             <li>*/
/*                                 <a href="#">*/
/*                                     <img class="img-responsive" src="{{common_url('public/home/images/img2.png')}}" alt="">*/
/*                                 </a>*/
/*                             </li>*/
/*                             <li>*/
/*                                 <a href="#">*/
/*                                     <img class="img-responsive" src="{{common_url('public/home/images/img3.png')}}" alt="">*/
/*                                 </a>*/
/*                             </li>*/
/*                             <li>*/
/*                                 <a href="#">*/
/*                                     <img class="img-responsive" src="{{common_url('public/home/images/img4.png')}}" alt="">*/
/*                                 </a>*/
/*                             </li>*/
/*                             <li>*/
/*                                 <a href="#">*/
/*                                     <img class="img-responsive" src="{{common_url('public/home/images/img5.png')}}" alt="">*/
/*                                 </a>*/
/*                             </li>*/
/*                             <li>*/
/*                                 <a href="#">*/
/*                                     <img class="img-responsive" src="{{common_url('public/home/images/img6.png')}}" alt="">*/
/*                                 </a>*/
/*                             </li>*/
/* 						</ul>*/
/* 					</div>*/
/* 					<div class="sidebar-widget">*/
/* 						<h4 class="sidebar-title">Tags</h4>*/
/* 						<div class="tagcloud">*/
/* 							<a href="">design</a>*/
/* 							<a href="">html</a>*/
/* 							<a href="">php</a>*/
/* 							<a href="">wordpress</a>*/
/* 							<a href="">css</a>*/
/* 							<a href="">development</a>*/
/* 							<a href="">theme</a>*/
/* 							<a href="">plugin</a>*/
/* 						</div>*/
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 	</section>*/
/* 	<!-- /BLOG -->*/
/* {% endblock %}*/
