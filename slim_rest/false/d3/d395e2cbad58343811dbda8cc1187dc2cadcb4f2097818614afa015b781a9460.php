<?php

/* todo_view.php */
class __TwigTemplate_e6193788fb3b863ff5de3c0b78d1d35173754b2ee95bdfb175214d0eaa61b610 extends Twig_Template
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
        echo "<!DOCTYPE html>
    <html>

    <head>
        <title>To Do List</title>
        <meta charset=\"utf-8\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/todo/CSS/todo.css\"></link>

    </head>

    <body>

        <div class=\"in\">
            <h1>To Do List</h1>
            <form action=\"\" method=\"post\">
                <input type=\"text\" name=\"title\" id=\"title\" placeholder=\"Title\" required>
                <input type=\"text\" name=\"description\" id=\"description\" row=\"20\" placeholder=\"Description\" required>
                <button name=\"add\" class=\"add\" value=\"add\">Add to List</button>
            </form>
            <form method=\"post\">
                <button type=\"submit\" name=\"logout\" class=\"logout\" value=\"logout\">Logout</button>
            </form>
        </div>

            
      

        <ol id=\"list\">
            <?php 
           foreach(\$tasks as \$row){?>
                <li>
                    <form method=\"post\">
                        <button name=\"check\" class=\"check\" value=\"<?php echo \$row['id'];?>\">&#10004;</button>
                    </form>
                    <?php if(\$row[\"checked\"] == 0){?>
                        <span class=\"dropdown\">
                    <?php }else{ ?>
                        <span class=\"dropdown line\">
                            <?php }echo \$row[\"title\"];?>
                                <span class=\"dropdown-content\">
                                    <?php echo \"Description:\\n\".\$row[\"description\"];?>
                                </span>
                        </span>
                        <form method=\"post\">
                            <button name=\"remove\" class=\"remove\" value=\"<?php echo \$row[\"id\"];?>\"> &#10006;</button>
                        </form>
                </li>
            <?php }?> 

        </ol>



    </body>

    </html>";
    }

    public function getTemplateName()
    {
        return "todo_view.php";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "todo_view.php", "C:\\xampp\\htdocs\\slim_rest\\templates\\todo_view.php");
    }
}
