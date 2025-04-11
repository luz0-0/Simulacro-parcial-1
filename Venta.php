<?php
class Venta {
private int $numeroVenta;
private string $fecha;
private Cliente $cliente; 
private array $motos;
private float $precioFinal;

public function __construct(
    int $numeroVenta, 
    string $fecha, 
    Cliente $cliente, 
    array $motos, 
    float $precioFinal
) {
    $this->numeroVenta = $numeroVenta;
    $this->fecha = $fecha;
    $this->cliente = $cliente;
    $this->motos = $motos;
    $this->precioFinal = $precioFinal;
}

public function setNumeroVenta($numeroVenta) {
    $this->numeroVenta = $numeroVenta;
}

public function setFecha($fecha) {
    $this->fecha = $fecha;
}

public function setCliente($cliente) {
    $this->cliente = $cliente;
}

public function setMotos($motos) {
    $this->motos = $motos;
}

public function setPrecioFinal($precioFinal) {
    $this->precioFinal = $precioFinal;
}

public function getNumeroVenta() {
    return $this->numeroVenta;
}

public function getFecha() {
    return $this->fecha;
}

public function getCliente() {
    return $this->cliente;
}

public function getMotos() {
    return $this->motos;
}

public function getPrecioFinal() {
    return $this->precioFinal;
}


public function IncMoto($moto, $estadoMoto) {
    if ($estadoMoto == true) {
        $this->motos[] = $moto;
    }
}

public function __toString() {
    $resultado = "Venta N°: " . $this->numeroVenta . "\n";
    $resultado .= "Fecha: " . $this->fecha . "\n";
    $resultado .= "Cliente: " . $this->cliente->__toString() . "\n";
    $resultado .= "Motos vendidas:\n";

    foreach ($this->motos as $moto) {
        $resultado .= $moto->__toString() . "\n";
    }

    $resultado .= "Precio final: " . $this->precioFinal . "\n";

    return $resultado;
}
}

