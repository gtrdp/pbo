<div id="input">
<h2>Masukkan Informasimu</h2>
	<table>
		<tr><td>Nama</td>
			<td><input type="text" id="nama" name="nama" size="39" onkeyup="validate(this)"/></td>
			<td>
				<img id="namasuccess" src="<?php echo HOME;?>/img/success.png" style="display:none;" />
				<img id="namaerror" src="<?php echo HOME;?>/img/error.png" style="display:none;" />
			</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><textarea cols="37" rows="3" id="alamat" name="alamat" onkeyup="validate(this)"></textarea></td>
			<td>
				<img id="alamatsuccess" src="<?php echo HOME;?>/img/success.png" style="display:none;" />
				<img id="alamaterror" src="<?php echo HOME;?>/img/error.png" style="display:none;" />
			</td>
		</tr>
		<tr>
			<td>Tanggal lahir</td>
			<td>
				<select name="tanggal" id="tanggal" onchange="validate(this)">
                	<option value="" disabled="disabled" selected="selected">--tgl--</option><option value=1>1</option><option value=2>2</option><option value=3>3</option><option value=4>4</option><option value=5>5</option><option value=6>6</option><option value=7>7</option><option value=8>8</option><option value=9>9</option><option value=10>10</option><option value=11>11</option><option value=12>12</option><option value=13>13</option><option value=14>14</option><option value=15>15</option><option value=16>16</option><option value=17>17</option><option value=18>18</option><option value=19>19</option><option value=20>20</option><option value=21>21</option><option value=22>22</option><option value=23>23</option><option value=24>24</option><option value=25>25</option><option value=26>26</option><option value=27>27</option><option value=28>28</option><option value=29>29</option><option value=30>30</option><option value=31>31</option>
				</select> /
				<select name="bulan" id="bulan" onchange="validate(this)">
					<option value="" disabled="disabled" selected="selected">--Bulan--</option>
					<option value="JANUARI">Jan</option>
					<option value="FEBRUARI">Feb</option>
					<option value="MARET">Mar</option>
					<option value="APRIL">Apr</option>
					<option value="MEI">Mei</option>
					<option value="JUNI">Jun</option>
					<option value="JULI">Jul</option>
					<option value="AGUSTUS">Agust</option>
					<option value="SEPTEMBER">Sept</option>
					<option value="OKTOBER">Okt</option>
					<option value="NOVEMBER">Nov</option>
					<option value="DESEMBER">Des</option>
	            </select> / 
				<select name="tahun" id="tahun" onchange="validate(this)">
                	<option value="" disabled="disabled" selected="selected">--Tahun--</option><option value=1980>1980</option><option value=1981>1981</option><option value=1982>1982</option><option value=1983>1983</option><option value=1984>1984</option><option value=1985>1985</option><option value=1986>1986</option><option value=1987>1987</option><option value=1988>1988</option><option value=1989>1989</option><option value=1990>1990</option><option value=1991>1991</option><option value=1992>1992</option><option value=1993>1993</option><option value=1994>1994</option><option value=1995>1995</option>
				</select>
			</td>
			<td>
				<img id="tanggalsuccess" src="<?php echo HOME;?>/img/success.png" style="display:none;" />
				<img id="tanggalerror" src="<?php echo HOME;?>/img/error.png" style="display:none;" />
			</td>
		</tr>
		<tr>
			<td>Prodi</td>
			<td>
				<select name="prodi" id="prodi" onchange="validate(this)">
					<option value="" disabled="disabled" selected="selected">--Prodi--</option>
					<option value="TI">Teknologi Informasi</option>
					<option value="TE">Teknik Elektro</option>
				</select>
			</td>
			<td>
				<img id="prodisuccess" src="<?php echo HOME;?>/img/success.png" style="display:none;" />
				<img id="prodierror" src="<?php echo HOME;?>/img/error.png" style="display:none;" />
			</td>
		</tr>
		<tr><td colspan="3" align="right"><button id="send" title="Kirim Data">Kirim</button></td></tr>
	</table>
</div>
<script type="text/javascript" src="<?php echo HOME;?>/js/input.js"></script>