<script setup>
  import { Link } from '@inertiajs/vue3';
</script>

<template >

  <section id="home" class="home">
    <div class="left" >
      <img src="../00-resource/gato-negro-fondo-blanco.png" alt="">
    </div>
    <div class="right">
      <div class="contener-all">
        <div class="title">
          <h2>
            <span>
              <img src="../00-resource/logo.svg" width="80" alt="">
            </span> 
              <strong > +  </strong> 
            <span>
              <img src="../00-resource/laravel.svg"  width="80" alt="">
            </span>
          </h2> 
        </div>
        <div class="contener-button">
          <Link href="/login">
            <button class="Auth"> 
              <span>Iniciar Sesión</span>
            </button>
          </Link>
          <Link href="singin">
            <button class="Auth">
              <span>Registrarse</span>
            </button>
          </Link>
        </div>
      </div>
    </div>
  </section>
</template >



<style scoped>

.home {
  width: 95%;
  height: 84vh;
  justify-content: center;
  align-items: center;
  background-color: transparent;
  margin: 0 auto ;

}

.home {
    display: grid;
    grid-template-columns: repeat(10, );
    grid-template-rows: repeat(5, 1fr);
    gap: 8px;
    padding: 20px;

}

.left {

  width: 500px;
  height: 500px;
  grid-column: span 2 / span 2;
  grid-row: span 5 / span 5;
  margin-left: 0 auto;
  margin: 0 auto;

}
.left img {
  filter: blur(0.1px) contrast(100%) brightness(120%);
  margin-top: auto;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: 0;
  filter: invert(100%);
}

.right {
  
  width: 500px;
  height: 500px;
  grid-column: span 2 / span 2;
  grid-row: span 5 / span 5;
  grid-column-start: 4;
  

}

.contener.all {
  display: flexbox;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  margin-top: 20px;
}

.title{
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  text-align: center;
  font-size: 3rem;
  font-weight: 700;
  display: flex;
  align-items: center;
  justify-content: center; /* Centra horizontalmente */
  color:rgb(254, 254, 254);
  text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}



.home .contener-button{
  z-index: 3;
  display: flex;
  justify-content: end;
  margin-top: 0px;
  position: relative;
  align-items: center;
}
/* boton de Uiverse.io by cssbuttons-io */
.home button {
 --glow-color: rgb(217, 176, 255);
 --glow-spread-color: rgba(191, 123, 255, 0.781);
 --enhanced-glow-color: rgb(231, 206, 255);
 --btn-color: rgb(100, 61, 136);
 border: .25em solid var(--glow-color);
 padding: 1em 3em;
 color: var(--glow-color);
 font-size: 15px;
 font-weight: bold;
 background-color: var(--btn-color);
 border-radius: 1em;
 outline: none;
 box-shadow: 0 0 1em .25em var(--glow-color),
        0 0 4em 1em var(--glow-spread-color),
        inset 0 0 .75em .25em var(--glow-color);
 text-shadow: 0 0 .5em var(--glow-color);
 position: relative;
 transition: all 0.3s;
}

.home button::after {
 pointer-events: none;
 content: "";
 position: absolute;
 top: 120%;
 left: 0;
 height: 100%;
 width: 100%;
 background-color: var(--glow-spread-color);
 filter: blur(2em);
 opacity: .7;
 transform: perspective(1.5em) rotateX(35deg) scale(1, .6);
}

.home button:hover {
 color: var(--btn-color);
 background-color: var(--glow-color);
 box-shadow: 0 0 1em .25em var(--glow-color),
        0 0 4em 2em var(--glow-spread-color),
        inset 0 0 .75em .25em var(--glow-color);
}

.home button:active {
 box-shadow: 0 0 0.6em .25em var(--glow-color),
        0 0 2.5em 2em var(--glow-spread-color),
        inset 0 0 .5em .25em var(--glow-color);
}
/* From Uiverse.io by cssbuttons-io */

</style>
