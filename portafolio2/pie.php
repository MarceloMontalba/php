<footer>
    <section>
        <div>
            <span>Ayuda</span>
            <?php for($i=1; $i<11; $i++){ ?>
                <a href="">Opción <?php echo $i; ?> </a>
            <?php } ?>
        </div>
        <div>
            <span>Acerca de</span>
            <?php for($i=1; $i<5; $i++){ ?>
                <a href="">Opción <?php echo $i; ?> </a>
            <?php } ?>
        </div>
    </section>
    
    <section>
        <div>
            <label for="txtCorreo">Subscribete a nuestra Pagina</label>
            <input type="text" name="txtCorreo" id="txtCorreo" placeholder="CORREO ELECTRÓNICO">
            <button type="submit">Enviar</button>
        </div>
    </section>
</footer>

</body>
</html>