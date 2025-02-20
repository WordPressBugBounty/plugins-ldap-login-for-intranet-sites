jQuery(document).ready(function () {
	
	jQuery('#authreports').DataTable({
		order: [[2, 'desc']]
	})

	showOtherProductsPages();

	toggleAddons();

	jQuery("#mo_ldap_local_pricing_div div").mouseover(function(){
		active_id = this.id;
		active_id = active_id.substring(14);

		if ( active_id == 'plans' || active_id == 'feature_comparison' || active_id == 'upgrade_steps' || active_id == 'addons_pricing' ) {
			jQuery("#mo_ldap_local_nav_plans").removeClass('mo_ldap_local_active_nav_block');
			jQuery("#mo_ldap_local_nav_feature_comparison").removeClass('mo_ldap_local_active_nav_block');
			jQuery("#mo_ldap_local_nav_upgrade_steps").removeClass('mo_ldap_local_active_nav_block');
			jQuery("#mo_ldap_local_nav_addons_pricing").removeClass('mo_ldap_local_active_nav_block');

			jQuery("#mo_ldap_local_nav_" + active_id).addClass('mo_ldap_local_active_nav_block');
		}
	});

	jQuery("#mo_ldap_protocol").change(function() {
		var current_selected_protocol_name = jQuery("#mo_ldap_protocol").val();
		var server = document.getElementById("mo_ldap_server").value;
		var ldap_port_number_value = jQuery("#mo_ldap_local_ldap_server_port_no").val();
		var ldaps_port_number_value = jQuery("#mo_ldap_local_ldaps_server_port_no").val();
		var urlDisplay = document.getElementById("ldap_server_url");
		var port = "389";
		
		if (current_selected_protocol_name == "ldaps") {
			port = ldaps_port_number_value;
		} else {
			port = ldap_port_number_value;
		}

		jQuery("#mo_ldap_server_port_no").val(port);
		if(server) {
			urlDisplay.innerHTML = `LDAP URL: <b>` + `${current_selected_protocol_name}://${server}:${port}` + `</b>`;
		} else {
			urlDisplay.innerHTML = "";
		}
	});

	jQuery(".mo_ldap_local_faq_box").click(function (e) {
		let faqAnswerBox = e.target.parentElement.getElementsByClassName('mo_ldap_answer_section')[0];
		let opensection = e.target.parentElement.getElementsByClassName('mo_ldap_local_plus_icon')[0];
		if (faqAnswerBox.style.maxHeight) {
			faqAnswerBox.style.maxHeight = null;
			opensection.innerHTML = '+';
		} else {
			faqAnswerBox.style.maxHeight = faqAnswerBox.scrollHeight + "px";
			opensection.innerHTML = '-';
		}
	});

	jQuery("#mo_ldap_local_documentation_dropdown").click(function (e) {
		let box = document.getElementById('mo_ldap_local_absolute_documentation_box');
		if (box.style.maxHeight) {
			box.style.maxHeight = null;
			box.style.boxShadow = "0";
			document.getElementById('mo_ldap_local_doc_dropdown').style.transform = 'rotate(0deg)'
		} else {
			box.style.maxHeight = box.scrollHeight + "px";
			box.style.width = "122%";
			box.style.boxShadow = "0px 0px 20px 0px rgba(48, 48, 48, 0.29)";
			document.getElementById('mo_ldap_local_doc_dropdown').style.transform = 'rotate(180deg)'
		}
	});

	jQuery(document).mouseup(function(e){
		var container = jQuery("#mo_ldap_local_documentation_section");
	
		if(!container.is(e.target) && container.has(e.target).length === 0){
			let box = document.getElementById('mo_ldap_local_absolute_documentation_box');
			if (box) {
				box.style.maxHeight = null;
				box.style.boxShadow = "0";
			}
			if ( document.getElementById('mo_ldap_local_doc_dropdown') && document.getElementById('mo_ldap_local_doc_dropdown').style.transform == 'rotate(180deg)' ) {
				document.getElementById('mo_ldap_local_doc_dropdown').style.transform = 'rotate(0deg)';
			}
		}
	});

	let licensingNavBar = document.getElementById('mo_ldap_local_licesing_nav');

	if(licensingNavBar !== null) {
		let top = document.getElementById('wpadminbar').scrollHeight;
		licensingNavBar.style.top = top + "px";
	}
	jQuery("#mo_ldap_local_register_phone").intlTelInput();

	jQuery('.mo_ldap_local_nav_elements').click(function(e) {
		jQuery('.mo_ldap_local_nav_elements').parent().removeClass('mo_ldap_local_active_nav_block');
		e.target.parentElement.classList.add('mo_ldap_local_active_nav_block');
	})
	jQuery('#mo_ldap_goto_login').click(function () {
		jQuery('#mo_ldap_goto_login_form').submit();
	});

	jQuery('#mo_ldap_goback').click(function () {
		jQuery('#mo_ldap_goback_form').submit();
	});

	var day = new Date(),
	hour = day.getHours(),
	minutes = day.getMinutes(),
	currentMonth = day.getMonth() + 1,
	currentDay = day.getDate(),
	year = day.getFullYear();

	if(currentMonth < 10)
		currentMonth = '0' + currentMonth.toString();
	if(currentDay < 10)
		currentDay = '0' + currentDay.toString();
	var maxDate = year + '-' + currentMonth + '-' + currentDay;

	jQuery('#datepicker').attr('value', maxDate);
	jQuery('#datepicker').attr('min', maxDate);

	if(hour < 10) hour = '0' + hour;
	if(minutes < 10) minutes = '0' + minutes;

	jQuery('input[type="time"][value="now"]').each(function(){
		jQuery("#ldap-timepicker").attr({'value': hour + ':' + minutes});
		jQuery("#ldap-timepicker").attr('min', hour + ':' + minutes );

		jQuery('#datepicker').change(function() {
			var selectedDate = jQuery('#datepicker').val();
			if(selectedDate === maxDate)
			{
				jQuery("#ldap-timepicker").attr({'value': hour + ':' + minutes});
				jQuery("#ldap-timepicker").attr('min', hour + ':' + minutes );
			}else{
				jQuery("#ldap-timepicker").attr({'value': '00' + ':' + '00'});
				jQuery("#ldap-timepicker").removeAttr('min');
			}
		});

	});



	jQuery("#mo_ldap_local_query_phone").intlTelInput();
	jQuery("#mo_ldap_local_custom_requirements_phone").intlTelInput();

	jQuery('#mo_ldap_local_user_report_log').change(function () {
		jQuery('#user_report_form').submit();
	});
	jQuery("#attribiteconfigtest").submit(function (event) {
		event.preventDefault();
		testConfiguration();
	});
	jQuery("#rolemapconfigtest").submit(function (event) {
		event.preventDefault();
		testRoleMappingConfiguration();
	});
	jQuery('#default_group_mapping').change(function () {
		jQuery('#enable_default_wp_role_mapping_form').submit();
	});
	jQuery('#keep_existing_user_roles').change(function () {
		jQuery('#keep_existing_user_role_mapping_form').submit();
	});
	jQuery('#enable_ldap_role_mapping').change(function () {
		jQuery('#enable_role_mapping_form').submit();
	});
	jQuery('#enable_ldap_login').change(function () {
		jQuery('#enable_login_form').submit();
	});
	jQuery('#enable_admin_wp_login').change(function () {
		jQuery('#enable_admin_wp_login').submit();
	});
	jQuery('#mo_ldap_local_register_user').change(function () {
		jQuery('#enable_register_user_form').submit();
	});
	jQuery("#auth_help").click(function () {
		jQuery("#auth_troubleshoot").toggle();
	});
	jQuery("#conn_help").click(function () {
		jQuery("#conn_troubleshoot").toggle();
	});

	jQuery("#conn_help_user_mapping").click(function () {
		jQuery("#conn_user_mapping_troubleshoot").toggle();
	});

	jQuery("#toggle_am_content").click(function () {
		jQuery("#show_am_content").toggle();
	});

	jQuery("#help_ldap_title").click(function () {
		jQuery("#help_ldap_desc").slideToggle(400);
	});

	jQuery("#connect_using_ldaps").click(function () {
		jQuery("#connect_ldaps_server").slideToggle(400);
	});

	jQuery("#help_ping_title").click(function () {
		jQuery("#help_ping_desc").slideToggle(400);
	});

	jQuery("#help_selinuxboolen_title").click(function () {
		jQuery("#help_selinuxboolen_desc").slideToggle(400);
	});

	jQuery("#single_site_multisite_comaparision").click(function () {
		jQuery("#single_site_multisite_comaparision_desc").slideToggle(400);
	});

	jQuery("#help_invaliddn_title").click(function () {
		jQuery("#help_invaliddn_desc").slideToggle(400);
	});

	jQuery("#help_invalidsf_title").click(function () {
		jQuery("#help_invalidsf_desc").slideToggle(400);
	});

	jQuery("#help_seracccre_title").click(function () {
		jQuery("#help_seracccre_desc").slideToggle(400);
	});

	jQuery("#help_sbase_title").click(function () {
		jQuery("#help_sbase_desc").slideToggle(400);
	});

	jQuery("#help_instance_title").click(function () {
		jQuery("#help_instance_desc").slideToggle(400);
	});

	jQuery("#help_subsite_title").click(function () {
		jQuery("#help_subsite_desc").slideToggle(400);
	});

	jQuery("#help_sfilter_title").click(function () {
		jQuery("#help_sfilter_desc").slideToggle(400);
	});

	jQuery("#help_ou_title").click(function () {
		jQuery("#help_ou_desc").slideToggle(400);
	});

	jQuery("#help_loginusing_title").click(function () {
		jQuery("#help_loginusing_desc").slideToggle(400);
	});

	jQuery("#help_diffdist_title").click(function () {
		jQuery("#help_diffdist_desc").slideToggle(400);
	});

	jQuery("#help_rolemap_title").click(function () {
		jQuery("#help_rolemap_desc").slideToggle(400);
	});

	jQuery("#help_multiplegroup_title").click(function () {
		jQuery("#help_multiplegroup_desc").slideToggle(400);
	});

	jQuery("#help_ldap_warning_title").click(function () {
		jQuery("#help_ldap_warning_desc").slideToggle(400);
	});

	jQuery('#multisite_basic_number_of_subsites_dropdown_div').change(function () {
		var selected_subsite_index = jQuery('#standard_number_of_subsites_dropdown').prop('selectedIndex');
		showTotalPrice("Basic", "multisite", selected_subsite_index);
	});

	jQuery('#multisite_advance_number_of_subsites_dropdown_div').change(function () {

		var selected_subsite_index = jQuery('#advance_number_of_subsites_dropdown').prop('selectedIndex');
		showTotalPrice("plus", "multisite", selected_subsite_index);
	});

	jQuery('#multisite_dirc_sync_number_of_subsites_dropdown_div').change(function () {
		var selected_subsite_index = jQuery('#dirc_sync_number_of_subsites_dropdown').prop('selectedIndex');
		showTotalPrice("direc_sync", "multisite", selected_subsite_index);
	});

	jQuery('#multisite_kerberos_ntlm_number_of_subsites_dropdown_div').change(function () {
		var selected_subsite_index = jQuery('#kerberose_ntml_number_of_subsites_dropdown').prop('selectedIndex');
		showTotalPrice("kerberose_Ntlm", "multisite", selected_subsite_index);
	});

	jQuery('#multisite_multiple_ldap_number_of_subsites_dropdown_div').change(function () {
		var selected_subsite_index = jQuery('#multiple_ldap_number_of_subsites_dropdown').prop('selectedIndex');
		showTotalPrice("multiple_ldap", "multisite", selected_subsite_index);
	});

	jQuery('#multisite_direc_sreach_number_of_subsites_dropdown_div').change(function () {
		var selected_subsite_index = jQuery('#direc_search_number_of_subsites_dropdown').prop('selectedIndex');
		showTotalPrice("direc_search", "multisite", selected_subsite_index);
	});

	jQuery('#multisite_buddyPress_number_of_subsites_dropdown_div').change(function () {
		var selected_subsite_index = jQuery('#buddyPress_number_of_subsites_dropdown').prop('selectedIndex');
		showTotalPrice("buddyPress", "multisite", selected_subsite_index);
	});

	jQuery('#multisite_inclusive_number_of_subsites_dropdown_div').change(function () {
		var selected_subsite_index = jQuery('#inclusive_number_of_subsites_dropdown').prop('selectedIndex');
		showTotalPrice("inclusive", "multisite", selected_subsite_index);
	});

	function showTotalPrice(planType, sites, selected_subsite_index) {
		var subsite_price = [0, 60, 90, 160, 200, 240, 300, 360, 400, 500, 550, 600, 650, 700, 999];
		var total_price = 0;
		var total_susite_price = 0;

		if (planType === "Basic") {
			total_price = 99;
			if (selected_subsite_index != null) {

				total_susite_price = subsite_price[selected_subsite_index];
				total_price = total_price + total_susite_price;
			}
		} else if (planType === "plus") {

			total_price = 199;

			if (selected_subsite_index != null) {
				total_susite_price = subsite_price[selected_subsite_index];
				total_price = total_price + total_susite_price;

			}

		} else if (planType === "direc_sync") {

			total_price = 349;

			if (selected_subsite_index != null) {

				total_susite_price = subsite_price[selected_subsite_index];
				total_price = total_price + total_susite_price;

			}
		} else if (planType === "kerberose_Ntlm") {

			total_price = 349;

			if (selected_subsite_index != null) {

				total_susite_price = subsite_price[selected_subsite_index];
				total_price = total_price + total_susite_price;

			}
		} else if (planType === "multiple_ldap") {

			total_price = 249;

			if (selected_subsite_index != null) {

				total_susite_price = subsite_price[selected_subsite_index];
				total_price = total_price + total_susite_price;

			}
		} else if (planType === "direc_search") {

			total_price = 299;

			if (selected_subsite_index != null) {

				total_susite_price = subsite_price[selected_subsite_index];
				total_price = total_price + total_susite_price;

			}
		} else if (planType === "buddyPress") {

			total_price = 299;

			if (selected_subsite_index != null) {

				total_susite_price = subsite_price[selected_subsite_index];
				total_price = total_price + total_susite_price;

			}
		} else if (planType === "inclusive") {

			total_price = 449;

			if (selected_subsite_index != null) {

				total_susite_price = subsite_price[selected_subsite_index];
				total_price = total_price + total_susite_price;

			}
		}


		if (planType === "Basic") {

			var span = document.getElementById("multisite_basic_total_price"),
				text = document.createTextNode('$' + total_price);
			span.innerHTML = '';
			span.appendChild(text);
		} else if (planType === "plus") {

			var span = document.getElementById("multisite_advance_total_price"),
				text = document.createTextNode('$' + total_price);
			span.innerHTML = '';
			span.appendChild(text);

		} else if (planType === "direc_sync") {

			var span = document.getElementById("multisite_direc_sync_total_price"),
				text = document.createTextNode('$' + total_price);
			span.innerHTML = '';
			span.appendChild(text);

		} else if (planType === "kerberose_Ntlm") {

			var span = document.getElementById("multisite_kerberose_ntlm_total_price"),
				text = document.createTextNode('$' + total_price);
			span.innerHTML = '';
			span.appendChild(text);

		} else if (planType === "multiple_ldap") {

			var span = document.getElementById("multisite_multiple_ldap_total_price"),
				text = document.createTextNode('$' + total_price);
			span.innerHTML = '';
			span.appendChild(text);

		} else if (planType === "direc_search") {

			var span = document.getElementById("multisite_direc_search_total_price"),
				text = document.createTextNode('$' + total_price);
			span.innerHTML = '';
			span.appendChild(text);

		} else if (planType === "buddyPress") {

			var span = document.getElementById("multisite_buddyPress_total_price"),
				text = document.createTextNode('$' + total_price);
			span.innerHTML = '';
			span.appendChild(text);

		} else if (planType === "inclusive") {

			var span = document.getElementById("multisite_inclusive_total_price"),
				text = document.createTextNode('$' + total_price);
			span.innerHTML = '';
			span.appendChild(text);

		}
	}

	jQuery("#mo_ldap_local_view_more_button").click(function () {
		let viewMoreButton = document.getElementById('mo_ldap_local_view_more_button');
		let contentBoxClasses = document.querySelector('.mo_ldap_local_message').classList;
		if (!contentBoxClasses.contains('mo_ldap_full_height')) {
			viewMoreButton.innerHTML = "<svg enable-background='new 0 0 32 32' height='32px' viewBox='-3 -17 15 50' width='32px' xml:space='preserve' transform='rotate(180)'><path d='M18.221,7.206l9.585,9.585c0.879,0.879,0.879,2.317,0,3.195l-0.8,0.801c-0.877,0.878-2.316,0.878-3.194,0  l-7.315-7.315l-7.315,7.315c-0.878,0.878-2.317,0.878-3.194,0l-0.8-0.801c-0.879-0.878-0.879-2.316,0-3.195l9.587-9.585  c0.471-0.472,1.103-0.682,1.723-0.647C17.115,6.524,17.748,6.734,18.221,7.206z' fill='#ffffff'/></svg>"
		} else {
			viewMoreButton.innerHTML = "<svg enable-background='new 0 0 32 32' height='32px' viewBox='0 0 65 40' width='32px' xml:space='preserve'><path d='M18.221,7.206l9.585,9.585c0.879,0.879,0.879,2.317,0,3.195l-0.8,0.801c-0.877,0.878-2.316,0.878-3.194,0  l-7.315-7.315l-7.315,7.315c-0.878,0.878-2.317,0.878-3.194,0l-0.8-0.801c-0.879-0.878-0.879-2.316,0-3.195l9.587-9.585  c0.471-0.472,1.103-0.682,1.723-0.647C17.115,6.524,17.748,6.734,18.221,7.206z' fill='#ffffff'/></svg>"
		}
		contentBoxClasses.toggle('mo_ldap_full_height')
		let titleBoxClasses = document.getElementById('mo_ldap_local_message_title').classList;
		let descBoxClasses = document.getElementById('mo_ldap_local_message_desc').classList;
		titleBoxClasses.toggle('d-none')
		descBoxClasses.toggle('d-none')
	})


	jQuery("#mo_ldap_local_role_mapping_premium_box").hover(function (e) {
		jQuery('.mo_ldap_local_premium_role_mapping_banner').removeClass('mo_ldap_d_none');
		jQuery('.mo_ldap_local_advanced_role_mapping_box').addClass('mo_ldap_local_blur');
	}, function (e) {
		jQuery('.mo_ldap_local_premium_role_mapping_banner').addClass('mo_ldap_d_none');
		jQuery('.mo_ldap_local_advanced_role_mapping_box').removeClass('mo_ldap_local_blur');
	})

	jQuery(".mo_ldap_local_premium_box").hover(function (e) {
		jQuery('.mo_ldap_local_premium_role_mapping_banner').removeClass('mo_ldap_d_none');
		jQuery('.mo_ldap_local_premium_feature_box').addClass('mo_ldap_local_blur');
		jQuery('.mo_ldap_local_advanced_role_mapping_box').addClass('mo_ldap_local_blur');

	}, function (e) {
		jQuery('.mo_ldap_local_premium_role_mapping_banner').addClass('mo_ldap_d_none');
		jQuery('.mo_ldap_local_premium_feature_box').removeClass('mo_ldap_local_blur');
		jQuery('.mo_ldap_local_advanced_role_mapping_box').removeClass('mo_ldap_local_blur');
	})

	jQuery("#mo_ldap_local_role_mapping_type_1").click(function (e) {
		jQuery("#mo_ldap_local_advanced_role_mapping_box1").addClass("mo_ldap_d_none");
		jQuery("#mo_ldap_local_advanced_role_mapping_box2").addClass("mo_ldap_d_none");
		jQuery("#mo_ldap_local_advanced_role_mapping_box3").addClass("mo_ldap_d_none");

		jQuery("#mo_ldap_local_advanced_role_mapping_box1").removeClass("mo_ldap_d_none");
		jQuery("#mo_ldap_local_role_mapping_type_1").addClass(
			"mo_ldap_local_active_role_mapping_subnav"
		);
		jQuery("#mo_ldap_local_role_mapping_type_2").removeClass("mo_ldap_local_active_role_mapping_subnav");
		jQuery("#mo_ldap_local_role_mapping_type_3").removeClass("mo_ldap_local_active_role_mapping_subnav");
	});

	jQuery("#mo_ldap_local_role_mapping_type_2").click(function (e) {
		jQuery("#mo_ldap_local_advanced_role_mapping_box1").addClass("mo_ldap_d_none");
		jQuery("#mo_ldap_local_advanced_role_mapping_box2").addClass("mo_ldap_d_none");
		jQuery("#mo_ldap_local_advanced_role_mapping_box3").addClass("mo_ldap_d_none");

		jQuery("#mo_ldap_local_advanced_role_mapping_box2").removeClass("mo_ldap_d_none");
		jQuery("#mo_ldap_local_role_mapping_type_2").addClass(
			"mo_ldap_local_active_role_mapping_subnav"
		);
		jQuery("#mo_ldap_local_role_mapping_type_1").removeClass("mo_ldap_local_active_role_mapping_subnav");
		jQuery("#mo_ldap_local_role_mapping_type_3").removeClass("mo_ldap_local_active_role_mapping_subnav");
	});

	jQuery("#mo_ldap_local_role_mapping_type_3").click(function (e) {
		jQuery("#mo_ldap_local_advanced_role_mapping_box1").addClass("mo_ldap_d_none");
		jQuery("#mo_ldap_local_advanced_role_mapping_box2").addClass("mo_ldap_d_none");
		jQuery("#mo_ldap_local_advanced_role_mapping_box3").addClass("mo_ldap_d_none");

		jQuery("#mo_ldap_local_advanced_role_mapping_box3").removeClass("mo_ldap_d_none");
		jQuery("#mo_ldap_local_role_mapping_type_3").addClass(
			"mo_ldap_local_active_role_mapping_subnav"
		);
		jQuery("#mo_ldap_local_role_mapping_type_1").removeClass("mo_ldap_local_active_role_mapping_subnav");
		jQuery("#mo_ldap_local_role_mapping_type_2").removeClass("mo_ldap_local_active_role_mapping_subnav");

	});

	jQuery("#mo_ldap_local_advanced_role_mapping_box1").removeClass("mo_ldap_d_none");

});

