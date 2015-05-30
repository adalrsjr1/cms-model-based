<?php
/**
 * Created by PhpStorm.
 * User: Adalberto
 * Date: 30/05/2015
 * Time: 18:16
 */

class HTMLFactories {
    public static function Paragraph($paragraph) {
        return "
            <p>
                $paragraph->content
            </p>
        ";
    }
}