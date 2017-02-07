
<?php
/****************************************************
 * helper.php
 *
 * CSCI S-75
 * Project 2
 * Beshari jamal
 *
 * Renders a view template with specified parameters
 ****************************************************/
/*
 * render(tem, data[]) - Renders the template
 */
function render($template, $data = array())
{
    $path = __DIR__ . '/../view/' . $template . '.php';
	if (file_exists($path))
    {
        extract($data); //extracts date from array as variables (from keys)
        require($path);
    }
}
?>