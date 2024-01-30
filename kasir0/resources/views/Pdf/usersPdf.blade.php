<div style="width: 712px; height: 1023px; background: #25282E">
@foreach($transaksidetail as $ts)
  <div style="width: 150px; height: 150px; left: 283px; top: 44px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
    <div style="width: 150px; height: 150px; position: relative">
      <div style="width: 125px; height: 125px; left: 12.50px; top: 12.50px; position: absolute; background: #41D195"></div>
      <div style="width: 150px; height: 150px; left: 150px; top: 150px; position: absolute; transform: rotate(-180deg); transform-origin: 0 0; opacity: 0"></div>
    </div>
  </div>
  <div style="width: 416px; height: 97px; left: 150px; top: 212px; position: absolute; text-align: center; color: white; font-size: 35px; font-family: Inknut Antiqua; font-weight: 400; line-height: 60px; word-wrap: break-word">Transaksi Selesai</div>
  <div style="width: 1176.01px; height: 0px; left: -10px; top: 376px; position: absolute; border: 1px rgba(0, 0, 0, 0.20) solid"></div>
  <div style="width: 691px; height: 59px; left: 21px; top: 437px; position: absolute; color: rgba(255, 255, 255, 0.80); font-size: 33px; font-family: Poppins; font-weight: 400; line-height: 18px; word-wrap: break-word">Ref Number</div>

  <!-- harus disi Foreach  -->
  <div style="width: 455px; height: 47px; left: 244px; top: 781px; position: absolute; text-align: center; color: white; font-size: 32px; font-family: Poppins; font-weight: 600; line-height: 32px; word-wrap: break-word"></div>
  <!-- Walawew-->

  <div style="width: 287px; height: 36px; left: 21px; top: 589px; position: absolute; color: rgba(255, 255, 255, 0.72); font-size: 32px; font-family: Poppins; font-weight: 400; line-height: 18px; word-wrap: break-word">Payment Method</div>
  <div style="width: 223px; height: 33px; left: 21px; top: 674px; position: absolute; color: rgba(255, 255, 255, 0.72); font-size: 32px; font-family: Poppins; font-weight: 400; line-height: 18px; word-wrap: break-word">Sender Name</div>
  <div style="left: 27px; top: 787px; position: absolute; color: rgba(255, 255, 255, 0.72); font-size: 32px; font-family: Poppins; font-weight: 400; line-height: 18px; word-wrap: break-word">Amount</div>

  <!-- Foreach -->
  <div style="width: 433px; height: 47px; left: 270px; top: 438px; position: absolute; text-align: center; color: white; font-size: 32px; font-family: Poppins; font-weight: 500; line-height: 18px; word-wrap: break-word">000085752257</div>
  <!-- AHhhh -->

  <div style="width: 246px; height: 31px; left: 21px; top: 512px; position: absolute; color: rgba(255, 255, 255, 0.72); font-size: 32px; font-family: Poppins; font-weight: 400; line-height: 18px; word-wrap: break-word">Payment Time</div>
  
  <!-- Foreach -->
  <div style="width: 368px; height: 47px; left: 346px; top: 509px; position: absolute; text-align: center; color: white; font-size: 32px; font-family: Poppins; font-weight: 500; line-height: 18px; word-wrap: break-word">{{$ts->subtotal}}</div>
  <!-- Ligma -->

  <!-- Kudu DIisi Foreach  -->
  <div style="width: 357px; height: 47px; left: 298px; top: 583px; position: absolute; text-align: center; color: white; font-size: 32px; font-family: Poppins; font-weight: 500; line-height: 18px; word-wrap: break-word">Bank Transfer</div>
  <!-- Ligma -->

  <!-- Foreach  -->
  <div style="width: 638px; height: 36px; left: 177px; top: 674px; position: absolute; text-align: center; color: white; font-size: 32px; font-family: Poppins; font-weight: 500; line-height: 18px; word-wrap: break-word">Antonio Roberto</div>
  <!--Sigma -->

  <div style="width: 738.08px; height: 0px; left: 0px; top: 765px; position: absolute; transform: rotate(-0.85deg); transform-origin: 0 0; border: 1px rgba(255, 255, 255, 0.16) dotted"></div>
  <div style="width: 808px; height: 188px; left: 27px; top: 871px; position: absolute; color: rgba(255, 255, 255, 0.72); font-size: 32px; font-family: Poppins; font-weight: 400; line-height: 18px; word-wrap: break-word">Admin Fee</div>

  <!-- Foreach -->
  <div style="width: 472px; height: 51px; left: 209px; top: 871px; position: absolute; text-align: center; color: white; font-size: 32px; font-family: Poppins; font-weight: 500; line-height: 18px; word-wrap: break-word">IDR 193.00</div>
  <!-- Sugma -->

<!-- Foreach  -->
  <div style="width: 472px; height: 90px; left: 122px; top: 309px; position: absolute; text-align: center; color: white; font-size: 40px; font-family: Post No Bills Jaffna Medium; font-weight: 500; line-height: 18px; word-wrap: break-word">IDR 1,000,000</div>
<!-- EndForeach -->
  @endforeach
</div>