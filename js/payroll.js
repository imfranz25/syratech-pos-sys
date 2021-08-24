

	function show_modal(msg){
		document.getElementById('modal_message').style = 'display:block';
		document.getElementById('msg').innerHTML = msg;
	}

	function option_nationality(selected){
		//List of Nationality
		var nationality = ['Afghan','Albanian','Algerian','American','Andorran','Angolan','Antiguans','Argentinean','Armenian','Australian','Austrian','Azerbaijani','Bahamian','Bahraini','Bangladeshi','Barbadian','Barbudans','Batswana','Belarusian','Belgian','Belizean','Beninese',,'Bhutanese','Bolivian','Bosnian','Brazilian','British','Bruneian','Bulgarian','Burkinabe','Burmese','Burundian','Cambodian','Cameroonian','Canadian','Cape verdean','Central african','Chadian','Chilean','Chinese','Colombian','Comoran','Congolese','Costa rican','Croatian','Cuban','Cypriot','Czech','Danish','Djibouti','Dominican','Dutch','East timorese','Ecuadorean','Egyptian','Emirian','Equatorial guinean','Eritrean','Estonian','Ethiopian','Fijian','Filipino','Finnish','French','Gabonese','Gambian','Georgian','German','Ghanaian','Greek','Grenadian','Guatemalan','Guinea-Bissauan','Guinean','Guyanese','Haitian','Herzegovinian','Honduran','Hungarian','Icelander','Indian','Indonesian','Iranian','Iraqi','Irish','Israeli','Italian','Ivorian','Jamaican','Japanese','Jordanian','Kazakhstani','Kenyan','Kittian and Nevisian','Kuwaiti','Kyrgyz','Laotian','Latvian','Lebanese','Liberian','Libyan','Liechtensteiner','Lithuanian','Luxembourger','Macedonian','Malagasy','Malawian','Malaysian','Maldivan','Malian','Maltese','Marshallese','Mauritanian','Mauritian','Mexican','Micronesian','Moldovan','Monacan','Mongolian','Moroccan','Mosotho','Motswana','Mozambican','Namibian','Nauruan','Nepalese','New zealander','Ni-Vanuatu','Nicaraguan','Nigerien','North Korean','Northern Irish','Norwegian','Omani','Pakistani','Palauan','Panamanian','Papua New Guinean','Paraguayan','Peruvian','Polish','Portuguese','Qatari','Romanian','Russian','Rwandan','Saint Lucian','Salvadoran','Samoan','San Marinese','Sao Tomean','Saudi','Scottish','Senegalese','Serbian','Seychellois','Sierra Leonean','Singaporean','Slovakian','Slovenian','Solomon Islander','Somali','South African','South Korean','Spanish','Sri Lankan','Sudanese','Surinamer','Swazi','Swedish','Swiss',,'Syrian','Taiwanese','Tanzanian','Thai','Togolese','Tongan','Trinidadian or Tobagonian','Tunisian','Turkish','Tuvaluan','Ugandan','Ukrainian','Uruguayan','Uzbekistani','Venezuelan','Vietnamese','Welsh','Yemenite','Zambian','Zimbabwean'];
		//CREATE OPTIONS (NATIONALITY) USING LOOP
		for (var i = 0; i < nationality.length; i++) {
			var option = document.createElement('option');
			var select = document.getElementById('nationality');
			option.name = nationality[i];
			option.value = nationality[i];
			option.innerHTML = nationality[i];
			if (nationality[i] == selected ) {
				option.selected = nationality[i];
			}
			select.appendChild(option);

		}//END
	}
	
	function option_nations(selected){
		//List of Countries/Nations
		var nations = ['Afganistan','Albania','Algeria','American Samoa','Andorra','Angola','Anguilla','Antigua & Barbuda','Argentina','Armenia','Aruba','Australia','Austria','Azerbaijan','Bahamas','Bahrain','Bangladesh','Barbados','Belarus','Belgium','Belize','Benin','Bermuda','Bhutan','Bolivia','Bonaire','Bosnia & Herzegovina','Botswana','Brazil','British Indian Ocean Ter','Brunei','Bulgaria','Burkina Faso','Burundi','Cambodia','Cameroon','Canada','Canary Islands','Cape Verde','Cayman Islands','Central African Republic','Chad','Chile','China','Christmas Island','Cocos Island','Colombia','Comoros','Congo','Cook Islands','Costa Rica','Cote Divoire','Croatia','Cuba','Curaco','Cyprus','Czech Republic','Denmark','Djibouti','Dominica','Dominican Republic','East Timor','Ecuador','Egypt','El Salvador','Equatorial Guinea','Eritrea','Estonia','Ethiopia','Falkland Islands','Faroe Islands','Fiji','Finland','France','French Guiana','French Polynesia','French Southern Ter','Gabon','Gambia','Georgia','Germany','Ghana','Gibraltar','Great Britain','Greece','Greenland','Grenada','Guadeloupe','Guam','Guatemala','Guinea','Guyana','Haiti','Hawaii','Honduras','Hong Kong','Hungary','Iceland','Indonesia','India','Iran','Iraq','Ireland','Isle of Man','Israel','Italy','Jamaica','Japan','Jordan','Kazakhstan','Kenya','Kiribati','Korea North','Korea Sout','Kuwait','Kyrgyzstan','Laos','Laos','Latvia','Lebanon','Lesotho','Liberia','Libya','Liechtenstein','Lithuania','Luxembourg','Macau','Macedonia','Madagascar','Malaysia','Malawi','Maldives','Mali','Marshall Islands','Martinique','Mauritania','Mauritius','Mayotte','Mexico','Midway Islands','Moldova','Monaco','Mongolia','Montserrat','Morocco','Mozambique','Myanmar','Nambia','Nauru','Nepal','Netherland Antilles','Netherlands','Nevis','New Caledonia','New Zealand','Nicaragua','Niger','Nigeria','Niue','Norfolk Island','Norway','Oman','Pakistan','Palau Island','Palestine','Panama','Papua New Guinea','Paraguay','Peru','Philippines','Pitcairn Island','Poland','Portugal','Puerto Rico','Qatar','Republic of Montenegro','Republic of Serbia','Reunion','Romania','Russia','Rwanda','St Barthelemy','St Eustatius','St Helena','St Kitts-Nevis','St Lucia','St Maarten','St Pierre & Miquelon','St Vincent & Grenadines','Saipan','Samoa','Samoa American','San Marino','Sao Tome & Principe','Saudi Arabia','Senegal','Seychelles','Sierra Leone','Singapore','Slovakia','Slovenia','Solomon Islands','Somalia','South Africa','Spain','Sri Lanka','Sudan','Suriname','Swaziland','Sweden','Switzerland','Syria','Tahiti','Taiwan','Tajikistan','Tanzania','Thailand','Togo','Tokelau','Tonga','Trinidad & Tobago','Tunisia','Turkey','Turkmenistan','Turks & Caicos Is','Tuvalu','Uganda','United Kingdom','Ukraine','United Arab Erimates','United States of America','Uraguay','Uzbekistan','Vanuatu','Vatican City State','Venezuela','Vietnam','Virgin Islands (Brit)','Virgin Islands (USA)','Wake Island','Wallis & Futana Is','Yemen','Zaire','Zambia','Zimbabwe'];
		//CREATE OPTIONS (NATIONS) USING LOOP
		for (var i = 0; i < nations.length; i++) {
			var option = document.createElement('option');
			var select = document.getElementById('country');
			option.name = nations[i];
			option.value = nations[i];
			option.innerHTML = nations[i];
			if (nations[i] == selected ) {
				option.selected = nations[i];
			}
			select.appendChild(option);
		}//END
	}

	


$(document).ready(function(){

	$('#delete').click(function(e){
		document.getElementById('modal_message').style = 'display:block';
	});
	$('#btn_cancel').click(function(e){
		document.getElementById('modal_message').style = "display:none";
	});

	$('#save').click(function(e){
		if((document.getElementById('pic_path').value) == ''){
			alert("Upload a Picture");
			document.getElementById('save').value = 'false';
		}
	});

	$('#upload_file').change(function(e){

		var formData = new FormData($('#choose_profile')[0]);

		$.ajax({
			type: 'POST',
			url: '../account/upload_pic.php',
			data: formData,
			contentType: false,
			processData: false,
			dataType: 'json',
			success: function(result){
				if(result.ok){
					document.getElementById('profile_picture').src = "../account/" + result.temp_path;
					$('#pic_path').val(result.temp_path);
				}
				else{
					alert('Error encountered while trying to upload the picture!');
				}
			}

		});
		
		return false;
	});

});