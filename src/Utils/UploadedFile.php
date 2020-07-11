<?php

namespace App\Utils;


use App\Exception\UploadFileException;

/**
 * Class UploadedFile
 *
 * Classe que gestiona la pujada de fitxers al servidor mitjançant formularis
 */
class UploadedFile
{
    /**
     * @var array
     *
     * Array del fitxer pujat. $_FILES['nom_del_camp_del_formuari']
     */
    private $file;
    /**
     * @var string
     *
     * Nom amb que es guardarà el fitxer.
     */
    private $fileName;
    /**
     * @var int
     *
     * Mida màxima en bytes del fitxer, 0 indica que no hi ha límit.
     */

    private $maxSize;
    /**
     * @var array
     *
     * Array amb els MimeType acceptats. Per exemple ['image/jpg', 'image/gif', image/png']. Si l'array és buit
     * s'accepten tots els tipus.
     */
    private $acceptedTypes;


    /**
     * UploadedFile constructor.
     * @param array $uploadedFile
     * @param int $maxSize
     * @param array $acceptedTypes
     */
    public function __construct(array $uploadedFile, int $maxSize = 0, array $acceptedTypes = array()){
        $this->file = $uploadedFile;
        $this->fileName = $uploadedFile['name'];
        $this->acceptedTypes = $acceptedTypes;
        $this->maxSize = $maxSize;

    }

    /**
     * @return bool
     *
     * Comprova que el fitxer s'haja pujat correctament, que no supera el limit de grandària i és del tipus indicat.
     * Si no passa la validació tornarà false.
     * @throws UploadFileException
     */
    public function validate(): bool {
        if (empty($this->file)) return false;
        $imageSize = $this->file['size'];
        $imageType = $this->file['type'];
        if ($this->file['error'] === UPLOAD_ERR_OK) {
            if ($this->maxSize === 0 || $imageSize < $this->maxSize) {
                if (count($this->acceptedTypes) === 0 || in_array($imageType, $this->acceptedTypes))
                    return true;
                else
                    throw new UploadFileException("El tipus de la imatge ($imageType) no és del tipus
                        adequat:" . implode(", ", $this->acceptedTypes));
            }
            else
                throw new UploadFileException("La grandària de la imatge ($imageSize) supera el límit establert: $this->maxSize");
        }
        else
            return false;
    }

    /**
     * @return string
     *
     * Tornarà el nom del fitxer.
     */
    public function getFileName():string
    {
        return $this->fileName;
    }


    /**
     * @param string $path
     * @param string $fileName
     * @return bool
     *
     * Guarda el fitxer en la ubicació indicada. Si no s'indica nom es guardarà amb el mateix nom que s'ha penjat.
     * Exemple: $path = '/public/images/', $fileName = 'prova.png'
     *
     * Torna true si s'ha pogut moure la imatge a la ubicació indicada.
     */
    public function save(string $path, $fileName = ""): bool {
        if (!is_uploaded_file($this->file['tmp_name'])) {
            return false;
        }
        if (strlen($fileName)===0) {
            $fileName = $this->file["name"];

        }
        else {
            $this->fileName = $fileName; 
        }

        if (move_uploaded_file($this->file["tmp_name"], $path.$fileName))
            return true;
        else
            return false;
    }
}