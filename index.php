<?php

// ubicacion extacta en windows y linux, copia carpeta con todo su contenido

$fuente='ubicacion_extacta_file';
$destino='ubicacion_extacta_file';



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
							mkdir($destino."/".$archivo);
						}
						$this->copiar_archivos($fuente."/".$archivo, $destino."/".$archivo);
					}
					else
					{
						copy($fuente."/".$archivo, $destino."/".$archivo);
					}
				}
			}
			closedir($dir);
		}else{
			copy($fuente, $destino);
		}



