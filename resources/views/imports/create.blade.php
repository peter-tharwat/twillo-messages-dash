@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3">
	 		<h4>إضافة استيراد</h4>
	 	</div>
	 	<div class="col-12 col-lg-9 px-3 py-5">
	 		<form class="col-12" method="POST" action="{{route('imports.store')}}" enctype='multipart/form-data'>
	 			@csrf 
	 		
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				ملف الاستيراد
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="file" name="file" class="form-control" value="{{old('file')}}" required="">
	 			</div> 
	 		</div>

	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				المجموعة
	 			</div>
	 			<div class="col-9 px-2">
	 				<select class="select2 col-12 form-control" name="tags[]"  style="opacity: 0" size="1" tabindex="-1">
	 					@php 
	 					$tags=\App\Models\Tag::get();
	 					@endphp
	 					@foreach($tags as $tag)
					  		<option value="{{$tag->id}}">{{$tag->tag_name}}</option> 
					  	@endforeach
					</select>
	 			</div> 
	 		</div>
	 		
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				ملاحظة
	 			</div>
	 			<div class="col-9 px-2" >
	 				<textarea class="form-control" name="note" style="min-height: 200px"  >{{old('note')}}</textarea> 
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
@endsection