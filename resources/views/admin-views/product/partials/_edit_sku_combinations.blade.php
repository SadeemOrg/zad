<!-- <style>
	tbody {
  display:inline-block;/* whatever, just  reset table layout display to go further */
}
td {
  border:solid 1px;
}
tr {
  display:flex;
  flex-wrap:wrap; /* allow to wrap on multiple rows */
}
td {
  display:block;
  flex:1 /* to evenly distributs flex elements */
}
.date, .profile {
  width:100%; /* fill entire width,row */
  flex:auto; /* reset the flex properti to allow width take over */
}
</style> -->
@if(count($combinations) > 0)
<table class="table table-bordered">
    <thead>
    <tr>
        <td class="text-center">
            <label for="" class="control-label">{{\App\CPU\translate('Variant')}}</label>
        </td>
        <td class="text-center">
            <label for="" class="control-label">{{\App\CPU\translate('Variant Price')}}</label>
        </td>
        <td class="text-center">
            <label for="" class="control-label">{{\App\CPU\translate('SKU')}}</label>
        </td>
        <td class="text-center">
            <label for="" class="control-label">{{\App\CPU\translate('Quantity')}}</label>
        </td>
    </tr>
    </thead>
    <tbody>
    @endif
    @foreach ($combinations as $key => $combination)
        <tr>
            <td>
                <label for="" class="control-label">{{ $combination['type'] }}</label>
                <input value="{{ $combination['type'] }}" name="type[]" style="display: none">
            </td>
            <td>
            @php($dic = $discount_type == "percent" ? ((isset($combination['selling_price'])?$combination['selling_price']:$combination['price']) / 100) * $discount: $discount )
                       
        
            <input type="number" name="price_tax{{ $combination['type'] }}"
                       value="{{ \App\CPU\Convert::default($combination['price']*1.17+$dic) }}" min="0"
                       step="0.01"
                       class="form-control" required>
                       <input type="hidden" name="price_{{ $combination['type'] }}"
                       value="{{ \App\CPU\Convert::default($combination['price']) }}" min="0"
                       step="0.01"
                       class="form-control" required>
            </td>
            <td>
                <input type="text" name="sku_{{ $combination['type'] }}" value="{{ $combination['sku'] }}"
                       class="form-control" >
            </td>
            <td>
                <input type="number" onkeyup="update_qty()" name="qty_{{ $combination['type'] }}" value="{{ $combination['qty'] }}" min="1" max="100000" step="1"
                       class="form-control"
                       required>
            </td>
           
            <!-- <td class="date" colspan="2">
				<div class="col-12">
                                    <div class="form-group">
                                        <label>{{\App\CPU\translate('Upload product images')}}</label><small
                                            style="color: red">* ( {{\App\CPU\translate('ratio')}} 1:1 )</small>
                                    </div>
                                    <div class="coba_images" class="p-2 border border-dashed">
                                        <div class="row" id="coba_{{ $combination['type'] }}">

                                        @if(array_key_exists('images',$combination))
                                        @foreach (json_decode($combination['images']) as $key => $photo)
                                                <div class="col-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <img style="width: 100%" height="auto"
                                                                 onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                                                 src="{{asset("storage/product/$photo")}}"
                                                                 alt="Product image">
                                                            <a href="{{route('admin.product.remove-image-variation',['id'=>$product['id'],'name'=>$photo])}}"
                                                               class="btn btn-danger btn-block">{{\App\CPU\translate('Remove')}}</a>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>

                </div>
				</td> -->
               
        </tr>
    @endforeach
    </tbody>
</table>
@push('script')
<script>

	
	
// $(function(){
		
// 		var rows =document.getElementsByTagName("tbody")[0].rows;
// 		var cobe_id = [];
// 	for(var i=0;i<rows.length;i++){

// 	var td = rows[i].getElementsByTagName("td")[4];

// 		if(td != null) {
// 			var div = td.getElementsByTagName("div")[0];
// 			if(div != null) {
// 			var coba_image_id = div.getElementsByClassName("coba_images")[0].getElementsByTagName('div')[0].id;
// 			cobe_id.push(coba_image_id);
	
	
// 	}
// 	 }

// 	  }
		
	
		
		
// 		for(var i=0;i<cobe_id.length;i++){

		
// 		$("#"+cobe_id[i]).spartanMultiImagePicker({
//                 fieldName: cobe_id[i]+'[]',
//                 maxCount: 4,
//                 rowHeight: 'auto',
//                 groupClassName: 'col-3',
//                 maxFileSize: '',
//                 placeholderImage: {
//                     image: '{{asset('assets/back-end/img/400x400/img2.jpg')}}',
//                     width: '30%',
				
//                 },
//                 dropFileLabel: "Drop Here",
//                 onAddRow: function (index, file) {

//                 },
//                 onRenderedPreview: function (index) {

//                 },
//                 onRemoveRow: function (index) {

//                 },
//                 onExtensionErr: function (index, file) {
//                     toastr.error('{{\App\CPU\translate('Please only input png or jpg type file')}}', {
//                         CloseButton: true,
//                         ProgressBar: true
//                     });
//                 },
//                 onSizeErr: function (index, file) {
//                     toastr.error('{{\App\CPU\translate('File size too big')}}', {
//                         CloseButton: true,
//                         ProgressBar: true
//                     });
//                 }
//             });
		
// 		}

// });
	

</script>

@endpush