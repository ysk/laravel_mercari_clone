<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemsController extends Controller
{
    public function showItems(Request $request)
    {

        $query = Item::query();

        $items = $query->orderByRaw( "FIELD(state, '" . Item::STATE_SELLING . "', '" . Item::STATE_BOUGHT . "')" )
             ->orderBy('id', 'DESC')
             ->paginate(52);
    
        return view('items.items')
        ->with('items', $items);
    }

    public function showItemDetail(Item $item)
    {
 
        return view('items.item_detail')
        ->with('item', $item);
    }


}
