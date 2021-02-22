@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3">
	 		<h4>تعديل جهة إتصال</h4>
	 	</div>
	 	<div class="col-12 col-lg-9 px-3 py-5">
	 		<form class="col-12" method="POST" action="{{route('contacts.update',$contact)}}">
	 			@csrf 
	 			@method("PATCH")
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				الاسم الأول
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="" name="f_name" class="form-control" value="{{$contact->f_name}}" required="" min="2" max="255">
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				الاسم الثاني
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="" name="l_name" class="form-control" value="{{$contact->l_name}}" required="" min="2" max="255">
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				الهاتف
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="" name="phone" class="form-control" value="{{$contact->phone}}" required="" min="2" max="255">
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				المجموعة
	 			</div>
	 			<div class="col-9 px-2">
	 				
	 				<select class="select2 col-12 form-control" name="tags[]" multiple="" style="opacity: 0" size="1" tabindex="-1">
	 					@php 
	 					$tags=\App\Models\Tag::get();
	 					@endphp
	 					@foreach($tags as $tag)
					  		<option value="{{$tag->id}}" 
					  			@if(in_array($tag->id,$contact->tags->pluck('id')->toArray()) ) 
					  			selected="" 
					  			@endif 
					  			>{{$tag->tag_name}}</option> 
					  	@endforeach
					</select>
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				ملاحظة
	 			</div>
	 			<div class="col-9 px-2" >
	 				<textarea class="form-control" name="note" style="min-height: 200px"  >{{$contact->note}}</textarea> 
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