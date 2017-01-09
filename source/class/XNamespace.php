<?php


namespace XSpace;

class XNamespace
{

    protected $name;
    protected $children = array();
    protected $parent;

    public function __construct($name)
    {
        $this->name = $this->normalizeNamespace($name);
    }


    public function getName()
    {
        return $this->name;
    }

    public function setParentNamespace(XNamespace $namespace)
    {
        $this->parent = $namespace;
        return $this;
    }

    public function getParentNamespace() {
        if($this->parent) {
            return $this->parent;
        }
        else {
            return false;
        }

    }



    public function addChildNamespace(XNamespace $namespace)
    {
        $this->children = $namespace;
        return $this;
    }


    public function getChildren()
    {
        return $this->children;
    }


    protected function normalizeNamespace($namespace)
    {
        $normalized = $namespace;
        $normalized = preg_replace('`^\\\\`', '', $normalized);
        $normalized = strtolower($normalized);
        return $normalized;
    }
}