<?php


class Predstava
{
    public $id;
    public $naziv;
    public $zanr;
    public $trajanje;
    public $opis;
    

    public function __construct($id = null, $naziv = null, $zanr = null, $opis = null, $trajanje = null)
    {
        $this->id = $id;
        $this->naziv = $naziv;
        $this->zanr = $zanr;
        $this->opis = $opis;
        $this->trajanje = $trajanje;
    }

    public static function getAll(mysqli $conn)
    {
        $q = "SELECT * FROM predstava ORDER BY naziv"; // ovde mi sortira po nazivu
        return $conn->query($q);
    }

    public static function getById($id, mysqli $conn)
    {
        $q = "SELECT * FROM predstava WHERE id=$id";
        $myArray = array();
        if ($result = $conn->query($q)) {

            while ($row = $result->fetch_array(1)) {
                $myArray[] = $row;
            }
        }
        return $myArray;
    }

    public static function deleteById($id, mysqli $conn)
    {
        $q = "DELETE FROM predstava WHERE id=$id";
        return $conn->query($q);
    }

    public static function add($naziv, $zanr, $opis, $trajanje, mysqli $conn)
    {
        
        $q = "INSERT INTO predstava(naziv,zanr,opis,trajanje) values('$naziv','$zanr', '$opis', $trajanje)";
        return $conn->query($q);
        
    }

    public static function update($id, $naziv, $zanr, $opis, $trajanje, mysqli $conn)
    {
        $q = "UPDATE predstava set naziv='$naziv', zanr='$zanr', opis='$opis', trajanje=$trajanje where id=$id";
        return $conn->query($q);
    }
}