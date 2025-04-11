<?php
class Empresa {
private string $denominacion;
private string $direccion;
private array $coleccionClientes = [];
private array $coleccionMotos;
private array $coleccionVentas;

public function __construct(
    string $denominacion, 
    string $direccion, 
    array $coleccionClientes = [], 
    array $coleccionMotos = [], 
    array $coleccionVentas = []
) {
    $this->denominacion = $denominacion;
    $this->direccion = $direccion;
    $this->coleccionClientes = $coleccionClientes;
    $this->coleccionMotos = $coleccionMotos;
    $this->coleccionVentas = $coleccionVentas;
}

public function setDenominacion(string $denominacion) {
    $this->denominacion = $denominacion;
}

public function setDireccion(string $direccion) {
    $this->direccion = $direccion;
}

public function setColeccionClientes($coleccionClientes) {
    $this->coleccionClientes = $coleccionClientes;

}

public function setColeccionMotos($coleccionMotos) {
    $this->coleccionMotos = $coleccionMotos;

}

public function setColeccionVentas($coleccionVentas) {
    $this->coleccionVentas = $coleccionVentas;

}

public function getDenominacion() {
    return $this->denominacion;

}

public function getDireccion() {
    return $this->direccion;

}

public function getColeccionClientes() {
    return $this->coleccionClientes;

}

public function getColeccionMotos() {
    return $this->coleccionMotos;

}

public function getColeccionVentas() {
    return $this->coleccionVentas;

}

public function retornarMoto($codigoMoto) {
    foreach ($this->coleccionMotos as $moto) {
        if ($moto instanceof Moto && $moto->getCodigoMoto() === $codigoMoto) {
            return $moto;
        }
    }
    return null;
}

public function registrarVenta($colCodigosMoto, $objCliente) {
    if (!$objCliente->getEstadoCliente()) {
        return "Error. Cliente inactivo.";
    }

    $motosVendidas = [];
    $importeFinal = 0;

    foreach ($colCodigosMoto as $codigoMoto) {
        $moto = $this->retornarMoto($codigoMoto);

        if ($moto !== null && $moto->getEstadoMoto()) {
            $precioVenta = $moto->darPrecioVenta(date("Y"));
            $importeFinal += $precioVenta;
            $motosVendidas[] = $moto;
            $moto->setEstadoMoto(false);
        }
    }

    if (count($motosVendidas) === 0) {
        return "No hay motos disponibles.";
    }

    $nuevaVenta = new Venta(
        count($this->coleccionVentas) + 1,
        date("Y-m-d"),
        $objCliente,
        $motosVendidas,
        $importeFinal
    );

    $this->coleccionVentas[] = $nuevaVenta;

    return $importeFinal;
}

public function retornarVentasXCliente($tipo, $numDoc) {
    $ventasCliente = [];

    foreach ($this->coleccionVentas as $venta) {
        $cliente = $venta->getCliente();
        if ($cliente->getTipoDocumento() === $tipo && $cliente->getNumeroDocumento() === $numDoc) {
            $ventasCliente[] = $venta;
        }
    }

    return $ventasCliente;
}

public function __toString() {
    $resultado = "Denominación:\n" . $this->denominacion . "\n";
    $resultado .= "Dirección:\n" . $this->direccion . "\n";
    $resultado .= "Clientes:\n" . "\n";

    foreach ($this->coleccionClientes as $cliente) {
        $resultado .= $cliente->__toString() . "\n";
    }

    $resultado .= "Motos:\n \n";
    foreach ($this->coleccionMotos as $moto) {
        $resultado .= $moto->__toString() . "\n";
    }

    $resultado .= "Ventas:\n \n";
    foreach ($this->coleccionVentas as $venta) {
        $resultado .= $venta->__toString() . "\n";
    }

    return $resultado;
}





}