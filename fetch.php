<?php

require_once './conexion.php';
class MostrarData
{

    private $PDO;
    public function __construct()
    {
        $con = new Conexion();
        $this->PDO = $con->conectar();
    }

    public function mostrar($id)
    {
        $sql = "SELECT t1.dni_user, t1.cantidad, t1.total,
        t2.nombre, t2.descripciont, t2.costo
        FROM pago t1
        JOIN tipo_tramite t2 ON t1.tipo_tramite_id = t2.tipo_tramite_id WHERE pago_id = :id";
        $query = $this->PDO->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function actualizar($id, $estado)
    {
        $sql = "UPDATE pago SET total = :total WHERE pago_id = :id";
        $query = $this->PDO->prepare($sql);
        $query->bindParam(':total', $estado);
        $query->bindParam(':id', $id);
        $query->execute();
        return $query;
    }
}
