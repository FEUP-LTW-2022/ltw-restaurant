<?php

$photo_id=!empty( $_GET['photo_id'] ) ? filter_input( INPUT_GET, 'client_id', FILTER_SANITIZE_STRING ) : false;

if( $photo_id ){

    $stmt= getDatabaseConnection()->prepare('select mime,data from photo where id = :id');
    if( $stmt ){

        $stmt->bindParam(':id', $photo_id );
        $result=$stmt->execute();

        if( $result ){
            $data = $result["data"];
            $mime = $result["mime"];

            $data=base64_decode( $data );
            #$mime=image_type_to_mime_type( $mime );
            $oImg = imagecreatefromstring( $data );

            switch( $mime ){
                case IMAGETYPE_JPEG:
                    header( 'Content-Type: image/jpeg' );
                    imagejpeg( $oImg );
                    break;
                case IMAGETYPE_PNG:
                    header( 'Content-Type: image/png' );
                    imagepng( $oImg );
                    break;
                case IMAGETYPE_GIF:
                    header( 'Content-Type: image/gif' );
                    imagegif( $oImg );
                    break;
            }
            imagedestroy( $oImg );
        }
    }
}