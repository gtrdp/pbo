//fungsi-fungsi untuk membuat RIA
//ini adalah fungsi JANTUNG dari aplikasi ini(getData), dengan obyek XHR
function getData(string, loc) {
	//membuat obyek baru, XHR
	var ajax = new XMLHttpRequest();
	
	//onreadystatechange property itu buat apa yang dilakukan tiap pergantian readyState, isinya fungsi
	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4){			//readyState == 4 -> response sudah diterima dan diolah oleh browser
			$(loc).html(ajax.responseText);	//ini fungsi dengan library jQuery, mengganti isi dari div var loc
			$("#loading").fadeOut("fast");	//menyembunyikan loading
			$(loc).fadeIn("fast");			//menampilkan elemen yang sudah diganti
		}
	};
	ajax.open("POST","http://localhost/pbo/handler.php",true);					//membuka koneksi ke url
	ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");	//mengatur request header (HTTP Header)
	ajax.send(string);															//mengirimkan data, dengan informasi: var string
}

//fungsi ini sebagai jembatan dalam melakukan metode AJAX
function changeContent(sendwhat, where, title) {
	document.title = "DaftarXML | "+title;		//mengganti title document
	$("#loading").show();						//menampilkan loading
	getData(sendwhat, where);					//memanggil fungsi untuk AJAX
}

$(document).ready(function(){
	//fungsi dengan jQuery library, untuk menu navigasi yang atraktif
	$("#nav li").hover(function(){									//jika bagian tersebut hover
		$(this).find("ul:first").css({display:"none"}).show(200);	//mengganti property CSS pada ul yang pertama
	},function(){													//callback function
		$(this).find("ul:first").hide("fast");						//menyembunyikan ul
	});
	
	//ini untuk gonta-ganti tampilan, ben keren -> pakai ajax :D
	$("#input").click(function(){
		changeContent("request=input", "#main", "Input");			//input data
	});
	$("#home").click(function(){
		changeContent("request=home", "#main", "Home");				//HOME
	});
	$("#show").click(function(){
		changeContent("request=show", "#main", "Show Data");		//menampilkan data
	});
	$("#about").click(function(){
		changeContent("request=about", "#main", "About");			//about application
	});
	$("#delete").click(function(){
		changeContent("request=delete", "#main", "Delete");			//delete data
	});
});