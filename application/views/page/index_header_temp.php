<html lang="en">

<head>
	<base href="" />
	<title>Revision Schedule</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
	<link href="<?php echo prefix_url; ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo prefix_url; ?>assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo prefix_url; ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo prefix_url; ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

	<?php if ($current_page === 'Add Manpower') : ?>

		<script>
			function applyDisabledStateFromLocalStorage() {
				if (localStorage.getItem('year_disabled') === 'true' && localStorage.getItem('rev_no_disabled') === 'true') {
					document.getElementById('year').classList.add('select-disabled');
					document.getElementById('rev_no').classList.add('select-disabled');

					var added_rev = localStorage.getItem('processing_rev')
					var tableBody = document.getElementById('tableBody');
					var rows = tableBody.getElementsByTagName('tr');

					for (var i = 0; i < rows.length; i++) {
						var rev_id_column = rows[i].getElementsByTagName('td')[0].textContent; // Assuming 'rev_id' is in the first cell

						if (rev_id_column === added_rev) {
							rows[i].removeAttribute('hidden');
							rows[i].removeAttribute('disabled');
						} else {
							rows[i].setAttribute('hidden', true);
							rows[i].setAttribute('disabled', true);
						}
					}

				} else {
					document.getElementById('tableBody').setAttribute('hidden', true);
				}
			}
			window.addEventListener('load', applyDisabledStateFromLocalStorage);
		</script>
	<?php endif; ?>

</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">

	<script>
		var defaultThemeMode = "light";
		var themeMode;
		if (document.documentElement) {
			if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
				themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
			} else {
				if (localStorage.getItem("data-bs-theme") !== null) {
					themeMode = localStorage.getItem("data-bs-theme");
				} else {
					themeMode = defaultThemeMode;
				}
			}
			if (themeMode === "system") {
				themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
			}
			document.documentElement.setAttribute("data-bs-theme", themeMode);
		}
	</script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="page d-flex flex-row flex-column-fluid">

			<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
				<!--begin::Logo-->
				<div class="aside-logo flex-column-auto pt-10 pt-lg-20 kt_loader" id="kt_aside_logo" style="padding-top: 3rem">
					<a href="<?php echo prefix_url; ?>app">
						<span class="text-white fs-1"><img alt="Logo" src="<?php echo prefix_url; ?>assets/vallourec.png" class="h-40px" /></span>
					</a>

				</div>
				<div class="aside-menu flex-column-fluid pt-0 pb-7 py-lg-10" id="kt_aside_menu">
					<!--begin::Aside menu-->
					<div id="kt_aside_menu_wrapper" class="w-100 hover-scroll-overlay-y scroll-ps d-flex" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="0">
						<div id="kt_aside_menu" class="menu menu-column menu-title-gray-600 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-icon-gray-400 menu-arrow-gray-400 fw-semibold fs-6 my-auto" data-kt-menu="true">
							<!--begin:Menu item-->
							<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item here show py-2">
								<!--begin:Menu link-->
								<span class="menu-link menu-center">
									<span class="menu-icon me-0">
										<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
										<span class="svg-icon svg-icon-2x">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
												<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
												<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
												<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
											</svg>
										</span>
									</span>
								</span>
								<div class="menu-sub menu-sub-dropdown px-2 py-4 w-250px mh-75 overflow-auto">
									<div class="menu-item">
										<div class="menu-content">
											<span class="menu-section fs-5 fw-bolder ps-1 py-1">Timeline</span>
										</div>
									</div>
									<div class="menu-item">
										<a class="menu-link active" href="<?php echo prefix_url; ?>app">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Revision Schedule</span>
										</a>
										<a class="menu-link active" href="<?php echo prefix_url; ?>app/employee">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Sync Emp Data</span>
										</a>
										<a class="menu-link active" href="<?php echo prefix_url; ?>app/mpp">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Manpower Planning</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!--end::Aside menu-->
				</div>
			</div>
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<!--begin::Header tablet and mobile-->
				<div class="header-mobile py-3">
					<!--begin::Container-->
					<div class="container d-flex flex-stack">
						<!--begin::Mobile logo-->
						<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
							<a href="<?php echo prefix_url; ?>">
								<img alt="Logo" src="<?php echo prefix_url; ?>assets/logo.png" class="h-35px" />
							</a>
						</div>
						<button class="btn btn-icon btn-active-color-primary" id="kt_aside_toggle">
							<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
							<span class="svg-icon svg-icon-2x me-n1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor" />
									<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</button>
						<!--end::Aside toggle-->
					</div>
					<!--end::Container-->
				</div>
				<div id="kt_header" class="header py-6 py-lg-0" style="height: 180px;">
					<!--begin::Container-->
					<div class="header-container container-xxl">
						<!--begin::Page title-->
						<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-20 py-3 py-lg-0 me-3">
							<!--begin::Heading-->
							<h3 class="d-flex flex-column text-dark fw-bold my-1">
								<big class="text-gray-400 "><?php echo $current_page ?></big>
							</h3>
							<!--end::Heading-->
						</div>
						<div class="d-flex align-items-center flex-wrap">
							<!--begin::Search-->
							<div class="header-search py-3 py-lg-0 me-3">
							</div>
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Container-->
					<div class="header-offset"></div>
				</div>
				<!--end::Header-->