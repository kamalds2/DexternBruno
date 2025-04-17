<?php

/**
 * File Uploader
 * 
 * PHP version 5
 * 
 * @author siriinnovations.com
 * @version 1.0
 * @license http://URL name 
 * @access public
 */
class File {
    
    /**
     *
     * @var string
     */
    public $fileNameExtention = NULL;
    
    /**
     *
     * @var string
     */
    public $fileType;
    
    /**
     *
     * @var string
     */
    public $fileTemp;
    
    /**
     *
     * @var integer
     */
    public $fileSize;
    
    /**
     *
     * @var string
     */
    public $fileName;


    /**
     * constructor
     * 
     */
    public function __construct() {
        
    }
    
    /**
     * 
     * @param string $path
     * @param string $extention
     */    
    public function upload($path, $extention = NULL) {
       
        $array = explode('.', $this->fileName);
        $file_ext = end( $array);
           
    if ((($this->fileType == "image/gif")
            || ($this->fileType == "image/jpeg")
            || ($this->fileType == "image/png")
            || ($this->fileType == "application/msword")
            || ($this->fileType == "text/pdf")
            || ($this->fileType == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
            || ($this->fileType == "image/pjpeg"))
            && ($this->fileSize < 2000000)
            && in_array($file_ext, $this->fileNameExtention)) {
        
            move_uploaded_file($this->fileTemp, $path .$this->fileName);
               
            }
           
    }
}
?>
