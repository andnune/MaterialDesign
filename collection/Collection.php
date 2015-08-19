<?php
class Collection
{
    public $items = array();

    public function addItem($obj) {
        $this->items[] = $obj;
    }

    public function deleteItem($key) {
        if (isset($this->items[$key])) {
                unset($this->items[$key]);
        }
    }

    public function getItem($key) {
        if (isset($this->items[$key])) {
            return $this->items[$key];
        }
    }
    public function getCollection() {
        return $this;
    }
    public function getCount() {
        $count = 0;
        foreach ($this->items as $key => $obj) {
            if ($obj) {
                $count++;
            }
        }
        return $count;
    }
}
?>