<?php
function clean($s)
{
    return htmlspecialchars(trim((string) $s), ENT_QUOTES, 'UTF-8');
}
function getData($fields)
{
    $data = [];
    $errors = [];
    foreach ($fields as $f) {
        $data[$f] = isset($_POST[$f]) ? clean($_POST[$f]) : '';
    }
    foreach ($data as $key => $value) {
        if (in_array($key, $fields) && $value === '') {
            $errors[] = "Il campo '$key' è obbligatorio.";
        }
    }
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
    }
    return $data;
}

/* if ($data['email'] !== '' && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email non valida.';
} */

?>