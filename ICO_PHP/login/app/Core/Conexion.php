<?php
declare(strict_types=1);
namespace App\Core;

USE PDO;

final class Conexion{
	private ?PDO $pdo = null;
	
	public function __construct(private array $configuracion){
	
	}
	public function obtener():PDO{
		if($this->pdo === null){
			$c = $this->configuracion;
			$dsn = sprintf('mysql:host=%s;port=%d;dbname=%s;charset=utf8mb4',$c['host'],$c['port'],$c['dbname']);
			$this->pdo = new PDO($dsn,$c['username'],$c['password'],[
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES => false
			]);
		$this->pdo->exec("SET time_zone = '-06:00'");
		}
		return $this->pdo;
	}
}
