<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="UTF-8">
	<style media="all">
		/* @font-face {
            font-family: 'Roboto';
            src: url("https://fonts.googleapis.com/css2?family=Roboto&display=swap") format("truetype");
            font-weight: normal;
            font-style: normal;
        } */
		@import url("{{ asset('css/font.css') }}");
        *{
            margin: 0;
            padding: 0;
            line-height: 1.3;
			font-family: 'Roboto', sans-serif;
        }
		body{
			font-size: .875rem;
		}
		.gry-color *,
		.gry-color{
			color:rgb(29, 24, 24);
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
		.bold{
			font-weight: 600
		}
		.due-amount{
			font-size: 20px;
			background: #e3e7f0;
			padding: 5px;
			border-radius: 5px;
		}
		h1{
			margin: 0;
		}
		.invoice>span:first-child{
			font-size: 50px
		}


	</style>
</head>
<body>
	<div>
		@php
			$logo = asset('logo/logo.png');
		@endphp
		<div style="padding: 1.5rem;">
			<table>
				<tr>
					<td>
						<img loading="lazy"  src="{{ $logo }}" height="40" style="display:inline-block;">
					</td>
					<td class="text-right invoice">
						<span >INVOICE</span> <br> <span># {{ $admission->id }}</span>
					</td>
				</tr>
				
			</table>
			<table>
				<tr>
					<td style="font-size: 1.2rem;" class="strong">Nirapod Host Dot Com</td>
					<td class="text-right"></td>
				</tr>
				<tr>
					<td style="font-size: 1rem;" class="strong"><b>www.nirapodhost.com</b></td>
				</tr>
				<tr>
					<td class="gry-color small">{{  __('Email') }}: info@nirapodhost.com</td>
				</tr>
				<tr>
					<td class="gry-color small">{{  __('Phone') }}: 01744887740, 01307131414 </td>
				</tr>
			</table>

		</div>

		<div style="padding: 1.5rem;padding-bottom: 0">
            <table>
				<tr><td class="strong gry-color" style="font-size:1rem">{{ __('Bill to') }}:</td></tr>
				<tr><td class="strong"><b>{{ $admission->student_name }}</b></td></tr>

				<tr><td class="small bold text-right">{{ __('Date') }}: {{ date('d-M-Y') }}</td></tr>
				<tr><td class="small bold text-right">{{ __('Payment Terms') }}: Admission</td></tr>
				@if($admission->email !== null )
				<tr><td class="small bold text-right">{{ __('Email') }}: {{ $admission->email }}</tr>
				@endif
				<tr><td class="small bold text-right">{{ __('Phone') }}: {{ $admission->phone }}</td></tr>
				@if($admission->due_amount !== null)
				<tr><td class="small due-amount bold text-right">{{ __('Due Amount') }}: Tk {{ $admission->due_amount }}</td></tr>
				@endif
			</table>
		</div>

	    <div style="padding: 1.5rem;">
			<table class="padding text-left small border-bottom">
				<thead>
	                <tr style="background: #e3e7f0;color:red !important;">
	                    <th width="35%">{{ __('Course') }}</th>
	                    <th width="10%">{{ __('Num Of Courses') }}</th>
	                    <th width="10%">{{ __('Course Duration') }}</th>
	                    <th width="15%">{{ __('Total Course Fee') }}</th>
	                    <th width="15%">{{ __('Admission Fee') }}</th>
	                </tr>
				</thead>
				<tbody class="strong">
					<tr>
						<td>
							{{ $admission->course_name }}
						</td>
						<td>{{ $admission->num_of_course }}</td>
						<td>{{ $admission->course_duration }} Months</td>
						<td>{{ $admission->total_course_fee }}</td>
						<td>{{ $admission->admission_fee }}</td>
					</tr>
	            </tbody>
			</table>
		</div>

	    <div style="padding:0 1.5rem;">
	        <table style="width: 40%;margin-left:auto;" class="text-right sm-padding small strong">
		        <tbody>
					<tr>
			            <th class="gry-color text-left">{{ __('Paid Amount') }}</th>
			            <td class="currency">{{ $admission->paid_amount }}</td>
			        </tr>
					@if($admission->discount_amount !== null)
					<tr>
			            <th class="gry-color text-left">{{ __('Discount Amount') }}</th>
			            <td class="currency">{{ $admission->discount_amount }}</td>
			        </tr>
					@endif
					<tr>
			            <th class="gry-color text-left">{{ __('Sub Total') }}</th>
			            <td class="currency">{{ $admission->sub_total }}</td>
			        </tr>
		        </tbody>
		    </table>
			<div class="text-right" style="margin-top:100px;width: 40%;margin-left:auto;">
				<strong>Seal & Signature</strong>
			</div>
	    </div>

	</div>
</body>
</html>
