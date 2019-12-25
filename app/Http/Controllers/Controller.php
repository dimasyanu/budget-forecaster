<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
	* Paginate collection of array.
	*
	* @param array|Collection      $items
	* @param int   $perPage
	* @param int  $page
	* @param array $options
	*
	* @return LengthAwarePaginator
	*/
	public function paginate($items, $perPage = 15, $page = null, $options = [])
	{
		if ($items instanceof Illuminate\Database\Query\Builder || $items instanceof Illuminate\Database\Eloquent\Model) {
			return $items->paginate($perPage);
		}

		$page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
		$items = $items instanceof Collection ? $items : Collection::make($items);
		return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
	}
}