jQuery('#mo_ldap_troubleshooting_btn1').click(function(){
	jQuery('#mo_ldap_troubleshooting1').toggleClass("mo_ldap_d_none");
});

jQuery("#mo_ldap_local_multidropdown_clearlog_button_box").click(function (e) {
	var selectText = document.getElementById('clear-log-select-text');
	var currentText = selectText.textContent.trim();
	if (currentText === "Never") {
		selectText.textContent = "Select";
	} else {
		selectText.textContent = "Never";
		document.getElementById('clearLogCheckBox').checked = true;
	}

	let box = document.getElementById('mo_ldap_local_showfreq_box');
	
	if (box.style.maxHeight) {
		box.style.maxHeight = null;
		box.style.boxShadow = "0";
		box.classList.remove('showRolesBorder');
	} else {
		box.style.maxHeight = box.scrollHeight + "px";
		dropdownDiv                    = document.getElementsByClassName( 'mo_ldap_local_multidropdown_clearlog_div' );
		box.classList.add('showRolesBorder');
		dropdownDiv[0].style.maxHeight = dropdownDiv[0].scrollHeight + 150 + "px";
	}
});
jQuery(document).mouseup(function(e){
	var container = jQuery("#mo_ldap_local_multidropdown_clearlog_div_box");

	if(!container.is(e.target) && container.has(e.target).length === 0){
		let box = document.getElementById('mo_ldap_local_showfreq_box');
		var selectText = document.getElementById('clear-log-select-text');
		if (box) {
			box.style.maxHeight = null;
			box.style.boxShadow = "0";
			selectText.textContent = "Never";
			document.getElementById('clearLogCheckBox').checked = true;
			box.classList.remove('showRolesBorder');
		}
	}
});
jQuery("#mo_ldap_local_multidropdown_button_box").click(function (e) {
	var selectText = document.getElementById('select-text');
	var currentText = selectText.textContent.trim();
	if (currentText === "Error") {
		selectText.textContent = "Select";
	} else {
		selectText.textContent = "Error";
		document.getElementById('clearLogCheckBox').checked = true;
	}

	let box = document.getElementById('mo_ldap_local_showroles_box');
	
	if (box.style.maxHeight) {
		box.style.maxHeight = null;
		box.style.boxShadow = "0";
		box.classList.remove('showRolesBorder');
	} else {
		box.style.maxHeight = box.scrollHeight + "px";
		dropdownDiv                    = document.getElementsByClassName( 'mo_ldap_local_multidropdown_div' );
		box.classList.add('showRolesBorder');
		dropdownDiv[0].style.maxHeight = dropdownDiv[0].scrollHeight + 100 + "px";
	}
});

