<?php

// ubicacion extacta en windows y linux, copia carpeta con todo su contenido
/*
$fuente='ubicacion_extacta_file';
$destino='ubicacion_extacta_file';*/
$fuentes='C:\xampp\htdocs\ejecutar_comandos_cpanel\cpanel';
$destinos='C:\Users\AlexanderRoca\Desktop\Nueva carpeta';

//$this->copiar_archivos($fuentes, $destinos);
$respuesta = copiar_archivos($fuentes, $destinos);

if($respuesta == 0){
	echo "no se pudo copiar <br>";
}else{
	echo "se pudo copiar <br>";
}

//public function copiar_archivos($fuente, $destino)
function copiar_archivos($fuente, $destino)
{
		$sensor=1;
		
		if(is_dir($fuente)){
			$dir=opendir($fuente);
			while($archivo=readdir($dir))
			{
				if($archivo!="." && $archivo!="..")
				{
					if(is_dir($fuente."/".$archivo))
					{
						if(!is_dir($destino."/".$archivo))
						{
							if(!@mkdir($destino."/".$archivo)){//;
								//echo "no se pudo crear la carpeta <br>";
								$sensor=0;
							}else{
								//echo "se pudo crear la carpeta <br>";
								$sensor=1;
							}
						}
						//$this->copiar_archivos($fuente."/".$archivo, $destino."/".$archivo);
						copiar_archivos($fuente."/".$archivo, $destino."/".$archivo);
					}
					else
					{
						if(!@copy($fuente."/".$archivo, $destino."/".$archivo)){//;
							//echo "1 no se pudo copiar <br>";
							$sensor=0;
						}else{
							//echo "1 se pudo copiar <br>";
							$sensor=1;
						}
					}
				}
			}
			closedir($dir);
		}else{
			if(!@copy($fuente, $destino)){//;
				//echo "2 no se pudo copiar <br>";
				$sensor=0;
			}else{
				//echo "2 se pudo copiar <br>";
				$sensor=1;
			}
		}
		
		return $sensor;
}





