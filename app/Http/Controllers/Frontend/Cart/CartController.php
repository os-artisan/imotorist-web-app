<?php

namespace App\Http\Controllers\Frontend\Cart;

use App\Models\Fine\Cart;
use App\Models\Fine\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Auth::user()->carts;

        $total = number_format((float) $carts->sum('total'), 2);

        return view('frontend.cart.cart', compact('carts', 'total'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ticket_no' => 'required|array|exists:tickets,ticket_no,paid,0',
        ], [
            'ticket_no.exists' => 'This ticket has already been paid.',
        ]);

        $ticket = Ticket::where('ticket_no', $request->ticket_no)->first();

        if ($ticket->inCart()) {
            return redirect()->back()->withFlashDanger('This ticket is already in the cart.');
        }

        $cart = Cart::create(['user_id' => Auth::id(), 'ticket_id' => $ticket->id, 'total' => $ticket->total_amount]);

        return redirect()->back()->withFlashSuccess('Ticket was successfully added to your cart.<a href="/cart" class="btn btn-default btn-sm ml-10"><i class="fa fa-shopping-cart mr-5"></i>View Cart</a>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $ticket_no
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($ticket_no)
    {
        $ticket_id = Ticket::where('ticket_no', $ticket_no)->first()->id;

        $cart = Cart::where(['ticket_id' => $ticket_id, 'user_id' => Auth::id()]);

        if ($cart->delete()) {
            return redirect()->back()->withFlashSuccess('The ticket is successfully removed from the cart.');
        }

        return redirect()->back()->withFlashDanger('Sorry, we didn\'t find any records matching that ticket.');
    }
}
