      <h1>hello world </h1>
      <h3>thsi is imvoice page..</h3>
      <br>
      <br>
      <br>
      <table class="table table-striped table-inverse table-responsive">
          <thead class="thead-inverse">
              <tr>
                  {{-- <th>serial no</th> --}}
                  <th>subtotal</th>
                  <th>discount amount</th>
                  <th>coupon name</th>
                  <th>total</th>
              </tr>
              </thead>
              <tbody>
                  {{-- @foreach($order_infos as $order_info) --}}
                    <tr>
                        {{-- <td scope="row">{{ $loop->first }}</td> --}}
                        <td scope="row">{{ $order_infos->subtotal }}</td>
                        <td scope="row">{{ $order_infos->discount_amount }}</td>
                        <td scope="row">{{ $order_infos->coupon_name ? $order_infos->coupon_name : 'no coupon used' }}</td>
                        <td scope="row">{{ $order_infos->total }}</td>
                    </tr>
                  {{-- @endforeach --}}
              </tbody>
      </table>
