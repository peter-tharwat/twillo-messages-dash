@extends('layouts.admin')
@section('content')
<div class="col-12 py-2 px-3 row">
	<div class="col-6 col-sm-4 col-lg-3 col-xl-2 px-2 mb-3">
		<div class="col-12 px-0 py-2 d-flex " style="background: #fff;">
			<div style="width: 80px;" class="p-2">
				<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #11233b;height: 64px;border-radius: 50%;">
					<span class="fas fa-users font-5" style="color: #fff"></span>
				</div>
			</div>
			<div style="width: calc(100% - 80px)" class="px-2 py-2">
				<h6 class="font-1">جهات الاتصال</h6>
				<h6 class="font-3">{{\App\Models\Contact::count()}}</h6>
			</div>
		</div>
	</div>

	<div class="col-6 col-sm-4 col-lg-3 col-xl-2 px-2 mb-3">
		<div class="col-12 px-0 py-2 d-flex " style="background: #fff;">
			<div style="width: 80px;" class="p-2">
				<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #11233b;height: 64px;border-radius: 50%;">
					<span class="fas fa-tags font-5" style="color: #fff"></span>
				</div>
			</div>
			<div style="width: calc(100% - 80px)" class="px-2 py-2">
				<h6 class="font-1">التصنيفات</h6>
				<h6 class="font-3">{{\App\Models\Tag::count()}}</h6>
			</div>
		</div>
	</div>
	<div class="col-6 col-sm-4 col-lg-3 col-xl-2 px-2 mb-3">
		<div class="col-12 px-0 py-2 d-flex " style="background: #fff;">
			<div style="width: 80px;" class="p-2">
				<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #11233b;height: 64px;border-radius: 50%;">
					<span class="fas fa-download font-5" style="color: #fff"></span>
				</div>
			</div>
			<div style="width: calc(100% - 80px)" class="px-2 py-2">
				<h6 class="font-1">عمليات الاستيراد</h6>
				<h6 class="font-3">{{\App\Models\Import::count()}}</h6>
			</div>
		</div>
	</div>
	<div class="col-6 col-sm-4 col-lg-3 col-xl-2 px-2 mb-3">
		<div class="col-12 px-0 py-2 d-flex " style="background: #fff;">
			<div style="width: 80px;" class="p-2">
				<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #11233b;height: 64px;border-radius: 50%;">
					<span class="fas fa-envelope font-5" style="color: #fff"></span>
				</div>
			</div>

			<div style="width: calc(100% - 80px)" class="px-2 py-2">
				<h6 class="font-1">الرسائل</h6>
				<h6 class="font-3">{{\App\Models\Message::count()}}</h6>
			</div>
		</div>
	</div>
	<div class="col-6 col-sm-4 col-lg-3 col-xl-2 px-2 mb-3">
		<div class="col-12 px-0 py-2 d-flex " style="background: #fff;">
			<div style="width: 80px;" class="p-2">
				<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #11233b;height: 64px;border-radius: 50%;">
					<span class="fal fa-envelope font-5" style="color: #fff"></span>
				</div>
			</div>

			<div style="width: calc(100% - 80px)" class="px-2 py-2">
				<h6 class="font-1">نماذج الرسائل</h6>
				<h6 class="font-3">{{\App\Models\MessageTemplate::count()}}</h6>
			</div>
		</div>
	</div>

	<div class="col-12 d-flex row mt-2">
		<div class="col-12 col-lg-3 text-center  py-4 justify-content-center">
			<div class="d-inline-block d-flex justify-content-center align-items-center" style="position: relative;">
				<svg class="circle-chart m-auto" viewBox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg" style="width: 180px;">
				<circle class="circle-chart__background" stroke="#f1f1f1" stroke-width="1" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431"></circle>
				<circle class="circle-chart__circle" stroke="#48da5e" stroke-width="1.5" stroke-dasharray="88,100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431"></circle>
				<span style="position: absolute;top: 28%;color: #48da5e" class="font-5">
				@php 
				$res = \Http::withBasicAuth(env('TWILLO_ACCOUNT_ID'),env('TWILLO_ACCOUNT_ACCESS_TOKEN'))->get('https://api.twilio.com/2010-04-01/Accounts/'.env('TWILLO_ACCOUNT_ID').'/Balance.json')->json();
				
				@endphp  
				{{$res['balance'] }} <br>{{$res['currency']}}</span>
				</svg>
			</div>
			
			<div class="col-12 font-3 mt-3" style="color: #48da5e">
				الرصيد المتاح
				

			</div>

		</div>
	</div>

