@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3">
	 		<h4>إضافة نموذج</h4>
	 	</div>
	 	

	 	<div class="col-12 col-lg-9 px-3 py-5">
	 		<form class="col-12" method="POST" action="{{route('message-templates.store')}}" enctype='multipart/form-data'>
	 			@csrf 
	 		
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				العنوان
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="" name="title" class="form-control" min="2" value="{{old('title')}}" required="">
	 			</div> 
	 		</div> 
	 		
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				المحتوى
	 			</div>
	 			<div class="col-9 px-2" >
	 				<textarea class="form-control" name="content" id="content" required="" min="2" style="min-height: 200px"  >{{old('content')}}</textarea> 
	 				<div class="col-12">
	 					<span style="color: #999"><span style="font-weight: bold;" id="length"></span>/64</span>
	 				</div> 
	 			</div> 
	 		</div>
	 		{{-- <div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				رابط الدورة
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="" name="url" class="form-control" value="{{old('url')}}"  required="">
	 			</div> 
	 		</div> --}}
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				 
	 			</div>
	 			<div class="col-9 px-2">
	 				<button class="btn pb-2 px-4" style="background: #ffa725;border-radius: 0px;color: #fff ">إعتماد</button>
	 			</div> 

	 		</div>

	 		</form>

	 	</div>
	  
	 </div> 
</div>
<script type="text/javascript"> 
	setInterval(function(){
		$('#length').text($('#content').val().length);
	},200);
</script>
@endsection