document.querySelectorAll(".mo_ldap_local_drop_zone_input").forEach((inputElement) => {
	const dropZoneElement = inputElement.closest(".mo_ldap_local_drop_zone");
	dropZoneElement.addEventListener("click", (e) => {
		inputElement.click();
	});
	inputElement.addEventListener("change", (e) => {
		if (inputElement.files.length) {
		updateThumbnail(dropZoneElement, inputElement.files[0]);
		}
	});
	dropZoneElement.addEventListener("dragover", (e) => {
		e.preventDefault();
		dropZoneElement.classList.add("mo_ldap_local_drop_zone--over");
	});
	["dragleave", "dragend"].forEach((type) => {
		dropZoneElement.addEventListener(type, (e) => {
		});
	});
	dropZoneElement.addEventListener("drop", (e) => {
		e.preventDefault();
		if (e.dataTransfer.files.length) {
		inputElement.files = e.dataTransfer.files;
		updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
		}
	});
});
function updateThumbnail(dropZoneElement, file) {
	const promptSpan = document.querySelector(".mo_ldap_local_drop_zone_prompt");
	let fileName =file.name;
	promptSpan.textContent = fileName;
	dropZoneElement.classList.add("mo_ldap_local_drop_zone--over");
}


jQuery(document).mouseup(function(e){
	var container = jQuery("#mo_ldap_local_multidropdown_div_box");

	if(!container.is(e.target) && container.has(e.target).length === 0){
		let box = document.getElementById('mo_ldap_local_showroles_box');
		var selectText = document.getElementById('select-text');
		if (box) {
			box.style.maxHeight = null;
			box.style.boxShadow = "0";
			selectText.textContent = "Error";
			document.getElementById('errorLogCheckbox').checked = true;
			box.classList.remove('showRolesBorder');
		}
	}
});

