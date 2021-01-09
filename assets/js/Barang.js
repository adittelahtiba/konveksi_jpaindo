$(function(){

	const flashdata = $('.flash-data').data('flash');
	if (flashdata) {
		Swal.fire({
			title: 'Data Barang',
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
					url:'Barang/delete',
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
		$('.modal-content form').attr('action', 'http://localhost/konveksi_jpaindo/Barang/add');
		$('#newMenuModalLabel').html('Tambah data Barang');
		$('.modal-footer button[type=submit] ').html('Tambah data')
		$('#KdBarang').prop('type', 'hidden');
		$('.img-img').remove();
		$('#lblKdBarang').hide();

		$('#KdBarang').val('');
		$('#KdPola').val('');
		$('.row').find('.text-danger').remove();
		$('.form-control').removeClass('is-invalid').find('.text-danger').remove();
		
		
		
	});

	$('#dataTable').on('click', '.tampilmodalubah', function(){
		$('#newMenuModalLabel').html('Ubah data Bahan baku desain');
		$('.modal-footer button[type=submit]').html('Ubah data');
		$('.modal-content form').attr('action', 'Barang/edit');
		$('.img-img').show();
		const id = $(this).data('id');
		
		$.ajax({
			url:'Barang/getubah',
			data:{id : id},
			method: 'post',
			dataType:'json',
			success: function(data){
				$('#lblKdBarang').show();
				$('#KdBarang').prop('type', 'text');
				$('#KdBarang').val(data.KdBarang);

				$('#Ukuran').val(data.Ukuran);
				$('#NamaBrg').val(data.NamaBrg);
				$('#Harga').val(data.Harga);
				$('#KdDesain').val(data.KdDesain);
			}
		});
	});

	$('#newMenuModal').on('hidden.bs.modal', function (e) {
    	$('#KdBarang').prop('type', 'hidden');
		$('#lblKdBarang').hide();
		
		$('#Ukuran').val('');
		$('#NamaBrg').val('');
		$('#Harga').val('');
		$('#KdDesain').val('');
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