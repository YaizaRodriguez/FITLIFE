<main class="contenedor seccion">
        <h2 data-cy="heading-nosotros">Mas Sobre Nosotros</h2>

        <div class="iconos-nosotros" data-cy="iconos-nosotros">
            <div class="icono">
                <img src="build/img/weightlifting.svg" alt="Pesas" loading="lazy">
                <h3>Especialistas</h3>
                <p>Inventore error pariatur tempora mollitia quis laboriosam nam tenetur quam! Vero, veritatis quaerat! Id voluptate autem sapiente labore est laboriosam vitae dicta!</p>
            </div>
            <div class="icono">
                <img src="build/img/lotus.svg" alt="Lotus" loading="lazy">
                <h3>Salud</h3>
                <p>Inventore error pariatur tempora mollitia quis laboriosam nam tenetur quam! Vero, veritatis quaerat! Id voluptate autem sapiente labore est laboriosam vitae dicta!</p>
            </div>
            <div class="icono">
                 <img src="build/img/diana.svg" alt="Target" loading="lazy">
                <h3>Objetivos</h3>
                <p>Inventore error pariatur tempora mollitia quis laboriosam nam tenetur quam! Vero, veritatis quaerat! Id voluptate autem sapiente labore est laboriosam vitae dicta!</p>
            </div>
        </div>
    </main>


    <section class="seccion contenedor">
        <h2>Encuentra tu rutina</h2>
    <?php 
        include 'listado.php';   
    ?>
        <div class="alinear-derecha">
            <a href="/rutinas" class="boton-verde" data-cy="ver-rutinas">Ver Todas</a>
        </div>
    </section>


    <section data-cy="imagen-contacto" class="imagen-contacto-i">
    <div class="div-contacto">
        <h2>Dejanos ayudarte a conseguir tus objetivos</h2>
        
        <a href="/contacto" class="boton-amarillo boton-amarillo-centrado">Contáctanos</a>
        </div>
    </section>


    <div class="contenedor seccion seccion-inferior">
        <section data-cy="nutricion" class="blog">
            <h3>Recetas</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <!-- <source srcset="build/img/receta1.webp" type="image/webp"> -->
                        <source srcset="build/img/receta1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/receta.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Porridge o gachas de avena</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span> </p>

                        <p>
                            Se trata de un desayuno completo, sano y nutritivo. Además es muy fácil de preparar, y como se puede completar con fruta, especias, miel o frutos secos, no resulta aburrido aunque lo hagamos a diario.
                        </p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <!--<source srcset="build/img/receta2.webp" type="image/webp"> -->
                        <source srcset="build/img/receta2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/receta2.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>ARROZ CON POLLO Y VERDURAS</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span> </p>

                        <p>
                            El arroz con pollo y verduras, es una de las formas más populares de preparar este cereal. Y también más saludable. Cuenta con todas las proteínas del pollo (y su falta de grasa) y las vitaminas del arroz y de la verdura.
                        </p>
                    </a>
                </div>
            </article>
        </section>

        <section data-cy="testimoniales" class="testimoniales">
            <h3>Comparte tu experiencia</h3>

            <div class="testimonial">
                <blockquote>
                    Conseguí perder de peso de una forma segura y saludable! Además he aprendido mantener un buen estilo de vida
                </blockquote>
                <p>- @yaizarodriguez</p>
            </div>
        </section>
    </div>

