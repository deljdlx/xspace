<?php


namespace XSpace;

class XAutoloader
{

    protected $namespaces = array();


    public function extendsNamespace($parentNamespaceName, $childNamespaceName)
    {
        if (is_string($parentNamespaceName)) {
            $parentNamespaceName = $this->normalizeNamespace($parentNamespaceName);
        }
        if (is_string($childNamespaceName)) {
            $childNamespaceName = $this->normalizeNamespace($childNamespaceName);
        }


        if (!isset($this->namespaces[$parentNamespaceName])) {
            $namespace = new XNamespace($parentNamespaceName);
            $this->namespaces[$parentNamespaceName] = $namespace;
        }


        if (!isset($this->namespaces[$childNamespaceName])) {
            $namespace = new XNamespace($childNamespaceName);
            $this->namespaces[$childNamespaceName] = $namespace;
        }



        $this->namespaces[$childNamespaceName]->setParentNamespace(
            $this->namespaces[$parentNamespaceName]
        );

        $this->namespaces[$parentNamespaceName]->addChildNamespace(
            $this->namespaces[$childNamespaceName]
        );

    }

    public function registerAutoload()
    {
        spl_autoload_register(
            array($this, 'autoload')
        );
    }


    public function autoload($className)
    {

        $className=$this->normalizeNamespace($className);
        foreach ($this->namespaces as $name => $namespace) {

            if($parentNamespace = $namespace->getParentNamespace()) {

                $parentClassName = str_replace(
                    $namespace->getName(),
                    $parentNamespace->getName(),
                    $className
                );

                if(class_exists($parentClassName)) {
                    class_alias($parentClassName, $className);
                }
            }
        }
    }


    protected function normalizeNamespace($namespace)
    {
        $normalized = $namespace;
        $normalized = preg_replace('`^\\\\`', '', $normalized);
        $normalized = strtolower($normalized);
        return $normalized;
    }


}


