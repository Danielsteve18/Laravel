<template >
  <div class="nav-principal">
    <a class="contener-icon" href="#home">
            <img src="../00-resource/gato-negro-fondo-blanco.png" alt="">
    </a>

    <nav class="nav-container">
            <div class="background-link">
                <div class="contener-link">
                    <ul>
                        <li><a href="#ip-gatunas">IP Gatunas</a></li>
                        <li><a href="#siesta-felina">Siesta Felina</a></li>
                        <li><a href="#codigo-felino">Código Felino </a></li>
                    </ul>
                </div>
            </div>
    </nav>

  </div>

</template>

<script>


</script>

<style scoped>

.nav-principal {
    z-index: 3;
    display: flex;
    gap: 20px;
    place-items: center;
    place-content: center;
    translate: none;
    rotate: none;
    scale: none;
    transform: translate(0px, 0px);
    opacity: 1;
    width: 100%;
    margin: auto;
    position: fixed;
}

.nav-container {

    display: grid;
    flex-direction: row;
    padding: 0;
    position: relative;
    width: auto;
}
.background-link {
    grid-column-gap: 80px;
    grid-row-gap: 80px;
    justify-content: initial;
    align-items: center;
    height: 28px;
    display: flex;
    position: static;
    
}
.contener-link ul {
    text-decoration: none;
    display: flex;
    gap: 10px; /* Espacio entre elementos */
    list-style: none; /* Quita los puntos de la lista */
    padding: 0;
    

}

.nav-principal  ul li a {
  text-decoration: none;
  font-family: "Inter", sans-serif;
  font-weight: 300; /* Hace que la fuente se vea más delgada */
  font-size: 0.99rem;
  color: rgb(77, 75, 75);
}

.nav-principal  a:hover {
  color: rgb(254, 254, 254);
  
}

.contener-icon {
  position: relative;
  margin: initial;
  width: 50px;
  height: 50px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 14px;
  box-shadow: rgba(255, 255, 255, 0.349) 4px 4px 4px 5px inset, rgba(0, 0, 0, 0.1) 0px 2px 4px;
}

.contener-icon img {
  width: 100%;
  height: 100%;
  border-radius: 12px;
  object-fit: contain; /* Ajusta sin recortar */
  filter: invert(100%);


}
</style>
