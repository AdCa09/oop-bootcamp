<?php

$noms = array(
    "Alice", "Bob", "Charlie", "David", "Eve",
    "Frank", "Grace", "Henry", "Ivy", "Jack"
);



class Students {
    public $nom;
    public $note;

    public function __construct($nom) {
        $this->nom = $nom;
        $this->note = $this->generateNote();
    }

    public function generateNote() {
        return rand(0, 20);
    }

    public function afficherInfo() {
        return $this->nom . " - Note : " . $this->note;
    }


    public static function moyenneGroupe($groupe){
        $total = 0;
        foreach($groupe as $student){
            $total += $student->note;
        }
        return count($groupe) > 0 ? $total/count($groupe) : 0;
    }

    public function moveStudent(&$groupeSource, &$groupeDestination) {
     
        $key = array_search($this, $groupeSource, true);
        if ($key !== false) {
           
            array_splice($groupeSource, $key, 1);

            $groupeDestination[] = $this;

            echo $this->nom . " a été déplacé de groupe.\n";
        } else {
            echo $this->nom . " n'a pas été trouvé dans le groupe source.\n";
        }
    }

}

$groupe1 = array();
$groupe2 = array();

for ($i = 0; $i < 5; $i++) {
    $groupe1[] = new Students($noms[$i]);
}

for ($i = 5; $i < 10; $i++) {
    $groupe2[] = new Students($noms[$i]);
}
"\n";
echo "Groupe 1 : \n";
foreach ($groupe1 as $student) {
    echo $student->afficherInfo() . "\n";
    
}
"\n";
echo "\n Groupe 2 : \n";
foreach ($groupe2 as $student) {
    echo $student->afficherInfo() . "\n";
}

$moyenneGroupe1 = Students::moyenneGroupe($groupe1);
$moyenneGroupe2 = Students::moyenneGroupe($groupe2);

echo "\n Moyenne Groupe 1 : " . $moyenneGroupe1 . "\n";
echo "Moyenne Groupe 2 : " . $moyenneGroupe2 . "\n";
"<br>";



$eleveADeplacer = $groupe2[9]; // remplacer par un nombre (jusque 4) pour déplacer un autre student 
$eleveADeplacer->moveStudent($groupe2, $groupe1);

echo "\n Après le déplacement : \n";
echo "Groupe 1 : \n";
foreach ($groupe1 as $student) {
    echo $student->afficherInfo() . "\n";
}

echo "<br>Groupe 2 : \n";
foreach ($groupe2 as $student) {
    echo $student->afficherInfo() . "\n";
}
?>
