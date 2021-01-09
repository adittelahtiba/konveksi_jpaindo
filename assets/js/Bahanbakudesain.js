$(function(){

	const flashdata = $('.flash-data').data('flash');
	if (flashdata) {
		Swal.fire({
			title: 'Data Bahan Baku Desain',
			text:  flashdata,
			type: 'success',
			timer: 1500,
		});
	}

	$('#dataTable').on('click', '.btnhapus', function(){
		
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda tidak akan dapat mengembalikan data ini!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelButtonText : 'Batal',
			confirmButtonText: 'Ya, Hapus!'
		}).then((result) => {
			if (result.value) {
				const id = $(this).data('id');
				$.ajax({
					url:'Bahanbakudesain/delete',
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
				});
			}
		})
	});

	$('.tampilmodaltambah').on('click', function(){
		$('.modal-content form').attr('action', 'http://localhost/konveksi_jpaindo/Bahanbakudesain/add');
		$('#newMenuModalLabel').html('Tambah data desain');
		$('.modal-footer button[type=submit] ').html('Tambah data')
		$('#KodeBBakuDesain').prop('type', 'hidden');
		$('.img-img').remove();
		$('#lblKodeBBakuDesain').hide();

		$('#KodeBBakuDesain').val('');
		$('#KdPola').val('');
		$('.row').find('.text-danger').remove();
		$('.form-control').removeClass('is-invalid').find('.text-danger').remove();
		
		
		
	});

	$('#dataTable').on('click', '.tampilmodalubah', function(){
		$('#newMenuModalLabel').html('Ubah data Bahan baku desain');
		$('.modal-footer button[type=submit]').html('Ubah data');
		$('.modal-content form').attr('action', 'Bahanbakudesain/edit');
		$('.img-img').show();
		const id = $(this).data('id');
		
		$.ajax({
			url:'Bahanbakudesain/getubah',
			data:{id : id},
			method: 'post',
			dataType:'json',
			success: function(data){
				$('#lblKodeBBakuDesain').show();
				$('#KodeBBakuDesain').prop('type', 'text');
				$('#UkuranBBDM2').val(data.UkuranBBDM2);
				$('#KdDesain').val(data.KdDesain);
				$('#KdBBaku').val(data.KdBBaku);
				$('#KodeBBakuDesain').val(data.KodeBBakuDesain);
			}
		});
	});

	$('#newMenuModal').on('hidden.bs.modal', function (e) {
    	$('#KodeBBakuDesain').prop('type', 'hidden');
		$('#lblKodeBBakuDesain').hide();
		
		$('#KodeBBakuDesain').val('');
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