<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoMusica</title>
    <link rel="shortcut icon" href="../img/icono_logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/cabecera_menu.css">
    <link rel="stylesheet" href="../css/lista.css">
    <link rel="stylesheet" href="../css/detalles_album.css">
</head>
<body>
    <header>
        <h1>
            Bienvenido a TodoMusica! Aquí encontrarás el mejor contenido audio digital de todo el mundo.
        </h1>
        <ul>
            <li>
                <a href="index.php"><i class="fa-solid fa-house"></i> Inicio</a>
            </li>
            <li>
                <a href="albumes.php"><i class="fa-solid fa-compact-disc"></i> Álbumes</a>
            </li>
            <li>
                <a href="artistas.php"><i class="fa-solid fa-users"></i> Artistas</a>
            </li>
            <li>
                <a href="generos.php"><i class="fa-solid fa-filter"></i> Géneros</a>
            </li>
            <li>
                <a href="canciones.php"><i class="fa-solid fa-music"></i> Canciónes </a>
            </li>
            <li>
                <a href="../administracion"><i class="fa-solid fa-screwdriver-wrench"></i> Ir a sitio administrativo</a>
            </li>
        </ul>

        <section>
            <form action="" method="post">
                <input type="text" placeholder="Álbum, Artista, Canción">
                <button type="submit">Buscar</button>
            </form>
        </section>
    </header>

    <main>