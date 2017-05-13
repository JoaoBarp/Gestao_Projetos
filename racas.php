<?php
    $link = mysqli_connect('localhost', 'root', '', 'adocao') or die('Não foi possível conectar');

    $sql = "select id, nome from racas where tipoanimal = " . $_POST[ 'tipoAnimal' ];
    $resp = mysqli_query( $link, $sql );
    $data = [];

    if( $resp ) while( $row = mysqli_fetch_assoc( $resp ) ) $data[] = $row;

    echo json_encode( $data ); exit;
