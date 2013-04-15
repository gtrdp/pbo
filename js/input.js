//script untuk mengirimkan data dengan AJAX
$("#send").click(function(){
		var nama = document.getElementById("nama").value;
		var alamat = document.getElementById("alamat").value;
		var tanggal = document.getElementById("tanggal").options[document.getElementById("tanggal").selectedIndex].value;
		var bulan = document.getElementById("bulan").options[document.getElementById("bulan").selectedIndex].value;
		var tahun = document.getElementById("tahun").options[document.getElementById("tahun").selectedIndex].value;
		var prodi = document.getElementById("prodi").options[document.getElementById("prodi").selectedIndex].value;
		var ttl = tanggal+" "+bulan+" "+tahun;
		
		var str = "request=add&value="+nama+"/"+alamat+"/"+ttl+"/"+prodi; //merakit data ke dalam sebuah string
		
		changeContent(str, "#main", "Success");	//mengirimkan request ke server berisikan string data tadi
});

//script untuk validasi ethok2an
function validate(elm){
	if (elm.id == "nama"){
		if (elm.value.length > 3){
			document.getElementById(elm.id+"success").style.display = "block";
			document.getElementById(elm.id+"error").style.display = "none";
			return true;
		} else {
			document.getElementById(elm.id+"error").style.display = "block";
			document.getElementById(elm.id+"success").style.display = "none";
		}
	}else if(elm.id == "alamat"){
		if (elm.value.length > 7) {
			document.getElementById(elm.id+"success").style.display = "block";
			document.getElementById(elm.id+"error").style.display = "none";
			return true;
		} else {
			document.getElementById(elm.id+"error").style.display = "block";
			document.getElementById(elm.id+"success").style.display = "none";
			return false;
		}
	}else if(elm.id == "tanggal" || elm.id == "bulan" || elm.id == "tahun"){
		var tanggal = document.getElementById("tanggal").selectedIndex;
		var bulan = document.getElementById("bulan").selectedIndex;
		var tahun = document.getElementById("tahun").selectedIndex;
		
		if (tanggal != 0 && bulan != 0 && tahun !=0) {
			document.getElementById("tanggalsuccess").style.display = "block";
			document.getElementById("tanggalerror").style.display = "none";
			return true;
		} else {
			document.getElementById("tanggalerror").style.display = "block";
			document.getElementById("tanggalsuccess").style.display = "none";
			return false;
		}
	}else if(elm.id == "prodi"){
		var prodi = document.getElementById("prodi").selectedIndex;
		
		if (prodi != 0) {
			document.getElementById(elm.id+"success").style.display = "block";
			document.getElementById(elm.id+"error").style.display = "none";
			return false;
		} else {
			document.getElementById(elm.id+"error").style.display = "block";
			document.getElementById(elm.id+"success").style.display = "none";
			return false;
		}
	}
}