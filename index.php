<?php
require __DIR__ . '/vendor/autoload.php';

$bci = new \Bci\Bci('1eb34a78-6443-4c33-b3c6-1f0fc74cc76a');
$hipotecario = new \Bci\CreditoHipotecario($bci);


//var_dump($hipotecario->tasas(23));

var_dump($hipotecario->simulacion(23, [
        "anosTasaFija"=> 2,
        "codMesExclusion"=> 0,
        "diaVencimiento"=> 10,
        "indDfl2"=> false,
        "indPAC"=> false,
        "mesesGracia"=> 2,
        "seguroHogarContenido"=> false,
        "seguroCesantia"=> false,
        "seguroEnfermedadGrave"=> false,
        "seguroHospitalizacion"=> false,
        "codeudor"=> false,
        "codeudorConSeguroDesgravamen"=> false,
        "seguroCesantiaServiu"=> 0,
        "seguroCesantiaDobleProtecion"=> false,
        "seguroDesgravamenTitular"=> false,
        "fechaNacimientoTitular"=> "",
        "fechaNacimientoCodeudor"=> "",
        "plazo"=> 5,
        "renta"=> 1200000,
        "valorPropiedadUf"=> 10000,
        "montoCreditoUf"=> 7037,
        "codTipoBienRaiz"=> "casa",
        "comuna"=> "Santiago Centro",
        "nombreCliente"=> "Juan",
        "apellidoCliente"=> "Soto",
        "emailCliente"=> "jsoto@mailinator.com",
        "fonoCliente"=> 93849284,
        "ciudad"=> 320,
        "rutCliente"=> 17307813,
        "dvCliente"=> "7",
        "codProducto"=> 12,
        "codSeguro"=> 1,
        "region"=> 23
]));
