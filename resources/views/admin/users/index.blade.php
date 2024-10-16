@extends('layouts.app')

@section('content')
<div class="card card-custom">
	<div class="card-header flex-wrap border-0 pt-6 pb-0">
		<div class="card-title">
			<h3 class="card-label">
				HTML Table
				<span class="d-block text-muted pt-2 font-size-sm">Datatable initialized from HTML table</span>
			</h3>
		</div>
		<div class="card-toolbar">
			<!--begin::Dropdown-->
<div class="dropdown dropdown-inline mr-2">
	<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/PenAndRuller.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <title>Stockholm-icons / Design / Pen&amp;ruller</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"></rect>
        <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"></path>
        <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"></path>
    </g>
</svg><!--end::Svg Icon--></span>		Export
	</button>

	<!--begin::Dropdown Menu-->
	<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
		<!--begin::Navigation-->
		<ul class="navi flex-column navi-hover py-2">
			<li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
		        Choose an option:
		    </li>
			<li class="navi-item">
				<a href="#" class="navi-link">
					<span class="navi-icon"><i class="la la-print"></i></span>
					<span class="navi-text">Print</span>
				</a>
			</li>
			<li class="navi-item">
				<a href="#" class="navi-link">
					<span class="navi-icon"><i class="la la-copy"></i></span>
					<span class="navi-text">Copy</span>
				</a>
			</li>
			<li class="navi-item">
				<a href="#" class="navi-link">
					<span class="navi-icon"><i class="la la-file-excel-o"></i></span>
					<span class="navi-text">Excel</span>
				</a>
			</li>
			<li class="navi-item">
				<a href="#" class="navi-link">
					<span class="navi-icon"><i class="la la-file-text-o"></i></span>
					<span class="navi-text">CSV</span>
				</a>
			</li>
			<li class="navi-item">
				<a href="#" class="navi-link">
					<span class="navi-icon"><i class="la la-file-pdf-o"></i></span>
					<span class="navi-text">PDF</span>
				</a>
			</li>
		</ul>
		<!--end::Navigation-->
	</div>
	<!--end::Dropdown Menu-->
</div>
<!--end::Dropdown-->

<!--begin::Button-->
<a href="#" class="btn btn-primary font-weight-bolder">
	<span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Flatten.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <title>Stockholm-icons / Design / Flatten</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"></rect>
        <circle fill="#000000" cx="9" cy="15" r="6"></circle>
        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
    </g>
</svg><!--end::Svg Icon--></span>	New Record
</a>
<!--end::Button-->
		</div>
	</div>
	<div class="card-body">
		<!--begin: Search Form-->
		<!--begin::Search Form-->
<div class="mb-7">
	<div class="row align-items-center">
		<div class="col-lg-9 col-xl-8">
			<div class="row align-items-center">
				<div class="col-md-4 my-2 my-md-0">
					<div class="input-icon">
						<input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query">
						<span><i class="flaticon2-search-1 text-muted"></i></span>
					</div>
				</div>

                				<div class="col-md-4 my-2 my-md-0">
					<div class="d-flex align-items-center">
						<label class="mr-3 mb-0 d-none d-md-block">Status:</label>
						<div class="dropdown bootstrap-select form-control"><select class="form-control" id="kt_datatable_search_status">
							<option value="">All</option>
							<option value="1">Pending</option>
							<option value="2">Delivered</option>
							<option value="3">Canceled</option>
							<option value="4">Success</option>
							<option value="5">Info</option>
							<option value="6">Danger</option>
						</select><button type="button" tabindex="-1" class="btn dropdown-toggle btn-light bs-placeholder" data-toggle="dropdown" role="combobox" aria-owns="bs-select-1" aria-haspopup="listbox" aria-expanded="false" data-id="kt_datatable_search_status" title="All"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">All</div></div> </div></button><div class="dropdown-menu "><div class="inner show" role="listbox" id="bs-select-1" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div>
					</div>
				</div>
				<div class="col-md-4 my-2 my-md-0">
					<div class="d-flex align-items-center">
						<label class="mr-3 mb-0 d-none d-md-block">Type:</label>
						<div class="dropdown bootstrap-select form-control"><select class="form-control" id="kt_datatable_search_type">
							<option value="">All</option>
							<option value="1">Online</option>
							<option value="2">Retail</option>
							<option value="3">Direct</option>
						</select><button type="button" tabindex="-1" class="btn dropdown-toggle btn-light bs-placeholder" data-toggle="dropdown" role="combobox" aria-owns="bs-select-2" aria-haspopup="listbox" aria-expanded="false" data-id="kt_datatable_search_type" title="All"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">All</div></div> </div></button><div class="dropdown-menu "><div class="inner show" role="listbox" id="bs-select-2" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div>
					</div>
				</div>
                			</div>
		</div>
		<div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
			<a href="#" class="btn btn-light-primary px-6 font-weight-bold">
				Search
			</a>
		</div>
	</div>
