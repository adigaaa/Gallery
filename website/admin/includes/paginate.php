<?php


class Paginate{

public $total_items;
public $current_page;
public $items_per_page;

	public function __construct($total_items,$current_page=1,$items_per_page=20){

		$this->total_items = $total_items;
		$this->current_page = $current_page;
		$this->items_per_page = $items_per_page;

	}

	public function next(){

		return $this->current_page+1;

	}

	public function previous(){

		return $this->current_page-1;

	}

	public function total_pages(){

		return ceil($this->total_items / $this->items_per_page);

	}

	public function has_previous(){

		return $this->current_page > 1 ? true : false;

	}

	public function has_next(){

		return $this->next() <= $this->total_pages() ? true : false;

	}

	public function offset(){

		return ($this->current_page - 1) * $this->items_per_page;

	}



}




?>