document.addEventListener('mouseup', function (e) {
	var message = document.querySelector('.mo_ldap_local_message_container');
	if (message != null && !message.contains(e.target)) {
		message.classList.add('d-none');
	}
});

document.addEventListener('mouseup', function (e) {
	var modalContent = document.querySelector('.mo_ldap_modal-content');
	var modal = document.querySelector('.mo_ldap_modal');
	if (modalContent != null && !modalContent.contains(e.target)) {
		modal.style.display = 'none';
	}
});

document.addEventListener("DOMContentLoaded", function() {
	let protocolSelect = document.getElementById("mo_ldap_protocol");
	let serverInput = document.getElementById("mo_ldap_server");
	let portInput = document.getElementById("mo_ldap_server_port_no");
	let urlDisplay = document.getElementById("ldap_server_url");

	function updateLdapUrl() {
		let protocol = protocolSelect.value;
		let server = serverInput.value;
		let port = portInput.value;
		if(server) {
			urlDisplay.innerHTML = "LDAP URL: <b>" + `${protocol}://${server}:${port}` + "</b>";
		} else {
			urlDisplay.innerHTML = "";
		}
	}

	if( protocolSelect  && serverInput && portInput ) {
		protocolSelect.addEventListener("change", updateLdapUrl);
		serverInput.addEventListener("input", updateLdapUrl);
		portInput.addEventListener("input", updateLdapUrl);
		updateLdapUrl();
	}
	
});

