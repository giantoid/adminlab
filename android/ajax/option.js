$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
	// Kita sembunyikan dulu untuk loadingnya
	$("#loading").hide();
	$("#loading2").hide();
	$("#loading3").hide();
	$("#loading4").hide();
	$("#kabupaten").hide(); // Sembunyikan dulu combobox kota nya
	$("#kecamatan").hide(); // Sembunyikan dulu combobox kota nya
	$("#kelurahan").hide(); 
	$("#jenjang").hide(); 
		
		
	$("#provinsi").change(function(){ // Ketika user mengganti atau memilih data provinsi
		$("#kabupaten").hide(); // Sembunyikan dulu combobox kota nya
		$("#kecamatan").hide(); // Sembunyikan dulu combobox kota nya
		$("#kelurahan").hide(); // Sembunyikan dulu combobox kota nya
		$("#loading").show(); // Tampilkan loadingnya
	
		$.ajax({
			type: "POST", // Method pengiriman data bisa dengan GET atau POST
			// url: "http://localhost/edunesia/core/pendaftaran/option.php", // Isi dengan url/path file php yang dituju
			url: "http://localhost/penduduk/ajax/option.php", // Isi dengan url/path file php yang dituju
			data: {provinsi : $("#provinsi").val()}, // data yang akan dikirim ke file yang dituju
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				$("#loading").hide(); // Sembunyikan loadingnya

				// set isi dari combobox kota
				// lalu munculkan kembali combobox kotanya
				$("#kabupaten").html(response.data_kota).show();
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
				alert(thrownError); // Munculkan alert error
			}
		});
    });
	
	$("#kabupaten").change(function(){ // Ketika user mengganti atau memilih data provinsi
		$("#kecamatan").hide(); // Sembunyikan dulu combobox kota nya
		$("#kelurahan").hide(); // Sembunyikan dulu combobox kota nya
		$("#loading2").show(); // Tampilkan loadingnya
	
		$.ajax({
			type: "POST", // Method pengiriman data bisa dengan GET atau POST
			// url: "http://localhost/edunesia/core/pendaftaran/option.php", // Isi dengan url/path file php yang dituju
			url: "http://localhost/penduduk/ajax/option.php", // Isi dengan url/path file php yang dituju
			data: {kabupaten : $("#kabupaten").val()}, // data yang akan dikirim ke file yang dituju
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				$("#loading2").hide(); // Sembunyikan loadingnya

				// set isi dari combobox kota
				// lalu munculkan kembali combobox kotanya
				$("#kecamatan").html(response.data_kecamatan).show();
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
				alert(thrownError); // Munculkan alert error
			}
		});
    });
	
	$("#kecamatan").change(function(){ // Ketika user mengganti atau memilih data provinsi
		$("#kelurahan").hide(); // Sembunyikan dulu combobox kota nya
		$("#loading3").show(); // Tampilkan loadingnya
	
		$.ajax({
			type: "POST", // Method pengiriman data bisa dengan GET atau POST
			// url: "http://localhost/edunesia/core/pendaftaran/option.php", // Isi dengan url/path file php yang dituju
			url: "http://localhost/penduduk/ajax/option.php", // Isi dengan url/path file php yang dituju
			data: {kecamatan : $("#kecamatan").val()}, // data yang akan dikirim ke file yang dituju
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				$("#loading3").hide(); // Sembunyikan loadingnya

				// set isi dari combobox kota
				// lalu munculkan kembali combobox kotanya
				$("#kelurahan").html(response.data_kelurahan).show();
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
				alert(thrownError); // Munculkan alert error
			}
		});
    });
	
	$("#id_jenis").change(function(){ // Ketika user mengganti atau memilih data provinsi
		$("#id_jenjang").hide(); // Sembunyikan dulu combobox kota nya
		$("#loading4").show(); // Tampilkan loadingnya
	
		$.ajax({
			type: "POST", // Method pengiriman data bisa dengan GET atau POST
			// url: "http://localhost/edunesia/core/pendaftaran/option.php", // Isi dengan url/path file php yang dituju
			url: "http://localhost/penduduk/ajax/option.php", // Isi dengan url/path file php yang dituju
			data: {id_jenis : $("#id_jenis").val()}, // data yang akan dikirim ke file yang dituju
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				$("#loading4").hide(); // Sembunyikan loadingnya

				// set isi dari combobox kota
				// lalu munculkan kembali combobox kotanya
				$("#id_jenjang").html(response.data_jenjang).show();
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
				alert(thrownError); // Munculkan alert error
			}
		});
    });
	
});
