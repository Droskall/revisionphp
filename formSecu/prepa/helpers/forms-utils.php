<?php

/**
 * Return a secured string POST data by provided name.
 * @param string $name
 * @return string
 */
function getSecuredStringPostData(string $name): string {
    $data = $_POST[$name] ?? '';
    return strip_tags(trim($data));
}

/**
 * Return a secured int POST data by provided name.
 * @param string $name
 * @param int $defaultValue
 * @return int
 */
function getSecuredIntPostData(string $name, int $defaultValue = 0): int {
    $data = $_POST[$name] ?? $defaultValue;
    return (int)trim($data);
}


/**
 * Check parameters existance.
 * @param string ...$inputNames
 * @return bool
 */
function issetMandatoryPostValues(string ...$inputNames): bool {
    foreach ($inputNames as $inputName){
        if (!isset($_POST[$inputName]) || empty($_POST[$inputName])){
            return false;
        }
    }
    return true;
}


/**
 * @param int $min
 * @param int $max
 * @param string $inputName
 * @param string $redirectURL
 * @return void
 */
function validateRange(int $min, int $max, string $inputName, string $redirectURL): void {
    if (strlen($_POST[$inputName]) < $min || strlen($_POST[$inputName]) > $max){
        header("Location: ". $redirectURL);
        exit();
    }
}

/**
 * @param $password
 * @return bool
 */
function passwordCheck (string $password):bool{
    $upercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[1-9]@', $password);
    $special = preg_match('@[^\w]@', $password);

    if (!$upercase || !$lowercase || !$number || !$special){
        return false;
    }
    return true;
}