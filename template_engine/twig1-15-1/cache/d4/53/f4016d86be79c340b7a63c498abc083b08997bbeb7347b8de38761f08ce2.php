<?php

/* template_assign.html */
class __TwigTemplate_d453f4016d86be79c340b7a63c498abc083b08997bbeb7347b8de38761f08ce2 extends Twig_Template
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
        // line 1
        echo "<!doctype html>
<html>
    <head>
        <meta charset=\"utf-8\" />
        <title>PHP Template Engine Comparison - Test</title>
        <style>
            .even{ background: #f8f8f8; }
            .odd{ background: #d8d8d8; }
        </style>
    </head>
    <body>
        <h1>Template test</h1>
        <br/>
        ";
        // line 14
        $this->env->loadTemplate("__table.php")->display($context);
        // line 15
        echo "    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "template_assign.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 15,  34 => 14,  19 => 1,);
    }
}
