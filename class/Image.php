<?php
class Image {
    public static function Upload(array $file) : string {
        //pobierz oryginalną nazwe pliku
        $name = $file['name'];
        //wygeneruj unikatowy string na podstawie nazwy pliku i aktualnego czasu
        $name = sha1($name.microtime()).".webp";
        //pobierz ścieżkę pliku tymczasowego
        $tempPath = $file['tmp_name'];
        //wczytaj obraz do stringa
        $imageString = file_get_contents($tempPath);
        //zdekoduj stringa do obrazu
        $image = imagecreatefromstring($imageString);
        //wygeneruj nową ścieżkę pliku
        $path = "uploads/".$name; 
        //zapisać obraz w formacie webp
        imagewebp($image, $path);
        return $path;
    }
}

?>