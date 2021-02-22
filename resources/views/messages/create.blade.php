@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3">
	 		<h4>إضافة مجموعة</h4>
	 	</div>
	 	<div class="col-12 col-lg-9 px-3 py-5">
	 		<form class="col-12" method="POST" action="{{route('messages.store')}}">
	 			@csrf 
	 		
	 		<div class="col-12 col-md-6 px-0 row mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				اختر المجموعة
	 			</div>
	 			<div class="col-9 px-2">
	 				<select class="select2 col-12 form-control" name="tags[]" multiple="" style="opacity: 0" size="1" tabindex="-1" id="message_tags">
	 					@php 
	 					$tags=\App\Models\Tag::get();
	 					@endphp
	 					@foreach($tags as $tag)
					  		<option value="{{$tag->id}}">{{$tag->tag_name}}</option> 
					  	@endforeach
					</select>
	 			</div> 
	 		</div>

	 		<div class="col-12 col-md-6 px-0 row mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				اختر جهات الإتصال
	 			</div>
	 			<div class="col-9 px-2">
	 				<select class="select2 col-12 form-control" name="contacts_id[]" multiple="" style="opacity: 0" size="1" tabindex="-1" id="message_contacts">
	 					@php 
	 					$contacts=\App\Models\Contact::get();
	 					@endphp
	 					@foreach($contacts as $contact)
					  		<option value="{{$contact->id}}">{{$contact->f_name}} {{$contact->l_name}} ({{$contact->phone}})</option> 
					  	@endforeach
					</select>
	 			</div> 
	 		</div> 


	 		<div class="col-12 col-md-6 px-0 row mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				اختر نموذج الرسائل
	 			</div>
	 			<div class="col-9 px-2">
	 				<select class="select2 col-12 form-control"  style="opacity: 0" size="1" tabindex="-1" id="template">
	 					<option></option>
	 					@php 
	 					$templates=\App\Models\MessageTemplate::get();
	 					@endphp
	 					@foreach($templates as $template)
					  		<option value="{{$template->content}}">{{$template->title}}</option> 
					  	@endforeach
					</select>
	 			</div> 
	 		</div> 


	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				الرسالة
	 			</div>
	 			<div class="col-9 px-2" >
	 				<textarea class="form-control" name="content" id="content" style="min-height: 200px"  >{{old('content')}}</textarea> 
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
<script>
	$('#template').on('change',function(){
		$('#content').val($(this).val());
	});
	setInterval(function(){
		$('#length').text($('#content').val().length);
	},200);
	$('#message_tags').on('change',function(){
		//alert($(this).val());
		if($(this).val()!=null)
			$('#message_contacts').parent().parent().fadeOut();
		else
			$('#message_contacts').parent().parent().fadeIn();
	});
	$('#message_contacts').on('change',function(){
		if($(this).val()!=null)
			$('#message_tags').parent().parent().fadeOut();
		else
			$('#message_tags').parent().parent().fadeIn();
	}); 
	

</script>
@endsection