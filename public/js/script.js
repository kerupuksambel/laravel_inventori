$(document).ready(function() {
  // Check for click events on the navbar burger icon
  $(".navbar-burger").click(function() {
      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      $(".navbar-burger").toggleClass("is-active");
      $(".navbar-menu").toggleClass("is-active");
  });
});

$('#file-container').on('change', '.file', function(e){
	var id = $(this).attr('data-file-id');
	if(e.target.files.length > 0){
		var fileName = e.target.files[0].name;
		$('[data-file-name|='+id+']').text(fileName); 
	}
});

function addBarang(id){
	id = parseInt(id) + 1;
	var x = "<div class='column is-4 file-container'><div class='file has-name' data-file-id='"+id+"'><label class='file-label'><input class='file-input' type='file' name='file-"+id+"'><span class='file-cta'><span class='file-label'>Pilih file</span></span><span class='file-name' data-file-name='"+id+"'>Belum ada file terpilih</span></label></div></div>";
	$(x).insertAfter($('.file-container').last());
	// console.log(id);
	$('#btn-tambah-gbr').attr('onclick', 'addBarang('+id+')');
}

//For AJAX Request
function formatRupiah(angka, prefix){
	angka = angka.toString();
	var number_string = angka.replace(/[^,\d]/g, '').toString(),
	split   		= number_string.split(','),
	sisa     		= split[0].length % 3,
	rupiah     		= split[0].substr(0, sisa),
	ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

	// tambahkan titik jika yang di input sudah menjadi angka ribuan
	if(ribuan){
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}

	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

$(window).on('load', function () {
	$('.kasir-nama').select2({
	    placeholder: 'Cari...',
	    ajax: {
	      url: '/kasir/ajax_search',
	      dataType: 'json',
	      type: 'GET',
	      delay: 250,
	      processResults: function (data) {
	        return {
	          results:  $.map(data, function (item) {
	            return {
	              text: item.barang_nama,
	              id: item.barang_id
	            }
	          })
	        };
	      },
	      cache: true
	    }
	  });
})

$('#table-kasir').on('change', '.kasir-nama', function(e){
	var val = $(this).val();
	var id = $(this).attr('data-kasir-id');
	$.ajax({
		url: '/kasir/ajax',
		data: {id: val},
		success: function(raw_data, status){
			var data = JSON.parse(raw_data);
			$(".kasir-harga[data-kasir-id="+id+"]").text(formatRupiah(data['harga'], 'Rp.'));
			$("[name=harga-"+id+"]").data('harga', data['harga']);

			if(data['gambar'].length > 0){
				$(".kasir-img[data-kasir-id="+id+"]").html("<img style='width: 200px' src='"+data['gambar'][0]+"'>");
			}else{
				$(".kasir-img[data-kasir-id="+id+"]").html('-');
			}
			$(".kasir-jumlah").attr('onchange', 'hitungHarga('+data['harga']+')');
		},
		error: function (e) {
			console.log('error');
		}
	});
});

function addTrx(id){
	id = parseInt(id) + 1;
	var x = '<tr class="transaksi"><td><select class="kasir-nama control borderless" data-kasir-id="'+id+'" style="width:300px;" name="nama-'+id+'"></select></td><td><div class="kasir-img" data-kasir-id="'+id+'"></div></td><td><div class="kasir-harga" data-kasir-id="'+id+'"></div></td><td><input type="number" class="control borderless kasir-jumlah" name="jumlah-'+id+'"></div></td></tr>';
	$(x).insertAfter($('tr.transaksi').last());
	$("#add-trx").attr('onclick', 'addTrx('+id+')');
	$('.kasir-nama').select2({
	    placeholder: 'Cari...',
	    ajax: {
	      url: '/kasir/ajax_search',
	      dataType: 'json',
	      type: 'GET',
	      delay: 250,
	      processResults: function (data) {
	        return {
	          results:  $.map(data, function (item) {
	            return {
	              text: item.barang_nama,
	              id: item.barang_id
	            }
	          })
	        };
	      },
	      cache: true
	    }
	  });

}

// $(document.body).off('change', '.kasir-jumlah');

// function hitungHarga(num, id){
// 	;
// }

// $('#table-kasir').on('keyup', '.kasir-jumlah', function(e){
// 	var id = $(this).attr('data-kasir-id');
// 	var val = $(this).val();
// 	var hargaSatuan = $("input[name=harga-"+id+"]").val();
// 	alert(id);
// })