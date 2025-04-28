@extends('master')
@section("content")
<div class="custom-product">
    <div class="col-sm-10">
        <table class="table">

        <tbody>
            <tr>
                <td>Amount</td>
            <td>$ {{$total}}</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td>$ 0</td>
            </tr>
            <tr>
                <td>Delivery </td>
                <td>$ 10</td>
            </tr>
            <tr>
                <td>Total Amount</td>
            <td>$ {{$total+10}}</td>
            </tr>
            </tbody>
        </table>
        <div>
            <form action="/orderplace" method="POST" >
            @csrf
            <div class="form-group">
                <textarea name="address" placeholder="enter your address" class="form-control" ></textarea>
            </div>
            <div class="form-group">
            <p><strong>Payment Method</strong></p>

            <label><input type="radio" name="payment_method" value="online" onclick="toggleCardFields()"> Online Payment</label><br> 
            <label><input type="radio" name="payment_method" value="cash" onclick="toggleCardFields()"> Payment on Delivery</label><br>

            <!-- Hidden Credit Card Fields -->
            <div id="card-fields" style="display: none; margin-top: 10px;">
                <input type="text" name="card_number" placeholder="Card Number" class="form-control mb-2"><br>
                <input type="text" name="expiry_date" placeholder="Expiry Date (MM/YY)" class="form-control mb-2"><br>
                <input type="text" name="cvv" placeholder="CVV" class="form-control mb-2"><br>
            </div>

            <!-- Order Now button -->
            <button type="submit" class="btn btn-primary mt-3">Order Now</button>

<script>
function toggleCardFields() {
    var paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
    var cardFields = document.getElementById('card-fields');
    
    if (paymentMethod === 'online') {
        cardFields.style.display = 'block';
    } else {
        cardFields.style.display = 'none';
    }
}
</script>

            </form>
        <div>
    </div>
</div>
@endsection
