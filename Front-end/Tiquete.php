<?php
class Ticket {
  // Properties
    public $idTiquetes ;
    public $idEspacio ;
    public $idBus ;
    public $idhorario ;
    public $idRutas ;
    public $idUsuario ;
    public $fechaEmision ;
    public $fechaSalida ;

  // Methods
    function set_idTiquetes($idTiquetes) {
        $this->idTiquetes = $idTiquetes;
    }
    function get_idTiquetes() {
        return $this->idTiquetes;
    }
    function set_idEspacio($idEspacio)
    {
        $this->idEspacio = $idEspacio;
    }
    function get_idEspacio()
    {
        return $this->idEspacio;
    }
    function set_idBus($idBus)
    {
        $this->idBus = $idBus;
    }
    function get_idBus()
    {
        return $this->idBus;
    }
    function set_idhorario($idhorario)
    {
        $this->idhorario = $idhorario;
    }
    function get_idhorario()
    {
        return $this->idhorario;
    }
    function set_idRutas($idRutas)
    {
        $this->idRutas = $idRutas;
    }
    function get_idRutas()
    {
        return $this->idRutas;
    }
    function set_idUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }
    function get_idUsuario()
    {
        return $this->idUsuario;
    }
    function set_fechaEmision($fechaEmision)
    {
        $this->name = $fechaEmision;
    }
    function get_fechaEmision()
    {
        return $this->fechaEmision;
    }
    function set_fechaSalida($fechaSalida)
    {
        $this->fechaSalida = $fechaSalida;
    }
    function get_fechaSalida()
    {
        return $this->fechaSalida;
    }
}

#$tiquete1 = new Ticket();
#$tiquete1->

# echo $tiquete1->get_
