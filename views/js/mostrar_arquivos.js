'use strict';

;( function ( document, )
{
	var inputs = document.querySelectorAll( '.inputfile' );
	Array.prototype.forEach.call( inputs, function( input )
	{
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e )
		{
			var fileName = '';
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				label.querySelector( 'span' ).innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});
	});
}( document, window, 0 ));

function Checkfiles(){
    var fup = document.getElementById('input_image');
    var fileName = fup.value;
    var ext = fileName.substring(fileName.lastIndexOf('.') + 1);

    if(ext =="jpeg" || ext=="png"){
        return true;
    }
    else{
        return false;
    }
}

let upload = document.getElementById("input_image");
upload.addEventListener("change", function(e){
	let size = upload.files[0].size;
	if(size > 73400320){
		Swal.fire({
			icon: "error",
			title: "Tamanho maximo não suportados",
			text: "Limite maximo do arquivo suportados e de 70MB",
		});
		upload.value = "";
	}
	e.preventDefault();
});