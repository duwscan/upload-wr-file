<?php
class File
{
    private $file;
    private $fileName;
    public function __construct($fileName, private $mode = "a+")
    {
        $this->fileName = $fileName;
        $this->file = fopen($fileName, $mode);
    }

    public function write($content, $newLine = false)
    {
        if ($newLine) {
            $content .= PHP_EOL;
        }
        fwrite($this->file, $content);
    }
    public function __destruct()
    {
        fclose($this->file);
    }
    public function readLines(callable $callback)
    {
        while (!feof($this->file)) {
            $line = fgets($this->file);
            if (is_callable($callback)) {
                $callback($line);
            } else {
                throw new Exception("Callback is not callable");
            }
        }
    }
}
