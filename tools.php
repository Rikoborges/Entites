<?php

class Tools {

    public static function clearString(string $chaine): string {
        if (!isset($chaine) || trim($chaine) === '') return '';

        // Limpa espaços e formata
        $chaine = trim($chaine);               // remove espaços extras
        $chaine = strtolower($chaine);         // tudo minúsculo
        $chaine = ucfirst($chaine);            // primeira letra maiúscula

        return $chaine;
    }

}
?>
