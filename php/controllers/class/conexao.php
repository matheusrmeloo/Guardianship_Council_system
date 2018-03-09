<?php
	class Conexao{
		public static function conn(){
			// return new mysqli("mysql.hostinger.com.br","u623059038_root","coletivoeidi123!","u623059038_eidi");
			return new mysqli("localhost","root","root","conselho_tutelar");
		}
	}
?>