function showFAQbox(elem) {
	elem.parentNode.click();
}

function showCustomAttributeInputField() {
	var getSelectedValue = document.getElementById('ldap_username_attribute');
	
	if (getSelectedValue != null && getSelectedValue.value == "custom_ldap_attribute") {
		document.getElementById('mo_ldap_local_show_custom_attr').style.display = 'inline-flex';
	} else {
		document.getElementById('mo_ldap_local_show_custom_attr').style.display = 'none';
	}
}

function show_custom_search_filter() {			
	var checkbox = document.getElementById("enable_custome_search_filter");
	var popup = document.getElementById("mo_ldap_multiple_attr_toggle");
	var username_attribute = document.getElementById("mo_ldap_username_attr_container");
	var username_options = document.getElementById("mo_ldap_search_filter_ldap");
	if (checkbox.checked) {
		popup.classList.remove("mo_ldap_d_none"); 
		username_attribute.classList.add("mo_ldap_d_none");
		username_options.classList.add("mo_ldap_d_none");
	} else {
		popup.classList.add("mo_ldap_d_none"); 
		username_attribute.classList.remove("mo_ldap_d_none");
		username_options.classList.remove("mo_ldap_d_none");
	}

	const customSearchFilterInput = document.getElementById('custom_search_filter');
	const selectedRadio = document.getElementById('ldap_username_attribute');
	if (selectedRadio.value) {
		if( selectedRadio.value === 'custom_ldap_attribute' ) {
			var custom_attr_value = document.getElementById('mo_ldap_local_show_custom_field').value;
			var single_attr = custom_attr_value.split(';')[0];
			document.getElementById('mo_ldap_custom_search_filter_input_id').value = '(&(' + single_attr + '=?)' + '(|(objectClass=person)(objectClass=user)))';
		} else { 
			document.getElementById('mo_ldap_custom_search_filter_input_id').value = '(&(' + selectedRadio.value + '=?)' + '(|(objectClass=person)(objectClass=user)))';
		}
	}
}

