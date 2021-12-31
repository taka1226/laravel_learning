<?php
namespace App\MyClasses;

class PowerMyService implements MyServiceInterface
{
    private $id = -1;
    private $msg = 'no id...';
    private $data = ['いちご', 'りんご', 'バナナ', 'みかん', 'ぶどう'];

    public function __construct()
    {
    }

    public function setId($id)
    {
        $this->id = $id;
        if ($id >= 0 && $id < count($this->data)){
            $this->msg = "あなたが須木なのは".$id.', data:"'.$this->data[$id].'"';
        }
    }

    public function say()
    {
        return $this->msg;
    }

    public function data(int $id)
    {
        return $this->data[$id];
    }

    public function alldata()
    {
        return $this->data;
    }
}
