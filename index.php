<?php

// Mengunakan trait karena tidak menginstansiaso hewan dan fight
// sproperty yang ada di kelas Hewan adalah 
// nama, darah dengan nilai default 50, jumlahKaki, dan keahlian.
trait Hewan
{
    public $nama, $darah = 50, $jumlahKaki, $keahlian;

    public function atraksi($skill)
    {
        return "<br>" . $this->nama . " " . $this->keahlian . " " . "untuk menangkap "
            . $skill->nama . " yang akan " . $skill->keahlian . "." . "<br>";
    }
}

// property yang ada di kelas Fight adalah attackPower, defencePower.

trait Fight
{
    public $attackPower, $defencePower;

    public function serang($penyerang)
    {
        return "<br>" . $this->nama . " menyerang "
            . $penyerang->nama . " dan " . $penyerang->nama . " membalas menyerang "
            . $this->nama . "." . "<br>";
    }

    public function diserang($korban)
    {
        $this->darah = $this->darah - ($korban->attackPower / $this->defencePower);
        return "<br>$this->nama terkena serangan " . $korban->nama
            . " ,darahnya " . $korban->nama . " tersisa " . $this->darah . "." . "<br>";
    }
}

// getInfoHewan(), 
// didalam method ini semua property yang ada di dalam kelas Hewan dan Fight ditampilkan , 
// dan jenis hewan (Elang atau Harimau).
class Harimau
{
    use Hewan, Fight;

    public function GetInfoHewan()
    {
        return " <br>    Seekor " . $this->nama .
            " memiliki kaki " . $this->jumlahKaki .
            " , dengan keahlian " . $this->keahlian .
            " , attack power = " . $this->attackPower .
            " , dan defence power = " . $this->defencePower .
            "." . "<br>";
    }
}

class Elang
{
    use Hewan, Fight;

    public function GetInfoHewan()
    {
        return
            " bertemu dengan <br> Seekor " . $this->nama .
            " memiliki kaki " . $this->jumlahKaki .
            " , dengan keahlian " . $this->keahlian .
            " , attack power = " . $this->attackPower .
            " , dan defence power = " . $this->defencePower . "." . "<br>";
    }
}


// Ketika Elang diinstansiasi, maka jumlahKaki bernilai 2, dan keahlian bernilai “terbang tinggi”, 
// attackPower = 10 , deffencePower = 5 ;
$harimau                = new Harimau();
$harimau->nama          = "harimau";
$harimau->jumlahKaki    = 4;
$harimau->keahlian      = "lari cepat";
$harimau->attackPower   = 7;
$harimau->defencePower  = 8;

echo $harimau->GetInfoHewan();


// Ketika Elang diinstansiasi, maka jumlahKaki bernilai 2, dan keahlian bernilai “terbang tinggi”, 
// attackPower = 10 , deffencePower = 5 ;
$elang                  = new Elang();
$elang->nama            = "elang";
$elang->jumlahKaki      = 2;
$elang->keahlian        = "terbang tinggi";
$elang->attackPower     = 10;
$elang->defencePower    = 5;

echo $elang->GetInfoHewan();



echo $elang->serang($harimau);
echo $harimau->atraksi($elang);
echo $elang->diserang($harimau);

echo "<br>";
echo $harimau->serang($elang);
echo $elang->atraksi($harimau);
echo $harimau->diserang($elang);
