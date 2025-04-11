<?php
class Cliente {
private string $nombre;
private string $apellido;
private string $tipoDocumento;
private int $numeroDocumento;
private bool $estadoCliente;

public function __construct(
    string $nombre, 
    string $apellido, 
    string $tipoDocumento, 
    int $numeroDocumento, 
    bool $estadoCliente
    ) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipoDocumento = $tipoDocumento;
        $this->numeroDocumento = $numeroDocumento;
        $this->estadoCliente = $estadoCliente;
}

public function setNombre($nombre) {
    $this->nombre= $nombre;
    }

public function setApellido($apellido) {
    $this->apellido = $apellido;
    }

public function setTipoDocumento($tipoDocumento) {
    $this->tipoDocumento = $tipoDocumento;
    }

public function setNumeroDocumento($numeroDocumento) {
    $this->numeroDocumento = $numeroDocumento;
    }

    public function setEstadoCliente($estadoCliente) {
        $this->estadoCliente = $estadoCliente;
        }

public function getNombre() {
    return $this->nombre;
}

public function getApellido() {
    return $this->apellido;
}

public function getTipoDocumento() {
    return $this->tipoDocumento;
}

public function getNumeroDocumento() {
    return $this->numeroDocumento;
}

public function getEstadoCliente() {
    return $this->estadoCliente;
}

public function __toString() {
    return "Nombre: " . $this->nombre . "\n" .
           "Apellido: " . $this->apellido . "\n" .
           "Tipo de documento: " . $this->tipoDocumento . "\n" .
           "Número de documento: " . $this->numeroDocumento . "\n" .
           "Estado del cliente: " . ($this->estadoCliente ? 'Activo' : 'Inactivo');
}


}
