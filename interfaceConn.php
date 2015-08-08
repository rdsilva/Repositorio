<?php

interface CONN{
	public function conectar();
	public function criarSocket();
	public function comandar($cmd);
	public function fecharSocket();
	public function setIP($ip);
	public function setPort($port);
}
