<?php
chdir(__DIR__);
foreach (scandir(__DIR__) as $filename) {
    if (is_file($filename) && substr($filename, -4) === '.xml') {
        $txt = file_get_contents($filename);
        $transform = [
            'tabla>' => 'table>',
            'columna>' => 'column>',
            'nombre>' => 'name>',
            'tipo>' => 'type>',
            'nulo>' => 'null>',
            'defecto>' => 'default>',
            'restriccion>' => 'constraint>',
            'consulta>' => 'type>',
        ];

        $final = strtr($txt, $transform);
        file_put_contents($filename, $final);
        echo $filename . '\n';
    }
}
