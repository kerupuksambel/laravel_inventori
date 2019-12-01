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
})

function addBarang(id){
	id = parseInt(id) + 1;
	var x = "<div class='column is-4 file-container'><div class='file has-name' data-file-id='"+id+"'><label class='file-label'><input class='file-input' type='file' name='file-"+id+"'><span class='file-cta'><span class='file-label'>Pilih file</span></span><span class='file-name' data-file-name='"+id+"'>Belum ada file terpilih</span></label></div></div>";
	$(x).insertAfter($('.file-container').last());
	console.log(id);
	$('#btn-tambah-gbr').attr('onclick', 'addBarang('+id+')');
}