function showCustomDirectoryInputField() {
	var e = document.getElementById("mo_ldap_directory_server_value");
	var value = e.value;
	if (value != null && value == "other") {
		document.getElementById('mo_ldap_local_show_custom_directory').style.display = 'block';
	} else {
		document.getElementById('mo_ldap_local_show_custom_directory').style.display = 'none';
	}
}

function showOtherProductsPages() {
	var navbar = document.getElementById("mo_ldap_other_products_navbar");
	var options = {};
	if (navbar != null) {
		options = navbar.getElementsByClassName("mo_ldap_other_products_opt");
	}

	for (var i = 0; i < options.length; i++) {
		options[i].addEventListener("click", function () {
			var current = document.getElementsByClassName("mo_ldap_other_products_nav_checked");
			var product = document.getElementsByClassName("mo_ldap_other_current_product");

			if (current.length > 0) {
				current[0].className = current[0].className.replace(" mo_ldap_other_products_nav_checked", "");
			}

			if (product.length > 0) {
				product[0].className = product[0].className.replace(" mo_ldap_other_current_product", " mo_ldap_other_product");
			}

			var dataId = this.getAttribute("data-id");
			var showproduct = document.getElementById(dataId);
			showproduct.className = showproduct.className.replace(" mo_ldap_other_product", " mo_ldap_other_current_product");

			this.className += " mo_ldap_other_products_nav_checked";
		});
	}
}