{{-- 	<div class="col-6 col-sm-4 col-lg-3 col-xl-2 px-2 mb-3">
		<div class="col-12 px-0 py-2 d-flex " style="background: #fff;">
			<div style="width: 80px;" class="p-2">
				<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #11233b;height: 64px;border-radius: 50%;">
					<span class="fas fa-stars font-5" style="color: #fff"></span>
				</div>
			</div>

			<div style="width: calc(100% - 80px)" class="px-2 py-2">
				<h6 class="font-1">التقييمات</h6>
				<h6 class="font-3">96</h6>
			</div>
		</div>
	</div>
	<div class="col-6 col-sm-4 col-lg-3 col-xl-2 px-2 mb-3">
		<div class="col-12 px-0 py-2 d-flex " style="background: #fff;">
			<div style="width: 80px;" class="p-2">
				<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #11233b;height: 64px;border-radius: 50%;">
					<span class="fas fa-sack-dollar font-5" style="color: #fff"></span>
				</div>
			</div>

			<div style="width: calc(100% - 80px)" class="px-2 py-2">
				<h6 class="font-1">مدفوعات</h6>
				<h6 class="font-3">26.280 ريال</h6>
			</div>
		</div>
	</div> 
	<div class="col-6 col-sm-4 col-lg-3 col-xl-2 px-2 mb-3">
		<div class="col-12 px-0 py-2 d-flex " style="background: #fff;">
			<div style="width: 80px;" class="p-2">
				<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #11233b;height: 64px;border-radius: 50%;">
					<span class="fas fa-box-check font-5" style="color: #fff"></span>
				</div>
			</div>

			<div style="width: calc(100% - 80px)" class="px-2 py-2">
				<h6 class="font-1">الطلبات</h6>
				<h6 class="font-3">180</h6>
			</div>
		</div>
	</div>

	<div class="col-6 col-sm-4 col-lg-3 col-xl-2 px-2 mb-3">
		<div class="col-12 px-0 py-2 d-flex " style="background: #fff;">
			<div style="width: 80px;" class="p-2">
				<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #11233b;height: 64px;border-radius: 50%;">
					<span class="fas fa-book font-5" style="color: #fff"></span>
				</div>
			</div>

			<div style="width: calc(100% - 80px)" class="px-2 py-2">
				<h6 class="font-1">مقال</h6>
				<h6 class="font-3">19</h6>
			</div>
		</div>
	</div>

	<div class="col-6 col-sm-4 col-lg-3 col-xl-2 px-2 mb-3">
		<div class="col-12 px-0 py-2 d-flex " style="background: #fff;">
			<div style="width: 80px;" class="p-2">
				<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #11233b;height: 64px;border-radius: 50%;">
					<span class="fas fa-book font-5" style="color: #fff"></span>
				</div>
			</div>

			<div style="width: calc(100% - 80px)" class="px-2 py-2">
				<h6 class="font-1">أخبار</h6>
				<h6 class="font-3">7</h6>
			</div>
		</div>
	</div>
	<div class="col-12 px-0 row d-flex">
		<div class="col-12 col-lg-5 d-flex row" style="background: #fff">
			<div class="col-4 py-4 text-center">
				<span class="fab fa-youtube font-10" style="color: #f44336;height: 65px"></span>
				<div class="col-12 text-center font-2 mt-2">
					الدورات التعليمية
				</div>
				<div class="col-12 text-center py-3">
					<a href="#">
						<button class="btn pb-2 px-4 pt-1" style="border-radius: 50px;background: #03a9f4;color:#fff">إضافة</button>
					</a>
				</div>
			</div>
			<div class="col-4 py-4 text-center">
				<span class="fad fa-hands-helping font-10" style="color: #11233b;height: 65px"></span>
				<div class="col-12 text-center font-2 mt-2">
					شركاء النجاح
				</div>
				<div class="col-12 text-center py-3">
					<a href="#">
						<button class="btn pb-2 px-4 pt-1" style="border-radius: 50px;background: #03a9f4;color:#fff">إضافة</button>
					</a>
				</div>
			</div>
			<div class="col-4 py-4 text-center">
				<span class="fad fa-box-full font-10" style="color: #03a9f4;height: 65px"></span>
				<div class="col-12 text-center font-2 mt-2">
					الكورسات
				</div>
				<div class="col-12 text-center py-3">
					<a href="#">
						<button class="btn pb-2 px-4 pt-1" style="border-radius: 50px;background: #03a9f4;color:#fff">إضافة</button>
					</a>
				</div>
			</div>
			<div class="col-4 py-4 text-center">
				<span class="fad fa-play font-10" style="color: #4caf50;height: 65px"></span>
				<div class="col-12 text-center font-2 mt-2">
					الفيديوهات
				</div>
				<div class="col-12 text-center py-3">
					<a href="#">
						<button class="btn pb-2 px-4 pt-1" style="border-radius: 50px;background: #03a9f4;color:#fff">إضافة</button>
					</a>
				</div>
			</div>
			<div class="col-4 py-4 text-center">
				<span class="fad fa-book font-10" style="color: #795548;height: 65px"></span>
				<div class="col-12 text-center font-2 mt-2">
					المقالات
				</div>
				<div class="col-12 text-center py-3">
					<a href="#">
						<button class="btn pb-2 px-4 pt-1" style="border-radius: 50px;background: #03a9f4;color:#fff">إضافة</button>
					</a>
				</div>
			</div>

			<div class="col-4 py-4 text-center">
				<span class="fad fa-newspaper font-10" style="color: #795548;height: 65px"></span>
				<div class="col-12 text-center font-2 mt-2">
					الأخبار
				</div>
				<div class="col-12 text-center py-3">
					<a href="#">
						<button class="btn pb-2 px-4 pt-1" style="border-radius: 50px;background: #03a9f4;color:#fff">إضافة</button>
					</a>
				</div>
			</div>

		</div>
	</div> --}}
	 

</div>
@endsection