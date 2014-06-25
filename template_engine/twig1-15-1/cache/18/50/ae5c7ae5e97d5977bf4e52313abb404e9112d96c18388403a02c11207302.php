<?php

/* __table_row.php */
class __TwigTemplate_1850ae5c7ae5e97d5977bf4e52313abb404e9112d96c18388403a02c11207302 extends Twig_Template
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
        echo "<tr class=\"";
        if ((((isset($context["index"]) ? $context["index"] : null) % 2) == 1)) {
            echo "even";
        } else {
            echo "odd";
        }
        echo "\">
    <td>";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : null), "id"), "html", null, true);
        echo "</td>
    <td>";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : null), "name"), "html", null, true);
        echo "</td>
    <td>";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : null), "age"), "html", null, true);
        echo "</td>
    <td>";
        // line 5
        echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute((isset($context["row"]) ? $context["row"] : null), "lotto_numbers"), ", "), "html", null, true);
        echo "</td>
</tr>
<tr class=\"";
        // line 7
        if ((((isset($context["index"]) ? $context["index"] : null) % 2) == 1)) {
            echo "even";
        } else {
            echo "odd";
        }
        echo "\">
    <td colspan=\"4\">
        <h4>Lead</h4>
        <p>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : null), "lead"), "html", null, true);
        echo "</p>
        <h4>Description</h4>
        <p>";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : null), "description"), "html", null, true);
        echo "</p>
        <br/>
    </td>
</tr>";
    }

    public function getTemplateName()
    {
        return "__table_row.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 12,  55 => 10,  45 => 7,  40 => 5,  36 => 4,  32 => 3,  28 => 2,  65 => 14,  51 => 13,  48 => 12,  31 => 11,  19 => 1,);
    }
}