function toggleAddons() {
	var navbar = document.getElementById("mo_ldap_local_addons_navbar");
	var options = {};
	if (navbar != null) {
		options = navbar.getElementsByClassName("mo_ldap_local_btn2_tem");

		jQuery('.mo_ldap_local_btn2_tem').click(function(e) {
			jQuery('.mo_ldap_local_btn2_tem').removeClass('mo-ldap-upgrade-now-btn');
			if(! e.target.classList.contains('mo-ldap-upgrade-now-btn')) {
				e.target.classList.add('mo-ldap-upgrade-now-btn');
				let addonSectionToDisplay = e.target.getAttribute("data-id");
				jQuery('.mo_ldap_local_all_addons').addClass('mo_ldap_d_none');
				document.getElementById(addonSectionToDisplay).classList.remove('mo_ldap_d_none');
			}
		});
	}
}

function mo_ldap_local_license_switch() {
	jQuery("#mo_ldap_local_single_site").toggleClass('mo_ldap_local_toogle_switch_highlighted');
	jQuery("#mo_ldap_local_multi_site").toggleClass('mo_ldap_local_toogle_switch_highlighted');
	jQuery("#mo_ldap_multi_site_plans").toggleClass('mo_ldap_d_none');
	jQuery("#mo_ldap_single_site_plans").toggleClass('mo_ldap_d_none');
}

function mo_ldap_local_display_warning() {
	var warningMessage = document.getElementById("mo_ldap_local_ldap_warning");
	var checkbox = document.getElementById('mo_ldap_local_send_config');
	if(checkbox.checked) {
	warningMessage.style.display = "block";
	} else {
		warningMessage.style.display = "none";	
	}
}

function mo_ldap_local_display_setup_call_details() {
    var setup_call_box = document.getElementById("mo_ldap_local_setup_call_details_div");
    var checkbox = document.getElementById('mo_ldap_local_setup_call');
    if (checkbox.checked) {
        setup_call_box.classList.remove("mo_ldap_d_none");
    } else {
        setup_call_box.classList.add("mo_ldap_d_none");
    }
}

function mo_ldap_local_popup_card_clicked(e, query) {
	var dataId = e.getAttribute("data-id");
	var popupCard = document.getElementById(dataId);

	document.getElementById('mo_ldap_local_query').value = query;

	let allPopCards = document.getElementsByClassName("mo_ldap_local_popup_box");

	Array.from(allPopCards).forEach(
		(popCard) => {
			popCard.classList.add("mo_ldap_d_none");
		}
	);

	let overlay = document.getElementById("mo_ldap_local_overlay");

	if (overlay) {
        overlay.classList.remove("mo_ldap_d_none");
		overlay.classList.add("mo_ldap_d_block");
	}

	popupCard.classList.remove("mo_ldap_d_none");

}

function mo_ldap_local_redirect_youtube(event) {
	event.preventDefault();
}

function mo_ldap_local_popup_card_cancel_remove(e) {
	var dataId = e.getAttribute("data-id");
	var popupCard = document.getElementById(dataId);
	let overlay = document.getElementById("mo_ldap_local_overlay");
	if (overlay) {
		overlay.classList.add("mo_ldap_d_none");
        overlay.classList.remove("mo_ldap_d_block");
    }
	popupCard.classList.add("mo_ldap_d_none");
}

