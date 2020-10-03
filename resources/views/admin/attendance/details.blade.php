			
<div class="row">
				  <div class="col-md-3">
						<select class="form-control" name="std_class_id" id="std_class_id"> 
							<option value="">Select Class</option>
								@foreach($classes as $key=>$class)
									<option value="{{$class->id}}">{{$class->class_name}}</option>
								@endforeach
							</select>
					</div>								
					<div class="col-md-3">
						<select class="form-control" name="batch_id" id="batch_id">
							<option value="">Select Batch</option>
							@foreach($batches as $key=>$batch)
								<option value="{{$batch->id}}">{{$batch->batch_name}}</option>
							@endforeach
							 
						</select>
					</div>
					
					<div class="col-md-3">
						<select class="form-control" name="section_id" id="section_id"> 
							<option value="">Select Section</option>
							@foreach($sections as $key=>$section)
								<option value="{{$section->id}}">{{$section->section_name}}</option>
							@endforeach
						</select>
					</div>
					

				</div>


<script>
	$(document).ready(function(){
		$('#qual_catg').on('change',function(e){
			e.preventDefault();
			var qual_catg_code = $(this).val();
			qual_course(qual_catg_code);
			qual_docs(qual_catg_code);
		});
	})
</script>