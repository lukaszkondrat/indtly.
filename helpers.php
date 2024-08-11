<?php

/**
 * Get the base path
 * 
 * @param string $path
 * @return string
 */
function basePath($path = '') {
    // echo  __DIR__ . '/' . $path;
    return __DIR__ . '/' . $path;

}

/**
 * Load a view
 * 
 * @param string $name
 * @return void
 */
function loadView($name, $data = []) {
    $viewPath = basePath("App/views/{$name}.view.php");

    if(file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "View {$viewPath} not found!";
    }
}

/**
 * Load a partial
 * 
 * @param string $name
 * @return void
 */
function loadPartial($name, $data = []) {
    $partialPath = basePath("App/views/partials/{$name}.php");

    if(file_exists($partialPath)) {
        extract($data);
        require $partialPath;
    } else {
        echo "Partial {$partialPath} not found!";
    }
}

/**
 * Inspect value(s)
 * 
 * @param mixed $value
 * @return void
 */
function inspect($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

/**
 * Inspect value(s) and die
 * 
 * @param mixed $value
 * @return void
 */
function inspectAndDie($value) {
    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';
}

/**
 * format salary
 * 
 * @param string $salary
 * @return string $formattedSalary
 */
function formatSalary($salary) {
    return '$' . number_format(floatval($salary));
}

/**
 * Sanitize data
 * 
 * @param string $dirtyData
 * @return string
 */
function sanitize($dirtyData) {
    return filter_var(trim($dirtyData), FILTER_SANITIZE_SPECIAL_CHARS);
}

/**
 * Redirect to a given url
 * 
 * @param string $url
 * @return void
 */
function redirect($url) {
    header("Location: {$url}");
    exit;
}

?>