document.addEventListener(
	"mouseup",
	function (e) {
		let overlay = document.getElementById("mo_ldap_local_overlay");
		if (overlay) {
			overlay.classList.remove("mo_ldap_d_block");
			overlay.classList.add("mo_ldap_d_none");
		}

		let popBoxes = document.getElementsByClassName("mo_ldap_local_popup_box");

		Array.from(popBoxes).forEach(
			(popBox) => {
				if (!popBox.classList.contains("mo_ldap_d_none")) {
					if (popBox != null && !popBox.contains(e.target)) {
						popBox.classList.add("mo_ldap_d_none");
					} else {
						if (popBox.contains(e.target) && overlay) {
							overlay.classList.remove("mo_ldap_d_none");
							overlay.classList.add("mo_ldap_d_block");
						}
					}
				}
			}
		);
	}
);

function validateEmail() {
	var email = document.getElementById('query_email');
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value)) {
		return (true)
	}
	else if (email.value.length == 0) {
		alert("Please enter your email address!")
		return (false)
	}
	else {
		alert("You have entered an invalid email address!")
		return (false)
	}
}


function changePricing(ele) {
	var selectId = jQuery(ele).attr("id");
	var selectSubsiteValue = jQuery("select[name=" + selectId + "_subsites]").val();
	var e = document.getElementById(selectId);
	var strUser = e.options[e.selectedIndex].value;
	var strUserInstances = strUser != "UNLIMITED" ? strUser : 500;
	selectArrayElement = [];
	selectSubsiteArrayElement = selectArray.subsite_intances[selectSubsiteValue];
	if (selectId == "pricing_kerberos") {
		selectArrayElement = selectArray.pricing_kerberos[strUser];
		jQuery("#mo_ldap_local_price_" + selectId).text('$ ' + selectArrayElement);
	}
	if (selectId == "pricing_standard") {
		selectArrayElement = selectArray.pricing_standard[strUser];
		jQuery("#mo_ldap_local_price_" + selectId).text('$ ' + selectArrayElement);
	}
	if (selectId == "pricing_enterprise") {
		selectArrayElement = selectArray.pricing_enterprise[strUser];
		jQuery("#mo_ldap_local_price_" + selectId).text('$ ' + selectArrayElement);
	}
	if (selectId == "mulpricing_kerberos") {
		selectArrayElement = parseInt(selectArray.mulpricing_kerberos[strUser].replace(",", "")) + parseInt(parseInt(selectSubsiteArrayElement) * parseInt(strUserInstances));
		jQuery("#mo_ldap_local_price_" + selectId).text('$ ' + selectArrayElement);
	}
	if (selectId == "mulpricing_standard") {
		selectArrayElement = parseInt(selectArray.mulpricing_standard[strUser].replace(",", "")) + parseInt(parseInt(selectSubsiteArrayElement) * parseInt(strUserInstances));
		jQuery("#mo_ldap_local_price_" + selectId).text('$ ' + selectArrayElement);
	}
	if (selectId == "mulpricing_enterprise") {
		selectArrayElement = parseInt(selectArray.mulpricing_enterprise[strUser].replace(",", "")) + parseInt(parseInt(selectSubsiteArrayElement) * parseInt(strUserInstances));
		jQuery("#mo_ldap_local_price_" + selectId).text('$ ' + selectArrayElement);
	}
}

function upgradeform(planType) {
	if (planType == "ContactUs") {
		jQuery("a[id='licensingContactUs']").click();
	}
	else {
		jQuery('#requestOrigin').val(planType);
		if (jQuery('#mo_customer_registered').val() == 1) {
			jQuery('#loginform').submit();
		}
		else {
			location.href = jQuery('#mo_backto_ldap_accountsetup_tab').attr('href');
		}
	}
}

function display_ldap_server_premium_box() {
	var add_ldap_server_Btn = document.getElementById("mo_ldap_add_more_server_premium_box");
	if (add_ldap_server_Btn.classList.contains("mo_ldap_d_none")) {
		add_ldap_server_Btn.classList.remove("mo_ldap_d_none");
	} else {
		add_ldap_server_Btn.classList.add("mo_ldap_d_none");
	}
}

function displayFeatures(ele) {
	features = ele.getElementsByClassName('mo_ldap_local_feature_details');

	if (features[0].style.maxHeight) {
		features[0].style.maxHeight = null;
		ele.getElementsByClassName('mo_ldap_local_dropdown_arrow')[0].classList.toggle("mo_ldap_local_rotate");
		ele.getElementsByClassName('mo_ldap_local_dropdown_arrow')[0].classList.toggle("mo_ldap_local_reverse_rotate");
		// features[0].classList.toggle("mo_ldap_d_none");


	} else {
		// features[0].classList.toggle("mo_ldap_d_none");
		features[0].style.maxHeight = features[0].scrollHeight + "px";
		ele.getElementsByClassName('mo_ldap_local_dropdown_arrow')[0].classList.toggle("mo_ldap_local_reverse_rotate");
		ele.getElementsByClassName('mo_ldap_local_dropdown_arrow')[0].classList.toggle("mo_ldap_local_rotate")

	}
}