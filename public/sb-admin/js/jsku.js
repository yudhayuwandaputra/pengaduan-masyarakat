function deleteUser(nik) {
	const url = $('.btn-delete').data('url');
	const refresh = $('.btn-delete').data('refresh');
  
	swal({
			title: "Kamu Yakin?",
			text: "Jika iya silahkan tekan tombol ok",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type: "POST",
					url: base_url + url,
					data: {
						nik: nik
					},
					success: function () {
						window.location = base_url + refresh
					}
				});
			} else {
				swal("Oke! lain kali pikirkan lebih dalam", {
					icon: "info",
				});
			}
		});
}

function deleteLaporan(id_pengaduan) {
	const url = $('.btn-delete').data('url');
	const refresh = $('.btn-delete').data('refresh');
  
	swal({
			title: "Kamu Yakin?",
			text: "Jika iya silahkan tekan tombol ok",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type: "POST",
					url: base_url + url,
					data: {
						id_pengaduan : id_pengaduan
					},
					success: function () {
						window.location = base_url + refresh
					}
				});
			} else {
				swal("Oke! lain kali pikirkan lebih dalam", {
					icon: "info",
				});
			}
		});
}



$(document).ready(function () {

	$('.btn-edit').click(function () {
		
		var url = $('.btn-edit').data('url');

		$('.mdl-edit').modal('show');
		$.ajax({
			url: base_url + url,
			data: {
				id: id
			},
			method: "GET",
			dataType: "json",
			success: function (data) {
				console.log(data);
				if (data == data.id_pengaduan) {
					console.log("BERHASIL");
				} else {
					console.log("Ganti");
				}
				// 	$('#id-lelang').val(data.id_lelang);
				// 	$('#status').val(data.status);
			}
		});
	})

});

const flashData = $('.flash-data').data('flashdata');

if (flashData) {
	swal("Selamat data telah " + flashData + "!", {
		icon: "success",
		
	});


}

