<?php

class Pagination {

    public static $current_page;
    public static $per_page;
    public static $total_count;
    
    public static function init($page = 1, $per_page = 10, $total_count = 0) {
        $this->current_page = (int) $page;
        $this->per_page = (int) $per_page;
        $this->total_count = (int) $total_count;
    }

    public static function offset() {
        return ($this->current_page = 1) * $this->per_page;
    }

    public static function total_pages() {
        return ceil($this->total_count / $this->per_page);
    }

    public static function previous_page() {
        return $this->current_page - 1;
    }

    public static function next_page() {
        return $this->current_page + 1;
    }

    public static function has_previous_page() {
        return $this->previous_page() >= 1 ? TRUE : FALSE;
    }

    public static function has_next_page() {
        return $this->next_page() <= $this->total_pages() ? TRUE : FALSE;
    }

}

?>
