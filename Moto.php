<?php
class Moto {
private int $codigoMoto;
private int $costoMoto;
private int $añoFabricacion;
private string $descripcion;
private float $porcentajeIncrementoAnual;
private bool $estadoMoto;

public function __construct(
    int $codigoMoto, 
    int $costoMoto, 
    int $añoFabricacion, 
    string $descripcion, 
    float $porcentajeIncrementoAnual, 
    bool $estadoMoto
) {
    $this->codigoMoto = $codigoMoto;
    $this->costoMoto = $costoMoto;
    $this->añoFabricacion = $añoFabricacion;
    $this->descripcion = $descripcion;
    $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
    $this->estadoMoto = $estadoMoto;
}

public function setCodigoMoto($codigoMoto) {
    $this->codigoMoto = $codigoMoto;
}

public function setCostoMoto($costoMoto) {
    $this->costoMoto = $costoMoto;
}

public function setAñoFabricacion($añoFabricacion) {
    $this->añoFabricacion = $añoFabricacion;
}

public function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
}

public function setPorcentajeIncrementoAnual($porcentajeIncrementoAnual) {
    $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
}

public function setEstadoMoto($estadoMoto) {
    $this->estadoMoto = $estadoMoto;
}

public function getCodigoMoto() {
    return $this->codigoMoto;
}

public function getCostoMoto() {
    return $this->costoMoto;
}

public function getAñoFabricacion() {
    return $this->añoFabricacion;
}

public function getDescripcion() {
    return $this->descripcion;
}

public function getPorcentajeIncrementoAnual() {
    return $this->porcentajeIncrementoAnual;
}

public function getEstadoMoto() {
    return $this->estadoMoto;
}

public function darPrecioVenta($añoActual) {
    if (!$this->estadoMoto) {
        return -1;
    }
    $diferenciaAños = $añoActual - $this->añoFabricacion;
    $costoConIncremento = $this->costoMoto + ($this->costoMoto * ($diferenciaAños * $this->porcentajeIncrementoAnual / 100));
    return $costoConIncremento;
}

public function __toString() {
    return "Código de moto: " . $this->codigoMoto . "\n" .
           "Costo de moto: " . $this->costoMoto . "\n" .
           "Año de fabricación: " . $this->añoFabricacion . "\n" .
           "Descripción: " . $this->descripcion . "\n" .
           "Porcentaje de incremento anual: " . $this->porcentajeIncrementoAnual . "\n" .
           "Estado de moto: " . ($this->estadoMoto ? 'Disponible' : 'No disponible') . "\n";
}





}
