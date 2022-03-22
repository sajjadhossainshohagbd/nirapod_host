@extends('backend.layouts.app')

@section('content')
	<style media="all">
		/* @font-face {
            font-family: 'Roboto';
            src: url("https://fonts.googleapis.com/css2?family=Roboto&display=swap") format("truetype");
            font-weight: normal;
            font-style: normal;
        } */
		@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        *{
            margin: 0;
            padding: 0;
            line-height: 1.3;
			font-family: 'Roboto', sans-serif;
            color: #333542;
        }
		body{
			font-size: .875rem;
		}
		.gry-color *,
		.gry-color{
			color:#878f9c;
		}
		table{
			width: 100%;
		}
		table th{
			font-weight: normal;
		}
		table.padding th{
			padding: .5rem .7rem;
		}
		table.padding td{
			padding: .7rem;
		}
		table.sm-padding td{
			padding: .2rem .7rem;
		}
		.border-bottom td,
		.border-bottom th{
			border-bottom:1px solid #eceff4;
		}
		.text-left{
			text-align:left;
		}
		.text-right{
			text-align:right;
		}
		.small{
			font-size: .85rem;
		}
		.currency{

		}
		button{
			outline: none;
			border: none;
			padding: 8px;
			border-radius: 10px;
			background: #0A9;
			color: #fff;
			float: right;
			margin-top: 16px;
			margin-right: 65px;
			cursor: pointer;
		}
		input{
			outline: none
		}
	</style>
	<div class="page-content">
		@php
			$logo = asset('logo/logo.png');
		@endphp
		<div style="background: #ECF1F0;padding: 1.5rem;">
			<table>
				<tr>
					<td>
						<img loading="lazy"  src="{{ $logo }}" height="40" style="display:inline-block;">
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td style="font-size: 1.2rem;" class="strong">Nirapod Host Dot Com</td>
					<td class="text-right"></td>
				</tr>
				<tr>
					<td class="gry-color small">{{  __('Email') }}: info@nirapodhost.com</td>
				</tr>
				<tr>
					<td class="gry-color small">{{  __('Phone') }}: 01744887740, 01307131414 </td>
				</tr>
			</table>

		</div>

		<form action="{{ route('admission.store') }}" method="post">
			@csrf
			<div style="padding: 1.5rem;padding-bottom: 0">
				<table>
					<tr><td class="strong small gry-color">{{ __('Bill to') }}:</td></tr>
					<tr><td class="strong"><input type="text" name="name" required></td></tr>
					<tr><td class="gry-color small">{{ __('Payment Terms') }}: Admission</td></tr>
					<tr><td class="gry-color small">{{ __('Email') }}: <input type="email" name="bill_to_email"></td></tr>
					<tr><td class="gry-color small">{{ __('Phone') }}: <input type="number" name="bill_to_phone" required></td></tr>
					<tr><td class="gry-color small">{{ __('Address') }}: <input type="text" name="bill_to_address" required></td></tr>
				</table>
			</div>
	
			<div style="padding: 1.5rem;">
				<table class="padding text-left small border-bottom">
					<thead>
						<tr class="gry-color" style="background: #eceff4;">
							<th width="35%">{{ __('Course') }}</th>
							<th width="10%">{{ __('Num Of Courses') }}</th>
							<th width="10%">{{ __('Months') }}</th>
							<th width="15%">{{ __('Total Course Fee') }}</th>
							<th width="15%" class="text-right" id="admission_fee">{{ __('Admission Fee') }}</th>
						</tr>
					</thead>
					<tbody class="strong">
						<tr>
							<td>
								<select name="course_name" id="course_name" onchange="CourseFee(this)">
									<option value="" selected>Select Course</option>
									<option value="Office Application With Certificate">Office Application With Certificate</option>
									<option value="Office Application Without Certificate">Office Application Without Certificate</option>
									<option value="Web Design">Web Design</option>
									<option value="Web Development">Web Development</option>
									<option value="Web Design & Development">Web Design & Development</option>
								</select>
							</td>
							<td><input type="number" name="num_of_course" value="1" required></td>
							<td id="course_duration_field">
								<select name="course_duration" id="course_duration" required>
									<option value="">Select Duration</option>
									<option value="3">3 Month</option>
									<option value="6">6 Month</option>
									<option value="12">1 Year</option>
									<option value="custom">Custom</option>
								</select>
							</td>
							<td><input type="number" onchange="calculation($('#total_course_fee').val())" id="total_course_fee" name="total_course_fee" required></td>
							<td><input type="number" onchange="calculation($('#total_course_fee').val())" id="amount" value="2500" name="amount" required></td>
						</tr>
					</tbody>
				</table>
			</div>
			
			<div style="padding:0 1.5rem;">
				<table style="width: 40%;margin-left:auto;" class="text-right sm-padding small strong">
					<tbody>
						<tr>
							<th class="gry-color text-left">{{ __('Paid Amount') }}</th>
							<td class="currency"><input type="number" name="paid_amount" id="paid_amount" onchange="calculation($('#total_course_fee').val(),$('#paid_amount').val(),$('#discount_amount').val())" required></td>
						</tr>
						<tr>
							<th class="gry-color text-left">{{ __('Due Amount') }}</th>
							<td class="currency"><input type="number" name="due_amount" id="due_amount"></td>
						</tr>
						<tr>
							<th class="gry-color text-left">{{ __('Discount Amount') }}</th>
							<td class="currency"><input type="number" name="discount_amount" id="discount_amount" onchange="calculation($('#total_course_fee').val(),$('#paid_amount').val(),$('#discount_amount').val())"></td>
						</tr>
						<tr>
							<th class="gry-color text-left">{{ __('Sub Total') }}</th>
							<td class="currency"><input type="number" name="sub_total" id="sub_total" required></td>
						</tr>
					</tbody>
				</table>
			</div>

			<button type="submit">{{ __("Add Admission") }}</button>
		</form>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script>
		function calculation(course_fee,paid_amount = 0,discount_amount = 0){
			var plus = +course_fee + -paid_amount - discount_amount;
			$('#due_amount').val(plus);
		}
		$('#paid_amount').on('change',function(){
			$('#sub_total').val($('#paid_amount').val());
		})

		function CourseFee(select)
		{
			if($('#course_name').val() == 'Office Application With Certificate'){
				$('#total_course_fee').val(6000);
				$('#discount_amount').val(500);
			}else if($('#course_name').val() == 'Office Application Without Certificate'){
				$('#total_course_fee').val(5000);
				$('#discount_amount').val(500);
			}else if($('#course_name').val() == 'Web Design'){
				$('#total_course_fee').val(7500);
				$('#discount_amount').val(1500);
			}else if($('#course_name').val() == 'Web Development'){
				$('#total_course_fee').val(7500);
				$('#discount_amount').val(1500);
			}else if($('#course_name').val() == 'Web Design & Development'){
				$('#total_course_fee').val(15000);
				$('#discount_amount').val(3500);
			}
			calculation($('#total_course_fee').val(),$('#paid_amount').val(),$('#discount_amount').val());
		}
		$('#course_duration').on('change',function(){
			if($('#course_duration').val() == 'custom'){
				var html = '<input type="number" name="course_duration">';
				$('#course_duration_field').html(html);
			}

		});
	</script>
@endsection
