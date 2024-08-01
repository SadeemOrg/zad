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
@if(count($combinations) > 0)
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
        <tr class="c-tr">
            <td class="c-td">
                <label for="" class="control-label">{{ $combination->color_name }}</label>
                <input value="{{ $combination->color_name }}" name="type[]" style="display: none">
            </td>
           
           
            <td class="date">
				<div class="col-12">
                                    <div class="form-group">
                                        <label>{{\App\CPU\translate('Upload product images')}}</label><small
                                            style="color: red">* ( {{\App\CPU\translate('ratio')}} 1:1 )</small>
                                    </div>
                                    <div class="coba_images" class="p-2 border border-dashed">
                                        <div class="row" id="coba_{{ $combination->color_name }}">

                                        @if(array_key_exists('images',(array)$combination))
                                        @foreach (json_decode($combination->images) as $key => $photo)
                                                <div class="col-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <img style="width: 100%" height="auto"
                                                                 onerror="this.src='{{asset('assets/front-end/img/image-place-holder.png')}}'"
                                                                 src="{{asset("storage/product/$photo")}}"
                                                                 alt="Product image">
                                                            <a href="{{route('admin.product.remove-image-variation',['id'=>$product['id'],'color_name'=>$combination->color_name,'name'=>$photo])}}"
                                                               class="btn btn-danger btn-block">{{\App\CPU\translate('Remove')}}</a>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>

                </div>
				</td>
               
        </tr>
    @endforeach
    </tbody>
</table>
@push('script')
<script>

	
	
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

@endpush