</div>
<!--end::Search Form-->
		<!--end: Search Form-->

		<!--begin: Datatable-->
		<div class="datatable datatable-default datatable-bordered datatable-loaded"><table class="datatable-bordered datatable-head-custom datatable-table" id="kt_datatable" style="display: block;">
			<thead class="datatable-head"><tr class="datatable-row" style="left: 0px;"><th data-field="Order ID" class="datatable-cell datatable-cell-sort"><span style="width: 116px;">Order ID</span></th><th data-field="Car Make" class="datatable-cell datatable-cell-sort"><span style="width: 116px;">Car Make</span></th><th data-field="Car Model" class="datatable-cell datatable-cell-sort"><span style="width: 116px;">Car Model</span></th><th data-field="Color" class="datatable-cell datatable-cell-sort"><span style="width: 116px;">Color</span></th><th data-field="Deposit Paid" class="datatable-cell datatable-cell-sort"><span style="width: 116px;">Deposit Paid</span></th><th data-field="Order Date" class="datatable-cell datatable-cell-sort"><span style="width: 116px;">Order Date</span></th><th data-field="Status" data-autohide-disabled="false" class="datatable-cell datatable-cell-sort"><span style="width: 116px;">Status</span></th><th data-field="Type" data-autohide-disabled="false" class="datatable-cell datatable-cell-sort"><span style="width: 116px;">Type</span></th></tr></thead>
			<tbody style="" class="datatable-body"><tr data-row="0" class="datatable-row" style="left: 0px;"><td data-field="Order ID" aria-label="0006-3629" class="datatable-cell"><span style="width: 116px;">0006-3629</span></td><td data-field="Car Make" aria-label="Land Rover" class="datatable-cell"><span style="width: 116px;">Land Rover</span></td><td data-field="Car Model" aria-label="Range Rover" class="datatable-cell"><span style="width: 116px;">Range Rover</span></td><td data-field="Color" aria-label="Orange" class="datatable-cell"><span style="width: 116px;">Orange</span></td><td data-field="Deposit Paid" aria-label="$22672.60" class="datatable-cell"><span style="width: 116px;">$22672.60</span></td><td data-field="Order Date" aria-label="2016-11-28" class="datatable-cell"><span style="width: 116px;">2016-11-28</span></td><td data-field="Status" data-autohide-disabled="false" aria-label="3" class="datatable-cell"><span style="width: 116px;"><span class="label font-weight-bold label-lg label-light-primary label-inline">Canceled</span></span></td><td data-field="Type" data-autohide-disabled="false" aria-label="3" class="datatable-cell"><span style="width: 116px;"><span class="label label-success label-dot mr-2"></span><span class="font-weight-bold text-success">Direct</span></span></td></tr><tr data-row="1" class="datatable-row datatable-row-even" style="left: 0px;"><td data-field="Order ID" aria-label="66403-315" class="datatable-cell"><span style="width: 116px;">66403-315</span></td><td data-field="Car Make" aria-label="GMC" class="datatable-cell"><span style="width: 116px;">GMC</span></td><td data-field="Car Model" aria-label="Jimmy" class="datatable-cell"><span style="width: 116px;">Jimmy</span></td><td data-field="Color" aria-label="Goldenrod" class="datatable-cell"><span style="width: 116px;">Goldenrod</span></td><td data-field="Deposit Paid" aria-label="$55141.29" class="datatable-cell"><span style="width: 116px;">$55141.29</span></td><td data-field="Order Date" aria-label="2017-04-29" class="datatable-cell"><span style="width: 116px;">2017-04-29</span></td><td data-field="Status" data-autohide-disabled="false" aria-label="3" class="datatable-cell"><span style="width: 116px;"><span class="label font-weight-bold label-lg label-light-primary label-inline">Canceled</span></span></td><td data-field="Type" data-autohide-disabled="false" aria-label="2" class="datatable-cell"><span style="width: 116px;"><span class="label label-primary label-dot mr-2"></span><span class="font-weight-bold text-primary">Retail</span></span></td></tr><tr data-row="2" class="datatable-row" style="left: 0px;"><td data-field="Order ID" aria-label="54868-5055" class="datatable-cell"><span style="width: 116px;">54868-5055</span></td><td data-field="Car Make" aria-label="Ford" class="datatable-cell"><span style="width: 116px;">Ford</span></td><td data-field="Car Model" aria-label="Club Wagon" class="datatable-cell"><span style="width: 116px;">Club Wagon</span></td><td data-field="Color" aria-label="Goldenrod" class="datatable-cell"><span style="width: 116px;">Goldenrod</span></td><td data-field="Deposit Paid" aria-label="$70991.52" class="datatable-cell"><span style="width: 116px;">$70991.52</span></td><td data-field="Order Date" aria-label="2017-03-16" class="datatable-cell"><span style="width: 116px;">2017-03-16</span></td><td data-field="Status" data-autohide-disabled="false" aria-label="6" class="datatable-cell"><span style="width: 116px;"><span class="label font-weight-bold label-lg label-light-danger label-inline">Danger</span></span></td><td data-field="Type" data-autohide-disabled="false" aria-label="1" class="datatable-cell"><span style="width: 116px;"><span class="label label-danger label-dot mr-2"></span><span class="font-weight-bold text-danger">Online</span></span></td></tr><tr data-row="3" class="datatable-row datatable-row-even" style="left: 0px;"><td data-field="Order ID" aria-label="44924-112" class="datatable-cell"><span style="width: 116px;">44924-112</span></td><td data-field="Car Make" aria-label="GMC" class="datatable-cell"><span style="width: 116px;">GMC</span></td><td data-field="Car Model" aria-label="Envoy" class="datatable-cell"><span style="width: 116px;">Envoy</span></td><td data-field="Color" aria-label="Indigo" class="datatable-cell"><span style="width: 116px;">Indigo</span></td><td data-field="Deposit Paid" aria-label="$42615.31" class="datatable-cell"><span style="width: 116px;">$42615.31</span></td><td data-field="Order Date" aria-label="2016-09-04" class="datatable-cell"><span style="width: 116px;">2016-09-04</span></td><td data-field="Status" data-autohide-disabled="false" aria-label="2" class="datatable-cell"><span style="width: 116px;"><span class="label font-weight-bold label-lg label-light-danger label-inline">Delivered</span></span></td><td data-field="Type" data-autohide-disabled="false" aria-label="1" class="datatable-cell"><span style="width: 116px;"><span class="label label-danger label-dot mr-2"></span><span class="font-weight-bold text-danger">Online</span></span></td></tr><tr data-row="4" class="datatable-row" style="left: 0px;"><td data-field="Order ID" aria-label="0378-0357" class="datatable-cell"><span style="width: 116px;">0378-0357</span></td><td data-field="Car Make" aria-label="Saab" class="datatable-cell"><span style="width: 116px;">Saab</span></td><td data-field="Car Model" aria-label="9-5" class="datatable-cell"><span style="width: 116px;">9-5</span></td><td data-field="Color" aria-label="Teal" class="datatable-cell"><span style="width: 116px;">Teal</span></td><td data-field="Deposit Paid" aria-label="$74919.63" class="datatable-cell"><span style="width: 116px;">$74919.63</span></td><td data-field="Order Date" aria-label="2017-09-21" class="datatable-cell"><span style="width: 116px;">2017-09-21</span></td><td data-field="Status" data-autohide-disabled="false" aria-label="4" class="datatable-cell"><span style="width: 116px;"><span class="label font-weight-bold label-lg label-light-success label-inline">Success</span></span></td><td data-field="Type" data-autohide-disabled="false" aria-label="2" class="datatable-cell"><span style="width: 116px;"><span class="label label-primary label-dot mr-2"></span><span class="font-weight-bold text-primary">Retail</span></span></td></tr><tr data-row="5" class="datatable-row datatable-row-even" style="left: 0px;"><td data-field="Order ID" aria-label="0363-0590" class="datatable-cell"><span style="width: 116px;">0363-0590</span></td><td data-field="Car Make" aria-label="Suzuki" class="datatable-cell"><span style="width: 116px;">Suzuki</span></td><td data-field="Car Model" aria-label="Grand Vitara" class="datatable-cell"><span style="width: 116px;">Grand Vitara</span></td><td data-field="Color" aria-label="Crimson" class="datatable-cell"><span style="width: 116px;">Crimson</span></td><td data-field="Deposit Paid" aria-label="$72908.80" class="datatable-cell"><span style="width: 116px;">$72908.80</span></td><td data-field="Order Date" aria-label="2017-04-03" class="datatable-cell"><span style="width: 116px;">2017-04-03</span></td><td data-field="Status" data-autohide-disabled="false" aria-label="5" class="datatable-cell"><span style="width: 116px;"><span class="label font-weight-bold label-lg label-light-info label-inline">Info</span></span></td><td data-field="Type" data-autohide-disabled="false" aria-label="1" class="datatable-cell"><span style="width: 116px;"><span class="label label-danger label-dot mr-2"></span><span class="font-weight-bold text-danger">Online</span></span></td></tr><tr data-row="6" class="datatable-row" style="left: 0px;"><td data-field="Order ID" aria-label="35356-778" class="datatable-cell"><span style="width: 116px;">35356-778</span></td><td data-field="Car Make" aria-label="Dodge" class="datatable-cell"><span style="width: 116px;">Dodge</span></td><td data-field="Car Model" aria-label="Ram 2500" class="datatable-cell"><span style="width: 116px;">Ram 2500</span></td><td data-field="Color" aria-label="Goldenrod" class="datatable-cell"><span style="width: 116px;">Goldenrod</span></td><td data-field="Deposit Paid" aria-label="$13569.00" class="datatable-cell"><span style="width: 116px;">$13569.00</span></td><td data-field="Order Date" aria-label="2016-03-22" class="datatable-cell"><span style="width: 116px;">2016-03-22</span></td><td data-field="Status" data-autohide-disabled="false" aria-label="5" class="datatable-cell"><span style="width: 116px;"><span class="label font-weight-bold label-lg label-light-info label-inline">Info</span></span></td><td data-field="Type" data-autohide-disabled="false" aria-label="1" class="datatable-cell"><span style="width: 116px;"><span class="label label-danger label-dot mr-2"></span><span class="font-weight-bold text-danger">Online</span></span></td></tr><tr data-row="7" class="datatable-row datatable-row-even" style="left: 0px;"><td data-field="Order ID" aria-label="48951-3040" class="datatable-cell"><span style="width: 116px;">48951-3040</span></td><td data-field="Car Make" aria-label="Mitsubishi" class="datatable-cell"><span style="width: 116px;">Mitsubishi</span></td><td data-field="Car Model" aria-label="Eclipse" class="datatable-cell"><span style="width: 116px;">Eclipse</span></td><td data-field="Color" aria-label="Aquamarine" class="datatable-cell"><span style="width: 116px;">Aquamarine</span></td><td data-field="Deposit Paid" aria-label="$22471.73" class="datatable-cell"><span style="width: 116px;">$22471.73</span></td><td data-field="Order Date" aria-label="2016-04-17" class="datatable-cell"><span style="width: 116px;">2016-04-17</span></td><td data-field="Status" data-autohide-disabled="false" aria-label="1" class="datatable-cell"><span style="width: 116px;"><span class="label font-weight-bold label-lg label-light-warning label-inline">Pending</span></span></td><td data-field="Type" data-autohide-disabled="false" aria-label="2" class="datatable-cell"><span style="width: 116px;"><span class="label label-primary label-dot mr-2"></span><span class="font-weight-bold text-primary">Retail</span></span></td></tr><tr data-row="8" class="datatable-row" style="left: 0px;"><td data-field="Order ID" aria-label="0487-9801" class="datatable-cell"><span style="width: 116px;">0487-9801</span></td><td data-field="Car Make" aria-label="Pontiac" class="datatable-cell"><span style="width: 116px;">Pontiac</span></td><td data-field="Car Model" aria-label="GTO" class="datatable-cell"><span style="width: 116px;">GTO</span></td><td data-field="Color" aria-label="Green" class="datatable-cell"><span style="width: 116px;">Green</span></td><td data-field="Deposit Paid" aria-label="$43149.39" class="datatable-cell"><span style="width: 116px;">$43149.39</span></td><td data-field="Order Date" aria-label="2016-05-27" class="datatable-cell"><span style="width: 116px;">2016-05-27</span></td><td data-field="Status" data-autohide-disabled="false" aria-label="4" class="datatable-cell"><span style="width: 116px;"><span class="label font-weight-bold label-lg label-light-success label-inline">Success</span></span></td><td data-field="Type" data-autohide-disabled="false" aria-label="1" class="datatable-cell"><span style="width: 116px;"><span class="label label-danger label-dot mr-2"></span><span class="font-weight-bold text-danger">Online</span></span></td></tr><tr data-row="9" class="datatable-row datatable-row-even" style="left: 0px;"><td data-field="Order ID" aria-label="54753-003" class="datatable-cell"><span style="width: 116px;">54753-003</span></td><td data-field="Car Make" aria-label="Audi" class="datatable-cell"><span style="width: 116px;">Audi</span></td><td data-field="Car Model" aria-label="S4" class="datatable-cell"><span style="width: 116px;">S4</span></td><td data-field="Color" aria-label="Turquoise" class="datatable-cell"><span style="width: 116px;">Turquoise</span></td><td data-field="Deposit Paid" aria-label="$39286.74" class="datatable-cell"><span style="width: 116px;">$39286.74</span></td><td data-field="Order Date" aria-label="2016-07-23" class="datatable-cell"><span style="width: 116px;">2016-07-23</span></td><td data-field="Status" data-autohide-disabled="false" aria-label="5" class="datatable-cell"><span style="width: 116px;"><span class="label font-weight-bold label-lg label-light-info label-inline">Info</span></span></td><td data-field="Type" data-autohide-disabled="false" aria-label="2" class="datatable-cell"><span style="width: 116px;"><span class="label label-primary label-dot mr-2"></span><span class="font-weight-bold text-primary">Retail</span></span></td></tr></tbody>
		</table><div class="datatable-pager datatable-paging-loaded"><ul class="datatable-pager-nav my-2 mb-sm-0"><li><a title="First" class="datatable-pager-link datatable-pager-link-first datatable-pager-link-disabled" data-page="1" disabled="disabled"><i class="flaticon2-fast-back"></i></a></li><li><a title="Previous" class="datatable-pager-link datatable-pager-link-prev datatable-pager-link-disabled" data-page="1" disabled="disabled"><i class="flaticon2-back"></i></a></li><li style="display: none;"><input type="text" class="datatable-pager-input form-control" title="Page number"></li><li><a class="datatable-pager-link datatable-pager-link-number datatable-pager-link-active" data-page="1" title="1">1</a></li><li><a class="datatable-pager-link datatable-pager-link-number" data-page="2" title="2">2</a></li><li><a class="datatable-pager-link datatable-pager-link-number" data-page="3" title="3">3</a></li><li><a class="datatable-pager-link datatable-pager-link-number" data-page="4" title="4">4</a></li><li><a class="datatable-pager-link datatable-pager-link-number" data-page="5" title="5">5</a></li><li><a title="Next" class="datatable-pager-link datatable-pager-link-next" data-page="2"><i class="flaticon2-next"></i></a></li><li><a title="Last" class="datatable-pager-link datatable-pager-link-last" data-page="15"><i class="flaticon2-fast-next"></i></a></li></ul><div class="datatable-pager-info my-2 mb-sm-0"><div class="dropdown bootstrap-select datatable-pager-size" style="width: 60px;"><select class="selectpicker datatable-pager-size" title="Select page size" data-width="60px" data-container="body" data-selected="10"><option class="bs-title-option" value=""></option><option value="5">5</option><option value="10">10</option><option value="20">20</option><option value="30">30</option><option value="50">50</option><option value="100">100</option></select><button type="button" tabindex="-1" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="combobox" aria-owns="bs-select-3" aria-haspopup="listbox" aria-expanded="false" title="Select page size"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">10</div></div> </div></button><div class="dropdown-menu "><div class="inner show" role="listbox" id="bs-select-3" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div><span class="datatable-pager-detail">Showing 1 - 10 of 143</span></div></div></div>
		<!--end: Datatable-->
	</div>
</div>
@endsection
