<style>
	.c-tbody {
  display:inline-block;/* whatever, just  reset table layout display to go further */
  width: 100%;
}

.c-tr {
  display:flex;
  flex-wrap:wrap; /* allow to wrap on multiple rows */
}
.c-td {
  display:block;
  flex:1; /* to evenly distributs flex elements */
}
.date, .profile {
  display:block;
  flex:1;
  width:100%; /* fill entire width,row */
  flex:auto; /* reset the flex properti to allow width take over */
}
</style>
@if(count($combinations[0]) > 0)
	<table class="table table-bordered">
		<thead>
			<tr class="c-tr">
				<td class="text-center c-td">
					<label for="" class="control-label">{{\App\CPU\translate('Colors')}}</label>
				</td>
			</tr>
		</thead>
		<tbody class="c-tbody">
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
				$str = '-'.str_replace(' ', '', $item);
				$sku .='-'.str_replace(' ', '', $item);
			}
			else{
				if($colors_active == 1){
					$color_name = \App\Model\Color::where('code', $item)->first()->name;
					$str = $color_name;
					
				}
				else{
					$str = str_replace(' ', '', $item);
				
				}
			}
		}
	@endphp

	@if(strlen($str) > 0)
	   
			<tr class="c-tr">
				<td class="c-td">
					<label for="" class="control-label">{{ $str }}</label>
				</td>
				
				<td class="date">
				<div class="col-12">
                                    <div class="form-group">
                                        <label>{{\App\CPU\translate('Upload product images')}}</label><small
                                            style="color: red">* ( {{\App\CPU\translate('ratio')}} 1:1 )</small>
                                    </div>
                                    <div class="coba_images" class="p-2 border border-dashed">
                                        <div class="row" id="coba_{{ $str }}"></div>
                                    </div>

                </div>
				</td>
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
	
	
	
	$(function(){
		
		var rows =document.getElementsByClassName("c-tbody")[0].rows;
		var cobe_id = [];
	for(var i=0;i<rows.length;i++){

	var td = rows[i].getElementsByTagName("td")[1];

		if(td != null) {
			var div = td.getElementsByTagName("div")[0];
			if(div != null) {
			var coba_image_id = div.getElementsByClassName("coba_images")[0].getElementsByTagName('div')[0].id;
			cobe_id.push(coba_image_id);
	
	
	}
	 }

	  }
		
	
		
		
		for(var i=0;i<cobe_id.length;i++){
			console.log(cobe_id[i]);
		
		
		$("#"+cobe_id[i]).spartanMultiImagePicker({
                fieldName: cobe_id[i]+'[]',
                maxCount: 4,
                rowHeight: 'auto',
                groupClassName: 'col-3',
                maxFileSize: '',
                placeholderImage: {
                    image: '{{asset('assets/back-end/img/400x400/img2.jpg')}}',
                    width: '30%',
				
                },
                dropFileLabel: "Drop Here",
                onAddRow: function (index, file) {

                },
                onRenderedPreview: function (index) {

                },
                onRemoveRow: function (index) {

                },
                onExtensionErr: function (index, file) {
                    toastr.error('{{\App\CPU\translate('Please only input png or jpg type file')}}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                },
                onSizeErr: function (index, file) {
                    toastr.error('{{\App\CPU\translate('File size too big')}}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
		
		}

	});

</script>
