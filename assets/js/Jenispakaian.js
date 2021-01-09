$(function(){

	const flashdata = $('.flash-data').data('flash');
	if (flashdata) {
		Swal.fire({
			title: 'Data Jenis Pakaian',
			text:  flashdata,
			type: 'success',
			timer: 1500,
		});
	}

	

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
					url:'Jenispakaian/delete',
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

	$('.tampilmodaltambahjenis').on('click', function(){
		$('.modal-content form').attr('action', 'http://localhost/konveksi_jpaindo/Jenispakaian/add');
		$('#modaljenisLabel').html('Tambah data Jenis Pakaian');
		$('.modal-footer button[type=submit] ').html('Tambah data')
		$('#KodeJenis').prop('type', 'hidden');
		$('.img-img').hide();
		$('#lblKodeJenis').hide();

		$('#KodeJenis').val('');
		$('#KdPola').val('');
		$('.row').find('.text-danger').remove();
		$('.form-control').removeClass('is-invalid').find('.text-danger').remove();
		
		$('#img-form-id').prepend('<label for="GbrDesain" id="lblgambar" class="col-sm-2 col-form-label" >Gambar Jenis Pakaian</label>');
		
	});

	$('#dataTable').on('click', '.tampilmodalubahjenis', function(){
	// $('.tampilmodalubahjenis').on('click', function(){
		$('#modaljenisLabel').html('Ubah data desain');
		$('.modal-footer button[type=submit]').html('Ubah data');
		$('.modal-content form').attr('action', 'Jenispakaian/edit');
		$('.img-img').show();

		const id = $(this).data('id');
		
		$.ajax({
			url:'Jenispakaian/getubah',
			data:{id : id},
			method: 'post',
			dataType:'json',
			success: function(data){
				$('#lblKodeJenis').show();
				$('#KodeJenis').prop('type', 'text');
				$('#KodeJenis').val(data.KodeJenis);
				$('#gambarcu').attr('src', '././assets/img/jenis/'+data.GambarJenis+'');
				$('#NamaJenis').val(data.NamaJenis);
			}
		});
	});

	$('#modaljenis').on('hidden.bs.modal', function (e) {
    	$('#KodeJenis').prop('type', 'hidden');
		$('#lblKodeJenis').hide();
		$('.row').find('#lblgambar').remove();
		$('#KodeJenis').val('');
		$('#KdPola').val('');
		$('.row').find('.text-danger').remove();
		$('.form-control').removeClass('is-invalid').find('.text-danger').remove();
		$('.form-control').removeClass('is-valid').find('.text-danger').remove();
	});

	$('#frmid').on('submit', function(event){
		event.preventDefault();
		var me = $(this);

		$.ajax({
			url: me.attr('action'),
			type: 'post',
			data:new FormData(this),
			processData:false,
			contentType:false,
			cache:false,
			async:false,
                     
			dataType:'json',
			success: function(response){
				if (response.success == true) {
					window.location.href =  response.redirect;
				}else{
					$.each(response.messages, function(key, value){
						var element = $('#' + key);
						$(element).closest('.form-control')
						.removeClass('is-invalid')
						.addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
						.find('.text-danger')
						.remove();

						$(element).closest('.row').find('.text-danger').remove();
						$(element).after(value);
					});
				}
			},
			error : function(response){
				
			}
		});
	});

});