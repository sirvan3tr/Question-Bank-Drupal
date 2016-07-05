<?php

/* modules/views_infinite_scroll/templates/views-infinite-scroll-pager.html.twig */
class __TwigTemplate_f3b34e38117c8310f3ee65d0475eeee0570df8ff37647a4b0f2413dd322e82c2 extends Twig_Template
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
        $tags = array("if" => 8);
        $filters = array("t" => 11);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if'),
                array('t'),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 7
        echo "
";
        // line 8
        if ($this->getAttribute((isset($context["items"]) ? $context["items"] : null), "next", array())) {
            // line 9
            echo "<ul class=\"js-pager__items pager";
            if ($this->getAttribute((isset($context["options"]) ? $context["options"] : null), "automatically_load_content", array())) {
                echo " infinite-scroll-automatic-pager";
            }
            echo "\">
  <li class=\"pager__item\">
    <a class=\"button\" href=\"";
            // line 11
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute((isset($context["items"]) ? $context["items"] : null), "next", array()), "href", array()), "html", null, true));
            echo "\" title=\"";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Go to next page")));
            echo "\" rel=\"next\">";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["options"]) ? $context["options"] : null), "button_text", array()), "html", null, true));
            echo "</a>
  </li>
</ul>
";
        }
    }

    public function getTemplateName()
    {
        return "modules/views_infinite_scroll/templates/views-infinite-scroll-pager.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 11,  48 => 9,  46 => 8,  43 => 7,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * The views infinite scroll pager template.*/
/*  *//* */
/* #}*/
/* */
/* {% if items.next %}*/
/* <ul class="js-pager__items pager{% if options.automatically_load_content %} infinite-scroll-automatic-pager{% endif %}">*/
/*   <li class="pager__item">*/
/*     <a class="button" href="{{ items.next.href }}" title="{{ 'Go to next page'|t }}" rel="next">{{ options.button_text }}</a>*/
/*   </li>*/
/* </ul>*/
/* {% endif %}*/
/* */
