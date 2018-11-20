<?php  

	echo '<pre>'; print_r(paginate($current_page = $_GET['page']));

	private function paginate ($current_page = 0, $per_page = 0, $collections = []) {

		$current_page = (int) $current_page;
		$per_page = (int) $per_page;
		$total = count($collections);

		$last_page = ceil($total / $per_page);

		$from = ($current_page <= $last_page) ? (($current_page * $per_page) - $per_page) + 1 : null;
		$to = ($current_page <= $last_page) ? (($current_page * $per_page) < $total ? ($current_page * $per_page) : $total) : null;

		$meta = [
			"current_page" => $current_page,
			"from" => $from,
			"last_page" => $last_page,
			"path" => "",
			"per_page" => $per_page,
			"to" => $to,
			"total" => $total
		];

		$data = array_slice($collections, $meta['from'] - 1, $per_page);

		return [
		    'data' => $data,
		    'meta' => $meta
		];
	}
