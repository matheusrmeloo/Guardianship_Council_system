<?php

class RB{

	private static $table="";
	private static $campos="";
	private static $values="";


	public static function checkTable($table,$campos){
		self::$table=$table;
		self::$campos=$campos;
	}

	public static function add($value){
		if(self::$values!=""){
			self::$values = self::$values.",".$value;
		}else{
			self::$values = $value;
		}
	}


	public static function update($conexao_banco,$id){

		self::$campos=explode(",",self::$campos);
		self::$values=explode(",",self::$values);

		$i=0;
		$sqlFinal="";
		foreach (self::$campos as $value) {

			$virgula = ($i==(count(self::$campos)-1)) ? "" : ",";

			$sqlFinal=$sqlFinal.$value."=".self::$values[$i].$virgula;
			$i++;
		}

		$conexao_banco->query ("UPDATE ".self::$table." SET ".$sqlFinal." WHERE ".$id);
	}

	public static function delete($conexao_banco,$tabela,$id,$array,$array2){
		$fim="s";
		foreach ($array as $key => $value) {
		$fim="s";
			foreach ($array2 as $key2 => $value2) {
				if($value[2]==$value2){
					$fim="n";
				}
			}
			if($fim=="s"){
				echo "apaga ".$value[2];
				$conexao_banco->query ("DELETE FROM ".$tabela." WHERE ".$id."=".$value[0]);
			}
		}

	}

	public static function save($conexao_banco,$id=null){

		if($id==null){
			$conexao_banco->query ("
			INSERT INTO ".self::$table."(".self::$campos.") 
			VALUES (".self::$values.")");
		}else{
			self::update($conexao_banco,$id);
		}

		self::$table="";
		self::$campos="";
		self::$values="";
	}


}