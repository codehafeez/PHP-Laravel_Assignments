<?php
  

if (! function_exists('dateToDMY')) {
  function dateToDMY($date) {
    return date('d M Y', strtotime($date));
  }
}
  

if (! function_exists('myFunction')) {
  function myFunction() {
    echo "this is testing function from helper.";
  }
}


// use App\Models\Cart;
// use Auth;
// if (! function_exists('cartCount')) {
//   function cartCount() {
//     $user_id = Auth::user()->id;
//     $cart_count = Cart::where('user_id', $user_id)->count();
//     return $cart_count;
// }