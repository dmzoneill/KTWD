<?php

// @author David O Neill < dave@feeditout.com >
//

$path = "E:/KTWD";
$inputFolder = $path . "/input";
$outputFolder = $path . "/output";

shell_exec( "del $outputFolder/*.png" ); 

if( $handle = opendir( $inputFolder ) ) 
{

    	while ( false !== ( $file = readdir( $handle ) ) ) 
	{
		if( !is_dir( "$inputFolder/$file" ) )
		{
			
			$name = explode( "." , $file );
			$ext =  strtolower( $name[ 1 ] );
			
			if( $ext != "png" && $ext != "jpg" && $ext != "jpeg" )
			{
				continue;
			}

			$badge = imagecreatefrompng( $path . "/badge.png" ); 

			if( $ext == "png" )
			{
				$kid = imagecreatefrompng( "$inputFolder/$file" ); 
			}
			else if( $ext == "jpg" || $ext == "jpeg" )
			{
				$kid = imagecreatefromjpeg( "$inputFolder/$file" ); 
			}		
			

			list( $width , $height ) = getimagesize( "$inputFolder/$file" ); 

			$image_p = imagecreatetruecolor( 285 , 228 );
			imagecopyresampled( $image_p , $kid , 0 , 0 , 0 , 0 , 285 , 228 , $width , $height );
			imagecopymerge( $badge , $image_p , 89 , 265 , 0 , 0 , 285 , 228 , 100 );
									
			$start_x = 50; 
			$start_y = 560; 

			$black = ImageColorAllocate( $badge , 8 , 96 , 168 ); 
			
			Imagettftext( $badge , 20 , 0 , $start_x , $start_y , $black , $path . "/NeoSansIntel.ttf" , strtoupper( $name[0] ) ); 			
			imagepng( $badge , $outputFolder . "/" . $name[0] . "." . $ext );
			
			echo "Created $file\n";
			
			
		}
    	}
    	closedir($handle);
}
?> 
