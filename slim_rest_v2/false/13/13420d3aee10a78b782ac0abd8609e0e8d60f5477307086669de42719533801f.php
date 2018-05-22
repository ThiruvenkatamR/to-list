<?php

/* login_view.php */
class __TwigTemplate_34b808116c442ec95d742772018909dc22336a334860f339dad42fc944231ac2 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE>
<html>

<head>
    <title>Login</title>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"css/login.css\"></link>
</head>
<img src=\"logo.png\" width=\"100px\" height=\"100px\">
<h1>TO DO LIST(REST IMPLEMENTATION)</h1>

<body>
    <form method=\"post\" action=\"/login\">
        <table>
            <tr>
                <th>
                    <label>Username</label>
                </th>
                <td>
                    <input type=\"email\" name=\"username\" placeholder=\"username@example.com\" autocomplete=\"off\" required>
                </td>
            </tr>
            <tr>
                <th>
                    <label>Password</label>
                </th>
                <td>
                    <input type=\"password\" name=\"password\" required>
                </td>
            </tr>
            <tr>
                <th>                  
                </th>
                <td>
                    <?php
                    if(\$x==1)
                    {
                    ?>
                    Invalid credentials
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type=\"submit\" name=\"login\" value=\"Login\">
                </td>
            </tr>
        </table>

    </form>

</body>
</html>";
    }

    public function getTemplateName()
    {
        return "login_view.php";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "login_view.php", "C:\\xampp\\htdocs\\slim_rest\\templates\\login_view.php");
    }
}
