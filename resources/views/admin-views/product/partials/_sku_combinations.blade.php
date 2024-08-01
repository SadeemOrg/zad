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
@if(count($combinations[0]) > 0)
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
	@php
		$sku = '';
		foreach (explode(' ', $product_name) as $key => $value) {
			$sku .= substr($value, 0, 1);
		}

		$str = '';
		foreach ($combination as $key => $item){
			if($key > 0 ){
				$str .= '-'.str_replace(' ', '', $item);
				$sku .='-'.str_replace(' ', '', $item);
			}
			else{
				if($colors_active == 1){
					$color_name = \App\Model\Color::where('code', $item)->first()->name;
					$str .= $color_name;
					$sku .='-'.$color_name;
				}
				else{
					$str .= str_replace(' ', '', $item);
					$sku .='-'.str_replace(' ', '', $item);
				}
			}
		}
	@endphp

	@if(strlen($str) > 0)
	   
			<tr>
				<td>
					<label for="" class="control-label">{{ $str }}</label>
				</td>
				<td>
				
				<input type="number" name="price_tax{{ $str }}" value="{{ $unit_price_withe_tax }}" min="0" step="0.01" class="form-control" required>
				<input type="hidden" name="price_{{ $str }}" value="{{ $unit_price_withe_tax }}" min="0" step="0.01" class="form-control" required>
					
				</td>
				<td>
					<input type="text" name="sku_{{ $str }}" value="{{ $sku }}" class="form-control" required>
				</td>
				<td>
					<input type="number" name="qty_{{ $str }}" value="1" min="1" max="1000000" step="1" class="form-control" required>
				</td>
				<!-- <td class="date" colspan="2">
				<div class="col-12">
                                    <div class="form-group">
                                        <label>{{\App\CPU\translate('Upload product images')}}</label><small
                                            style="color: red">* ( {{\App\CPU\translate('ratio')}} 1:1 )</small>
                                    </div>
                                    <div class="coba_images" class="p-2 border border-dashed">
                                        <div class="row" id="coba_{{ $str }}"></div>
                                    </div>

                </div>
				</td> -->
			</tr>
		
			
	@endif
@endforeach
	</tbody>
</table>

<script>
	update_qty();
	function update_qty()
	{
		var total_qty = 0;
		var qty_elements = $('input[name^="qty_"]');
		for(var i=0; i<qty_elements.length; i++)
		{
			total_qty += parseInt(qty_elements.eq(i).val());
		}
		if(qty_elements.length > 0)
		{

			$('input[name="current_stock"]').attr("readonly", true);
			$('input[name="current_stock"]').val(total_qty);
		}
		else{
			$('input[name="current_stock"]').attr("readonly", false);
		}
	}
	$('input[name^="qty_"]').on('keyup', function () {
		var total_qty = 0;
		var qty_elements = $('input[name^="qty_"]');
		for(var i=0; i<qty_elements.length; i++)
		{
			total_qty += parseInt(qty_elements.eq(i).val());
		}
		$('input[name="current_stock"]').val(total_qty);
	});
	
	
	
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
