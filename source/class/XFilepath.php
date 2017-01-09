<?php


namespace XSpace;

class XFilepath
{

    protected $path;
    protected $children = array();
    protected $parent;

    public function __construct($path)
    {
        $this->path = $this->normalizeFilepath($path);
    }


    public function getpath()
    {
        return $this->path;
    }

    public function getXFilepath($filepath)
    {


        $filepath=$this->normalizeFilepath($filepath);

        if (realpath($filepath)) {
            return $filepath;
        } else if ($this->parent) {
            $xFilepath=str_replace(
                $this->getpath(),
                $this->parent->getPath(),
                $filepath
            );

            return $this->parent->getXFilepath($xFilepath);
        }
        return false;
    }


    public function getName()
    {
        return $this->name;
    }

    public function setParentPath(XFilepath $filepath)
    {
        $this->parent = $filepath;
        return $this;
    }

    public function getParentPath()
    {
        if ($this->parent) {
            return $this->parent;
        } else {
            return false;
        }

    }


    public function addChildPath(XFilepath $filepath)
    {
        $this->children = $filepath;
        return $this;
    }


    public function getChildren()
    {
        return $this->children;
    }


    public function normalizeFilepath($filepath)
    {
        $normalized = $filepath;
        $normalized = str_replace('\\', '/', $normalized);
        $normalized = preg_replace('`/$`', '', $normalized);

        return $normalized;
    }

}
