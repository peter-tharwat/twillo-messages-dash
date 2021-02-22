@extends('layouts.admin')
@section('content')
<div class="col-12 py-2 px-3 row">
	 <div class="col-12 px-2 pt-4 " style="background: #fff;min-height: 80vh">
	 	<div class="col-12 py-4 justify-content-between row d-flex">
	 		<div class="col-12 col-lg-4 px-2 mb-2">
	 			<form method="get" action="{{route('messages.index')}}">
	 				<input type="" name="key" class="form-control" style="border-radius: 0px;border:1px solid #ddd" placeholder="بحث .. " autofocus="" value="{{request()->get('key')}}">
	 			</form> 
	 		</div>
	 		<div class="col-12 col-lg-4 px-2 justify-content-end d-flex mb-2">
	 			<a href="{{route('messages.create')}}">
	 				<button class="btn btn-primary pb-2 rounded-0"><span class="fas fa-plus"></span> إضافة</button>
	 			</a>
	 		</div>

	 	</div> 
	 	<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">جهة الإتصال</th>
		      <th scope="col">الرسالة</th>

		      <th scope="col">الهاتف</th>
		   	  <th scope="col">الحالة</th>
		      <th scope="col">تحكم</th>
		    </tr>
		  </thead>
		  <tbody>





		  	@foreach($messages as $message)
		    <tr>
		      <td scope="col">{{$message->id}}</td>
		      <td scope="col"><a href="{{route('contacts.index')}}?id={{$message->contact_id}}">{{$message->contact->f_name}} {{$message->contact->l_name}}</a></td>
		      <td scope="col">{{$message->content}}</td>
		 
		      <td scope="col">{{$message->phone}}</td>
		      <td scope="col">
		      	@if($message->status=="PENDING")
		      	<span class="fas fa-paper-plane" style="color: #2381c6"></span>
		      	@elseif($message->status=="FAILED")
		      	<span class="fas fa-exclamation-triangle" style="color: #ff9800"></span>
		      	@elseif($message->status=="DONE")
		      	<span class="fas fa-check" style="color: green"></span>
		      	@endif 
		      	{{-- {{$message->status}} --}}
		      </td>
		      <td class=" row d-flex">
		      	<form method="POST" action="{{route('messages.destroy',$message)}}" id="message_delete_{{$message->id}}">@csrf @method('DELETE')</form>
		      	<a href="{{route('messages.show',$message)}}" style="width: 30px;height: 30px;color: #fff;background: #2381c6;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1">
		      		<span class="fal fa-search"></span>
		      	</a> 
		      	
		      {{-- 	<a href="#" style="width: 30px;height: 30px;color: #fff;background: #c00;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1" onclick='var result = confirm("هل أنت متأكد من عملية الحذف");if (result) {$("#message_delete_{{$message->id}}").submit();}'>
		      		<span class="fal fa-trash"></span>
		      	</a> --}}


		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table> 
		<div class="col-12 px-0 py-2">
			{{$messages->appends(request()->query())->render() }}
		</div>
	 </div> 
</div>
@endsection
