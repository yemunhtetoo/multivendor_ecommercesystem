

<form id="addressAddEditForm" action="javascript:;" method="post">@csrf
    <h5 class="changeDeliText">Add New Delivery Address</h5>
    @if(count($deliveryAddresses)>0)
    <div class="removeChkBox" ><input type="checkbox" id="shipdifferentaddress" onclick="formDeli()"><label for="samsung">Ship To Different Address?</label></div>
    @else
    <div class="removeChkBox" ><input type="checkbox" id="shipdifferentaddress" onclick="formDeli()"><label for="samsung">Check To Add Delivery Address</label></div>
    @endif
    <input type="hidden" name="delivery_id">
    <div class="row" id="formdelivery" style="display: none">
        <div class="col-md-6">
            <label>Delivery Name*</label>
            <input type="text" id="delivery_name" name="delivery_name" value="" placeholder="Your Delivery Name">
            <p id="delivery-delivery_name"></p>
        </div>
        <div class="col-md-6">
            <label>Delivery Address*</label>
            <input type="text" id="delivery_address" name="delivery_address" value="" placeholder="Delivery Address">
            <p id="delivery-delivery_address"></p>
        </div>
        <div class="col-md-6">
            <label>Delivery City*</label>
            <input type="text" id="delivery_city" name="delivery_city" value="" placeholder="Delivery City">
            <p id="delivery-delivery_city"></p>
        </div>
        <div class="col-md-6">
            <label>Delivery State*</label>
            <input type="text" id="delivery_state" name="delivery_state" value="" placeholder="Delivery State">
            <p id="delivery-delivery_state"></p>
        </div>
        <div class="col-md-6 contry">
            <label for="usercountry">Country</label>
            <select class="country" name="delivery_country" id="delivery_country">
                <option value="">Select Country</option>
                @foreach ($countries as $country)
                    <option value="{{ $country['country_name']}}" @if($country['country_name']==Auth::user()->country) selected @endif>{{$country['country_name']}}</option>
                @endforeach
            </select>
            <p id="delivery-delivery_country"></p>
            <p id="account-country"></p>
        </div>
        <div class="col-md-6">
            <label>PinCode</label>
            <input type="text" id="delivery_pincode" name="delivery_pincode" value="" placeholder="Delivery Pincode">
            <p id="delivery-delivery_pincode"></p>
        </div>
        <div class="col-md-6">
            <label>Mobile</label>
            <input type="text" id="delivery_mobile" name="delivery_mobile" value="" placeholder="Delivery Mobile">
            <p id="delivery-delivery_mobile"></p>
        </div>
        
        <div class="col-md-6 delivery_btn">
            
            <button type="submit" name="button" class="ord-btn">Save </button>
        </div>
        
    </div>
</form>
