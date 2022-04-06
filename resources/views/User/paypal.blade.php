@extends("layouts.master")

@section("content")
<div class="site-section">
    <div class="container">
<form action="https://www.sendbox.paypal.com/cgi-bin/webscr" method="post">
     <input type="hidden" name="cmd" value="_cart"><br>
     <input type="hidden" name="business" value="sb-w0il012717401@business.example.com"><br>
     <input type="hidden" name="item_name" value="hat"><br>
     <input type="hidden" name="amount" value="15.00"><br>
     <input type="text" name="first_name" value="John"><br>
     <input type="text" name="last_name" value="Doe"><br>
     <input type="text" name="address1" value="9 Elm Street"><br>
     <input type="hidden" name="address2" value=""><br>
     <input type="text" name="city" value="Berwyn"><br>
     <input type="text" name="state" value="PA"><br>
     <input type="hidden" name="zip" value="19312"><br>
     <input type="email" name="email" value="jdoe@zyzzyu.com">
     <input type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
    </form>
</div>
</div>

@endsection
