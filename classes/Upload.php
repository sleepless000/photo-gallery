<?php

class Upload
{
    use Resizeable;

    protected $fileName;
    protected $fileType;
    protected $fileSize;
    protected $fileErrorMsg;
    protected $filePath;
    protected $fileCopyPath;

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __isset($name)
    {
        return isset($this->name);
    }

    public function __construct(array $file, string $uploadDir)
    {
        if (!is_writable($uploadDir) || !chmod($uploadDir, 0777)) {
            throw new RuntimeException('Directory is protected. Save failed.');
        }

        if (is_uploaded_file($file['tmp_name'])) {
            $uploadFileName = $this->makeName($file['name']);
            $newName = $uploadDir.$uploadFileName;
            $tempName = $file['tmp_name'];

            if (move_uploaded_file($tempName, $newName)) {
                $this->fileName = basename($newName);
                $this->fileType = $file['type'];
                $this->filePath = $newName;
                $this->fileSize = $file['size'];
                $this->fileErrorMsg = $file['error'];
            } else {
                throw new RuntimeException('File save failed');
            }
        } else {
            throw new RuntimeException('Upload failed');
        }
    }

    protected function makeName(string $oldName): string
    {
        // it will produce a round number based on the current time
        // and append the name from the originally uploaded file.
        return round(microtime(true)) . '_' .$oldName;
    }

    public function copyTo(string $newDir): bool
    {
        $this->fileCopyPath = $newDir . $this->fileName;
        if (!copy($this->filePath, $this->fileCopyPath)) {
            throw new RuntimeException("Can't copy file to {$this->fileCopyPath}");
        }
        return true;
    }
}
