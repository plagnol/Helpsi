<?php
/**
 * 
 * @param int $lenght
 * @return string Random string $lenght-long
 */
function generateRandomString($lenght)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $lenght; $i ++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
generateRandomString(25);