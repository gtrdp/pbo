<?php
//////////////////////////////////////////////////////////
// File yang isinya class-class untuk me-handle request //
// terus dari sini di-'include' di file handler.php		//
// &copy; 2010											//
//////////////////////////////////////////////////////////

//class request handler ini untuk mengendalikan request dari user
class requestHandler {
	var $request;				//isinya untuk meyimpan request dari user
	function __construct($req){
		$this->request = $req;
	}
	
	//fungsi ini untuk menampilkan tampilan untuk input
	private function getInput(){
		include("input.php");
	}
	
	//request dari user disaring di sini, user maunya ngapain
	public function action() {
		switch($this->request) {
			case "input":
				$this->getInput();
			break;
			case "home":
				echo	"<h1>Welcome!</h1>".
						"<p>Silakan Pilih Menu pada panel navigasi di atas.</p>";
			break;
			case "about":
				echo	"<h1>About</h1>".
						"<p>Aplikasi ini dibuat untuk mata kuliah PBO.<br />".
						"Aplikasi ini dibuat dengan PHP pada server dan sedikit JavaScript di client.<br />".
						"Jika anda menemukan 'bug' pada aplikasi ini silakan hubungi yang (m)buat aplikasi ini.<br />".
						"<br /><br />Sekian dan Terimakasih.</p>";
			break;
			case "add":
				return "add";	//dari sini, nanti diurus sama handler.php
			break;
			case "show":
				return "show";	//dari sini, nanti diurus sama handler.php
			break;
			case "delete":
				return "del";	//dari sini, nanti diurus sama handler.php
			break;
			default:
				echo	"<p>Just Take It Easy</p>";
			break;
			}
	}
}

//class ini untuk menyimpan data dari dan ke user
class repo {
	var $data;		//berisi data dari user
	var $files;		//berisi pointer ke file
	var $xml;		//berisi data XML
	
	function __construct($data) {
		$this->data = explode("/",$data);	//memecah data dari user yang masih dalam bentuk string, ke array
		$this->getFile();					//membuka, atau membuat file baru
	}
	
	////////////////////////////PRIVATE////////////////////////////////////////
	//untuk membuka atau membuat file baru
	private function getFile(){
		if (!file_exists("data.xml")) {															//cek apakah file sudah ada
			$this->files = fopen("data.xml","w+") or exit("<h1>Error when making files.</h1>");	//membuka file
			$str =	"<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n".
					"<db>\n</db>";
			fwrite($this->files,$str);				//menulis ke file
		} else {
			$this->files = fopen("data.xml","r+");	//membuka file
		}
	}
	//untuk menyimpan data ke dalam sebuah file XML
	private function storeFile($nama,$alamat,$ttl,$prodi){
		//set the location, where to write
		while (!feof($this->files)) fgetc($this->files);	//menghitung panjang file
		$loc = ftell($this->files)-5;						//menyimpan panjang file
		//panjang file dibatasi hanya 1500 karakter, jika sudah lebih, tidak bisa ditulis lagi, program keluar
		if ($loc >= 1500) exit("<h1>Kepenuhan</h1><p>Data sudah terlalu banyak, silakan hapus data terlebih dulu.</p>");
		fseek($this->files,$loc);							//mengatur file pointer ke lokasi yang diinginkan
		
		//prepare the data to be written
		$datawrite =
		"\t<sdb>\n".
		"\t\t<Nama>".$nama."</Nama>\n".
		"\t\t<Alamat><![CDATA[".$alamat."]]></Alamat>\n".
		"\t\t<TanggalLahir>".$ttl."</TanggalLahir>\n".
		"\t\t<Prodi>".$prodi."</Prodi>\n".
		"\t</sdb>\n".
		"</db>";
		fwrite($this->files,$datawrite);		//menulis ke file
		fclose($this->files);					//menutup file
		
		//menampilkan pesan berhasil
		echo	"<h2>Berhasil.</h2>".
				"<p>Informasimu sudah berhasil disimpan.</p>".
				"<p>Silakan pilih tombol navigasi di atas untuk berganti ke bagian lain.</p>";
	}
	//fungsi untuk menhitung jumlah record yang ada
	private function countData(){
		$i=0;
		foreach($this->xml as $count) $i++;
		return $i;
	}
	
	/////////////////////////////PUBLIC////////////////////////////////////////
	//ini dulu cuman buat ngetest, eman2 nek dihapus :P
	public function getData () {
		$i = 1;
		if ($this->data[0] == ""): echo "ra ono isine";
		else:
		foreach($this->data as $value){
			echo "data ke-".$i." = ".$value."<br />";
			$i++;
		}
		endif;
	}
	//fungsi untuk menampilkan data dari XML ke dalam bentuk HTML
	public function showData() {
		$this->xml = simplexml_load_file("data.xml");				//membuka sebuahfile XML ke dalam sebuah objek
		$count = $this->countData();								//menghitung jumlah record pada data
		//jika tidak ada record dalam data, maka program keluar
		if ($count == 0) exit("<h2>Tidak ada data yang tersimpan</h2><p>Silakan pilih tombol navigasi di atas.</p>");
		
		//menampilkan header
		echo "<h2>Data yang Tersimpan(".$count.")</h2><div id='slideshow'><ul>\n";
		//melakukan iterasi untuk menampilkan tiap record
		foreach($this->xml->children() as $first){
			echo "<li><table>";
			//melakukan iterasi untuk menampilkan tiap nilai
			foreach($first->children() as $second){
				$name = "<td><strong>".$second->getName()."</strong>&emsp;</td>";
				$value = "<td>".$second."</td>";
				echo "<tr>".$name.$value."</tr>";
			}
			echo "</table></li>";
		}
		echo "</ul></div>\n";
		include("slide.php");		//memasukkan sebuah file, yang isinya JavaScript
	}
	//fungsi/method untuk menyimpan data ke dalam sebuah file XML
	public function storeData() {
		$this->storeFile($this->data[0],$this->data[1],$this->data[2],$this->data[3]);
	}
	//fungsi untuk menghapus file
	public function delData() {
		unlink("data.xml");
		echo "<h2>Data deleted.</h2>";
		fclose($this->files);
	}
}
?>