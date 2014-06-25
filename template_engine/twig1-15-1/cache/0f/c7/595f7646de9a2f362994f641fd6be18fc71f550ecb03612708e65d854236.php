<?php

/* __table.php */
class __TwigTemplate_0fc7595f7646de9a2f362994f641fd6be18fc71f550ecb03612708e65d854236 extends Twig_Template
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
        echo "<table style=\"border: 1px solid #444444; width: 800px;\">
    <thead>
        <tr>
            <th width=\"10%\">ID</th>
            <th width=\"40%\">Name</th>
            <th width=\"10%\">Age</th>
            <th width=\"40%\">Lotto numbers</th>
        </tr>
    </thead>
    <tbody>
        ";
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["template_data"]) ? $context["template_data"] : null));
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
        foreach ($context['_seq'] as $context["key"] => $context["row"]) {
            // line 12
            echo "            ";
            $this->env->loadTemplate("__table_row.php")->display($context);
            // line 13
            echo "        ";
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
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "    </tbody>
</table>";
    }

    public function getTemplateName()
    {
        return "__table.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 14,  51 => 13,  48 => 12,  31 => 11,  19 => 1,);
    }
}
