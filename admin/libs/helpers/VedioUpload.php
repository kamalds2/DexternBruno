<?php
class VedioUpload
{
    public $FileName;
    public $NewName;
    public $File;
    public $SavePath;
    public $OverWrite;
    public $NameCase;
    private $Error;    

    function __construct()
    {
        $this->FileName = 'videoname.mp4';
        $this->OverWrite = true;
        $this->NameCase = '';
        $this->Error = array();
        $this->NewName = '';
    }    

    function UploadFile()
    {
        if (is_array($this->File['name'])) {
            $this->_ArrayUpload();
        } else {
            $this->_NormalUpload();
        }    
        return $this->Error;
    }    

    function _ArrayUpload()
    {
        for ($i = 0; $i < count($this->File['name']); $i++) {        
            if (!empty($this->File['name'][$i])) {
                $this->_UploadVideo($this->File['name'][$i], $this->File['tmp_name'][$i], $this->File['size'][$i], $this->File['type'][$i], $this->NewName[$i]);
            }
        }
    }    

    function _NormalUpload()
    {
        $_FileName = $this->File['name'];
        $_NewName = $this->NewName;
        if (!empty($this->File['name'])) {
            $this->_UploadVideo($this->File['name'], $this->File['tmp_name'], $this->File['size'], $this->File['type'], $this->NewName);
        }
    }    

    function _UploadVideo($FileName, $TmpName, $Size, $Type, $NewName)
    {    
        $videoExtensions = array('mp4', 'avi', 'mov', 'wmv', 'flv');
        $Ext = strtolower(pathinfo($FileName, PATHINFO_EXTENSION));

        if (in_array($Ext, $videoExtensions)) {
            $NewName = $this->_CheckName($NewName, $FileName);
            if (!$this->_FileExist($NewName, $FileName)) {
                if (move_uploaded_file($TmpName, $this->SavePath . $NewName)) {
                   
                } else {
                    $this->Error[] = "File: " . $NewName . " failed to upload.";
                }
            }
        } else {
            $this->Error[] = "File: " . $FileName . " is not a valid video file.";
        }
    }    

    function _CheckName($NewName, $UpFile)
    {
        if (empty($NewName)) {
            return $this->_ChangeCase($UpFile);
        } else {
            $Ext = explode(".", $UpFile);
            $Ext = end($Ext);
            $Ext = strtolower($Ext);
            $NewName = $this->_ChangeCase($NewName . "." . $Ext);
            return $NewName;
        }
    }    

    function _ChangeCase($FileName)
    {
        if ($this->NameCase == 'lower') {
            return strtolower($FileName);
        } elseif ($this->NameCase == 'upper') {
            return strtoupper($FileName);
        } else {
            return $FileName;
        }
    }    

    function _FileExist($NewName, $FileName)
    {
        if ($this->OverWrite == true) {
            if (file_exists($this->SavePath . $NewName)) {
                if (!unlink($this->SavePath . $NewName)) {
                    $this->Error[] = "File: " . $NewName . " cannot be overwritten.";
                    return true;
                }
            }
        } else {
            if (file_exists($this->SavePath . $NewName)) {
                $this->Error[] = "File: " . $NewName . " already exists.";
                return true;
            }
        }
        return false;
    }
}
?>
