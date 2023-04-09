@extends('layouts.app')

@section('content')
<div id="wp-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Giỏ hàng</h1>
                <p class="text-success">Hiện tại có ({{Cart::count()}}) trong giỏ hàng.</p>
                <form action="{{url('cart/update')}}" method="post">
                    @csrf
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $temp = 0;
                            @endphp
                            @foreach (Cart::content() as $product)
                            @php
                            $temp++;
                            @endphp
                            <tr>
                                <td scope="row">{{$temp}}</td>
                                <td>
                                    <img src="{{asset($product -> options -> thumb_main)}}" width="50px" alt="">
                                </td>
                                <td scope="col"><a href="">{{$product -> name}}</a></td>
                                <td scope="col">{{number_format($product -> price,'0','','.')}}đ</td>
                                <td scope="col">
                                    <style>
                                        .button-qty {
                                            border: 1px solid black;
                                            /* width: 10px;
                                            display: inline-block; */
                                            padding: 5px;
                                        }

                                        .num_order {
                                            text-align: center;
                                            cursor: pointer;
                                            border: none;

                                        }
                                    </style>
                                    <div class="quantity">
                                        <span class="minus button-qty btn btn-danger">-</span>
                                        <input type="text" class="num_order" min="1" value="{{$product -> qty}}"
                                            data-id="{{$product -> rowId }}" style="width:30px">
                                        <span class="plus button-qty btn btn-success">+</span>
                                    </div>
                                </td>
                                <td scope="col" id="sub-total-{{$product -> rowId}}">{{number_format($product ->
                                    total,'0','','.')}}đ</td>
                                <td><a href="{{url('cart/remove/'.$product -> rowId)}}" class="text-danger">Xóa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan='6' class="text-right">Tổng:</td>
                                <td><strong id="total-price">{{Cart::total()}} VNĐ</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                    <a href="{{url('cart/destroy')}}">Xóa giỏ hàng</a>
                    <input type="submit" name="btn-update" value="Cập nhật giỏ hàng" class="btn btn-outline-success">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end wp-content -->
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
<script>
    // Select all elements with class "minus" and "plus"
const minusBtns = document.querySelectorAll(".minus");
const plusBtns = document.querySelectorAll(".plus");

// Add click event listeners to all minus and plus buttons
minusBtns.forEach(btn => {
  btn.addEventListener("click", decreaseQuantity);
});
plusBtns.forEach(btn => {
  btn.addEventListener("click", increaseQuantity);
});

// Function to decrease quantity
function decreaseQuantity(e) {
  const input = e.target.parentElement.querySelector(".num_order");
  const value = parseInt(input.value);
  if (value > 1) {
    input.value = value - 1;
  }
}
 
// Function to increase quantity
function increaseQuantity(e) {
  const input = e.target.parentElement.querySelector(".num_order");
  const value = parseInt(input.value);
  input.value = value + 1;
}
</script>
<script>
    //ajax giỏ hàng
        $(document).ready(function() {
            $(".button-qty").click(function() {
                // alert('oke');
                var input = $(this).parent().find(".num_order");
                var id = input.attr('data-id');
                var qty = input.val();
                var data = {
                    id: id,
                    qty: qty,
                    _token: '{{ csrf_token() }}'
                };
                console.log(data);
                $.ajax({
                    url: '{{route("cart.update_ajax")}}',
                    method: "POST",
                    data: data,
                    dataType: "json",
                    success: function(data) {
                        $("#sub-total-" + id).text(data.sub_total);
                        $("#total-price").text(data.total);
                        // console.log(data);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                    },
                });
            });
        });
</script>
@endsection