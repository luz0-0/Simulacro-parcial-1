<?php
include_once 'Empresa.php';
include_once 'Cliente.php';
include_once 'Moto.php';
include_once 'Venta.php';


$objCliente1 = new Cliente("nombre 1", "apellido 1", "dni 1", 1234, true);
$objCliente2 = new Cliente("nombre 2", "apellido 2", "dni 2", 12345, true);

$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
$objMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250 ", 55, false);

$objEmpresa = new Empresa(
    "Alta Gama",
    "Av Argentina 123",
    [$objCliente1, $objCliente2],
    [$objMoto1, $objMoto2, $objMoto3],
    []
);


echo "Punto 5: \n";
$resultado1 = $objEmpresa->registrarVenta([11, 12, 13], $objCliente2);
echo "Resultado: {$objCliente2->getNombre()}: $resultado1\n";
echo "\n";

echo "Punto 6: \n";
$resultado2 = $objEmpresa->registrarVenta([0], $objCliente2);
echo "Resultado: {$objCliente2->getNombre()}: $resultado2\n";
echo "\n";

echo "Punto 7: \n";
$resultado3 = $objEmpresa->registrarVenta([2], $objCliente2);
echo "Resultado: {$objCliente2->getNombre()}: $resultado3\n";
echo "\n";

echo "Punto 8: \n";
$ventasCliente1 = $objEmpresa->retornarVentasXCliente($objCliente1->getTipoDocumento(), $objCliente1->getNumeroDocumento());
echo "Ventas realizadas al cliente {$objCliente1->getNombre()}:\n";
foreach ($ventasCliente1 as $venta) {
    echo $venta . "\n";
}
echo "\n";

echo "Punto 9: \n";
$ventasCliente2 = $objEmpresa->retornarVentasXCliente($objCliente2->getTipoDocumento(), $objCliente2->getNumeroDocumento());
echo "Ventas realizadas al cliente {$objCliente2->getNombre()}:\n";
foreach ($ventasCliente2 as $venta) {
    echo $venta . "\n";
}
echo "\n";
echo "Punto 10: \n";
echo "Información de la Empresa:\n";
echo $objEmpresa;