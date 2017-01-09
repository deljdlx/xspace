<?php


namespace XSpace;


class XFilepathManager
{

    protected $path = array();


    public function extendsFilepath($parent, $child)
    {

        $parent = $this->normalizeFilepath($parent);
        $child = $this->normalizeFilepath($child);

        $parentFilepath = new XFilepath($parent);
        $childFilepath = new XFilepath($child);

        $parentFilepath->addChildPath($childFilepath);
        $childFilepath->setParentPath($parentFilepath);


        $this->path[$parent] = $parentFilepath;
        $this->path[$child] = $childFilepath;

        return $this;
    }


    public function normalizeFilepath($filepath)
    {
        $normalized = realpath($filepath);
        $normalized = str_replace('\\', '/', $normalized);
        $normalized = preg_replace('`/$`', '', $normalized);

        return $normalized;
    }


    public function getFilepath($filepath) {
        foreach ($this->path as $path) {
            if($computedPath = $path->getXFilepath($filepath)) {
                return $computedPath;
            }
        }
        return false;
    }


}
