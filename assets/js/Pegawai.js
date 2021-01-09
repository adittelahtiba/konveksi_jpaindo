$(function(){

	// const flashdata = $('.flash-data').data('flash');
	// if (flashdata) {
	// 	Swal.fire({
	// 		title: 'Data Jenis Pakaian',
	// 		text:  flashdata,
	// 		type: 'success',
	// 		timer: 1500,
	// 	});
	// }

	
	$('#dataTable').on('click', '.btnhapusjenis', function(){
	
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda tidak akan dapat mengembalikan data ini!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Hapus!',
			cancelButtonText : 'Batal'

		}).then((result) => {
			if (result.value) {
				const id = $(this).data('id');
				$.ajax({
					url:'delete',
					data:{id : id},
					method: 'post',
					dataType:'json',
					success: function(data){
						Swal.fire({
							title: 'Terhapus!',
							text: 'Data sudah terhapus.',
							type: 'success',
							timer: 1500,
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'OK!'
						}).then((result) => {
							window.location.href =  data.redirect;
						});
					}
					// error: function(data){
					// 	Swal.fire({
					// 		title: 'Error!',
					// 		text: 'Terjadi Kesalahan Saat Mengambil Data.',
					// 		type: 'warning',
					// 		timer: 1500,
					// 		confirmButtonColor: '#3085d6',
					// 		confirmButtonText: 'OK!'
					// 	}).then((result) => {
					// 		window.location.href =  data.redirect;
					// 	});	
					// }
				});
			}
		})
	});

	$('#dataTable').on('click', '.tampilmodalubahjenis', function(){
	// $('.tampilmodalubahjenis').on('click', function(){
		$('#modaljenisLabel').html('Detail Data Pegawai');
		$('.img-img').show();

		const id = $(this).data('id');
		
		$.ajax({
			url:'getdata',
			data:{id : id},
			method: 'post',
			dataType:'json',
			success: function(data){
				
				$('#IdPeg').val(data.IdPeg);
				$('#Nama').val(data.Nama);
				$('#Jabatan').val(data.Jabatan);
				$('#NoTelp').val(data.NoTelp);
				$('#Email').val(data.Email);
				$('#Aktif').val(data.Aktif);
				$('#Foto').attr('src', 'http://localhost/konveksi_jpaindo/assets/img/profile/'+data.Foto);
				// $('#Foto').val(data.Foto);
				$('#WaktuDaftar').val(data.WaktuDaftar);
				if (data.Level == 1) {
					$('#Level').val('Admin');
				}else{
					$('#Level').val('User');
				}
				
				
				
				
				// $('#NamaJenis').val(data.NamaJenis);
			},
			error: function(data){
				alert('lol');
			}
		});
	});

	// $('#modaljenis').on('hidden.bs.modal', function (e) {
    	
	// 	$('#KodeJenis').val('');
	// 	$('#KdPola').val('');
	// });

	// $('#frmid').on('submit', function(event){
	// 	event.preventDefault();
	// 	var me = $(this);

	// 	$.ajax({
	// 		url: me.attr('action'),
	// 		type: 'post',
	// 		data:new FormData(this),
	// 		processData:false,
	// 		contentType:false,
	// 		cache:false,
	// 		async:false,
                     
	// 		dataType:'json',
	// 		success: function(response){
	// 			if (response.success == true) {
	// 				window.location.href =  response.redirect;
	// 			}else{
	// 				$.each(response.messages, function(key, value){
	// 					var element = $('#' + key);
	// 					$(element).closest('.form-control')
	// 					.removeClass('is-invalid')
	// 					.addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
	// 					.find('.text-danger')
	// 					.remove();

	// 					$(element).closest('.row').find('.text-danger').remove();
	// 					$(element).after(value);
	// 				});
	// 			}
	// 		},
	// 		error : function(response){
				
	// 		}
	// 	});
	// });

});