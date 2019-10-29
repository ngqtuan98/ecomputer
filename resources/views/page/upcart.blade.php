<div id="updateDiv">
                 <div>
                     @if(session()->has('success_message'))
                     <div class="alert alert-success">
                         {{session()->get('success_message')}}
                     </div>
                     @endif
                     @if(count($errors)>0)
                     <div class="alert alert-danger">
                         <ul>
                             @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     </div>
                     @endif
                     @if(Cart::count()>0)
                  
                     <h2> {{Cart::count()}} Item(s) in Shopping Cart</h2>
                     <div>
                         <a href="{{route('shop.index')}}" class="btn btn-info btn-icon-split">
                             <span class="icon text-white-50">
                                 <i class="fas fa-shop"></i>
                             </span>
                             <span class="text">Continue shopping</span>
                         </a>
                         <a href="{{route('checkout.index')}}" class="btn btn-success btn-icon-split">
                             <span class="icon text-white-50">
                                 <i class="fas fa-check"></i>
                             </span>
                             <span class="text">Proceed to checkout</span>
                         </a>
                     </div>
                 </div>

                 <div class="table-responsive">
                     <table class="table">
                         <thead>
                             <tr>
                                 <th scope="col">Product</th>
                                 <th scope="col">Price</th>
                                 <th scope="col">Quantity</th>
                                 <th scope="col">Total</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $count = 1; ?>
                             @foreach(Cart::content() as $item)
                             <tr>
                                 <td>
                                     <div class="media">
                                         <div class="d-flex">
                                             <img width="70" height="70" style="border-radius: 5px" src="source/{{$item->model->image}}" alt="{{$item->model->slug}}">
                                         </div>
                                         <div class="media-body">
                                             <p>{{$item->model->name}}</p>
                                         </div>
                                     </div>
                                 </td>
                                 <td>
                                     <h5>{{$item->model->presentPrice()}}</h5>
                                 </td>
                                 <td>
                                     <div>
                                         <input type="hidden" id="rowId<?php echo $count; ?>" value="{{ $item->rowId }}" />
                                         <input type="hidden" id="proId<?php echo $count; ?>" value="{{ $item->id }}" />
                                         <input type="number" size="2" value="{{ $item->qty }}" name="qty" id="upCart<?php echo $count; ?>" autocomplete="off" min="1" max="5">

                                     </div>
                                 </td>
                                 <td>
                                     <h5>$720.00</h5>

                                 </td>
                                 <td>
                                     <form action="{{route('cart.destroy',$item->rowId)}}" method="POST">
                                         {{csrf_field()}}
                                         {{method_field('DELETE')}}
                                         <button type="submit" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></i></button>
                                     </form>
                                 </td>
                             </tr>
                             <?php $count++; ?>
                             @endforeach
                             <h5>
                                 <td>
                                 </td>
                                 <td>
                                 </td>
                                 <td>
                                    <h5>Subtotal: </h5>
                                </td>
                                <td>
                                    <h5>{{ number_format(Cart::subtotal())}}</h5>
                                </td>
                                
                                 <td>
                                    
                                 </td>
                                 <td></td>
                                 </h5>
                             </h5>
                             <tr >
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Tax 10%:</h5>
                                </td>
                                <td>
                                {{ number_format(Cart::tax()) }}
                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h3>Total: </h3>
                                </td>
                                <td>
                                  <h3>{{ number_format(Cart::total()) }} VNĐ</h3> 
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                             <tr class="bottom_button">
                                 <td>
                                 </td>
                                 <td>
                                 </td>
                                 <td>

                                 </td>
                                 <td>
                                 </td>
                                 <td>
                                     <div class="cupon_text d-flex align-items-center">
                                         <input type="text" placeholder="Coupon Code">
                                         <a class="primary-btn" href="#">Apply</a>
                                     </div>
                                 </td>
                             </tr>

                         </tbody>



                     </table>
                 </div>
                 @else
                 <h3> No item in Cart!</h3>
                 <div>
                     <a href="{{route('shop.index')}}" class="btn btn-info btn-icon-split">
                         <span class="icon text-white-50">
                             <i class="fas fa-shop"></i>
                         </span>
                         <span class="text">Continue shopping</span>
                     </a>

                 </div>
                 <div class="table-responsive">
                     <table class="table">
                         <thead>
                             <tr>
                                 <th scope="col">Product</th>
                                 <th scope="col">Price</th>
                                 <th scope="col">Quantity</th>
                                 <th scope="col">Total</th>
                             </tr>
                         </thead>
                     </table>
                 </div>
                 @endif
             </div>

             <script>
     $(document).ready(function() {
         <?php for ($i = 1; $i < 20; $i++) { ?>
             $('#upCart<?php echo $i; ?>').on('change keyup', function() {

                 var newqty = $('#upCart<?php echo $i; ?>').val();
                 var rowId = $('#rowId<?php echo $i; ?>').val();
                 var proId = $('#proId<?php echo $i; ?>').val();

                 if (newqty <= 0) {
                     alert('enter only number value')
                 } else {

                     $.ajax({
                         type: 'get',
                         dataType: 'html',
                         url: '<?php echo url('/cart/update');?>/'+proId,
                         data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
                         success: function(response) {
                             console.log(response);
                             $('#updateDiv').html(response);
                         }
                     });

                 }

             });
         <?php } ?>
     });
 </script>