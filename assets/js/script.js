$(function(){

	const flashdata = $('.flash-data').data('flash');
	if (flashdata) {
		Swal.fire({
			title: 'Data Desain',
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
					url:'Design/delete',
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
		$('.modal-content form').attr('action', 'http://localhost/konveksi_jpaindo/Design/add');
		$('#newMenuModalLabel').html('Tambah data desain');
		$('.modal-footer button[type=submit] ').html('Tambah data')
		$('#KdDesain').prop('type', 'hidden');
		$('.img-img').hide();
		$('#lblKdDesain').hide();

		$('#KdDesain').val('');
		$('#KdPola').val('');
		$('.row').find('.text-danger').remove();
		$('.form-control').removeClass('is-invalid').find('.text-danger').remove();
		
		$('#img-form-id').prepend('<label for="GbrDesain" id="lblgambar" class="col-sm-2 col-form-label" >Gambar Design</label>');
		
	});

	$('#dataTable').on('click', '.tampilmodalubah', function(){
	// $('.tampilmodalubah').on('click', function(){
		$('#newMenuModalLabel').html('Ubah data desain');
		$('.modal-footer button[type=submit]').html('Ubah data');
		$('.modal-content form').attr('action', 'Design/edit');
		$('.img-img').show();
		const id = $(this).data('id');
		
		$.ajax({
			url:'Design/getubah',
			data:{id : id},
			method: 'post',
			dataType:'json',
			success: function(data){
				$('#lblKdDesain').show();
				$('#KdDesain').prop('type', 'text');
				$('#KdDesain').val(data.KdDesain);
				$('#gambarcu').attr('src', '././assets/img/design/'+data.GbrDesain+'');
				$('#KdPola').val(data.KdPola);
			}
		});
	});

	$('#newMenuModal').on('hidden.bs.modal', function (e) {
    	$('#KdDesain').prop('type', 'hidden');
		$('#lblKdDesain').hide();
		
		$('#KdDesain').val('');
		$('#KdPola').val('');
		$('.row').find('#lblgambar').remove();
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