<?php
session_start();

// Jen pro adminy
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    die("Přístup zamítnut.");
}

// Cesta, kam se obrázky uloží
$target_dir = "uploads/carousel/"; 
if(!is_dir($target_dir)){
    mkdir($target_dir, 0777, true);
}

// Pole pro uložení cest do souboru nebo DB

// načti existující obrázky, pokud existují


// načti existující obrázky, pokud existují
$carousel_paths = [];
if (file_exists("carousel_images.json")) {
    $carousel_paths = json_decode(file_get_contents("carousel_images.json"), true);
    if (!is_array($carousel_paths)) $carousel_paths = [];
}

$uploadSuccess = false;

for($i=1; $i<=5; $i++){
    $key = $i - 1; // zero-based index for array
    $urlField = "carousel_url$i";
    $imgField = "carousel_img$i";
    $url = isset($_POST[$urlField]) ? trim($_POST[$urlField]) : '';
    if($url && filter_var($url, FILTER_VALIDATE_URL)) {
        // If a valid URL is provided, use it and delete old file if it was a local file
        if(isset($carousel_paths[$key]) && $carousel_paths[$key] && !filter_var($carousel_paths[$key], FILTER_VALIDATE_URL) && file_exists($target_dir . $carousel_paths[$key])) {
            unlink($target_dir . $carousel_paths[$key]);
        }
        $carousel_paths[$key] = $url;
        $uploadSuccess = true;
    } else if(isset($_FILES[$imgField]) && $_FILES[$imgField]["error"] == 0){
        $ext = pathinfo($_FILES[$imgField]["name"], PATHINFO_EXTENSION);
        $fileName = "carousel_{$i}." . $ext;
        $target_file = $target_dir . $fileName;
        // Smazat starý obrázek pouze pokud existuje pro tento slot a není to URL
        if(isset($carousel_paths[$key]) && $carousel_paths[$key] && !filter_var($carousel_paths[$key], FILTER_VALIDATE_URL) && file_exists($target_dir . $carousel_paths[$key])) {
            unlink($target_dir . $carousel_paths[$key]);
        }
        if(move_uploaded_file($_FILES[$imgField]["tmp_name"], $target_file)){
            $carousel_paths[$key] = $fileName;
            $uploadSuccess = true;
        }
    }
    // Pokud nebyl nahrán nový obrázek ani zadán URL, nech původní hodnotu v $carousel_paths[$key] beze změny
}

// Ulož pouze aktuální pole obrázků (může být "děravé" - některé sloty mohou chybět)
if (file_put_contents("carousel_images.json", json_encode($carousel_paths))) {
    if ($uploadSuccess) {
        $_SESSION['success'] = "Obrázky carouselu byly úspěšně aktualizovány.";
    } else {
        $_SESSION['success'] = "Nastavení carouselu bylo uloženo.";
    }
} else {
    $_SESSION['error'] = "Chyba při ukládání carouselu.";
}

header("Location: main.php"); // přesměrování zpět na hlavní stránku
exit;
?>
