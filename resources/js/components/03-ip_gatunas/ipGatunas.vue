<template >
    <section class="contener-Ipgatunas" >
        <div class="contener-input-ip">
            <label for="ip">Ingresa la cadena de jueguetes</label>
            <br/>
            <input v-model="cadenaJuguetes" id="ip" type="number" pattern="[0-9]*" inputmode="numeric" placeholder="Solo números" />
            <button class="Auth" @click="validarCadena"> <span>Validar</span></button>
        </div>
        <div class="contener-ipValidas">
             <div class="tooltip-container">
                <div v-if="showTooltip" class="tooltip"><span>{{ resultados }}</span></div>
            </div>

            <img src="../00-resource/gato-en-la-nive-removebg-preview.png" alt=""/>
        </div>
        
    </section>
</template>

<script setup>
import { ref } from "vue";

const showTooltip = ref(false);
const cadenaJuguetes = ref(""); 
const resultados = ref("");

const validarCadena = () => {
    showTooltip.value = true;
    
    resultados.value = construirCasitas(String(cadenaJuguetes.value)).length > 0 
        ? construirCasitas(String(cadenaJuguetes.value)).join(" | ") 
        : "No hay combinaciones válidas";
    
    cadenaJuguetes.value = ""; // Limpiar el input después de validar
    
    setTimeout(() => {
        showTooltip.value = false; // Ocultar el tooltip después de un tiempo
    }, 10000); // Cambia el tiempo según sea necesario    
};


function construirCasitas(cadena="") {
    let resultados = [];

    if (cadena.length < 4 || cadena.length > 12) {
        return resultados;
    }

    const esValido = (segmento) => {
        if (segmento.length > 1 && segmento[0] === '0') return false;
        let num = parseInt(segmento);
        return num >= 0 && num <= 255;
    };

    const combinaciones = (indice, segmentos) => {
        if (segmentos.length === 4) {
            if (indice === cadena.length) {
                resultados.push(segmentos.join('.'));
            }
            return;
        }

        for (let i = 1; i <= 3; i++) {
            if (indice + i > cadena.length) break;
            let segmento = cadena.slice(indice, indice + i);
            if (esValido(segmento)) {
                combinaciones(indice + i, [...segmentos, segmento]);
            }
        }
    };

    combinaciones(0, []);
    return resultados;
    
};


</script>


<style scoped>
    .contener-Ipgatunas {
     
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    grid-template-rows: repeat(5, 1fr);
    gap: 8px;
  
    width: 95%;
    height: 84vh;
    justify-content: center;
    align-items: center;
    background-color: transparent;
    margin: 0 auto ;

    font-family: "Inter", sans-serif;

  
    }

    .contener-input-ip {
    grid-column: span 2 / span 2;
    grid-row: span 3 / span 3;
    grid-column-start: 2;
    grid-row-start: 2;   
    text-align: center;
    font-size: 3rem;
   
    display: block;
    align-items: center;
    justify-content: center;
    
    }

    .contener-input-ip label{
        color: #969696;
        text-shadow: 0 0 0.2em rgb(100, 61, 136);    
    }

    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }


    .contener-ipValidas {

    grid-row: span 2 / span 2;
    grid-column-start: 4;
    grid-row-start: 2;
    }

    .contener-ipValidas img {
        filter: brightness(80) saturate(80%);

      
    } 

    .contener-Ipgatunas button {
        cursor: pointer;
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

    .contener-Ipgatunas button:hover {
    transform: perspective(1000px) rotateX(10deg) rotateY(10deg);
}
  
 .contener-Ipgatunas input{
    text-align: center;
    margin: 30px;
  background: none;
  border: none;
  outline: none;
  max-width: 190px;
  padding: 10px 20px;
  font-size: 16px;
  border-radius: 9999px;
  box-shadow: inset 2px 5px 10px rgb(5, 5, 5);
  color: #fff;
   --glow-color: rgb(217, 176, 255);
 --glow-spread-color: rgba(191, 123, 255, 0.781);
 --enhanced-glow-color: rgb(231, 206, 255);
 
  box-shadow: 0 0 0.5em .15em var(--glow-color),
        0 0 4em 1em var(--glow-spread-color),
        inset 0 0 .25em .15em var(--glow-color);
 text-shadow: 0 0 .2em var(--glow-color);
 }

 .tooltip-container {
   width:80%;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: rgb(100, 21, 226);
    color: #ffffff;
    transition: all 0.3s;

}

.tooltip {
   
  top: 0; /* Ajusta según sea necesario */
  left: 0;
  
 
  padding: 5px 10px;
  border-radius: 5px;
  white-space: nowrap;
  z-index: 2;
 
  box-shadow: 0 0 10px rgba(100, 21, 226, 0.5);
  border: #ffffff;
    background: linear-gradient(#212121, #212121) padding-box,
              linear-gradient(145deg, transparent 35%,#e81cff, #40c9ff) border-box;
  border: 2px solid transparent;
  padding: 12px 14px;
  font-size: 14px;
 
  box-sizing: border-box;
  border-radius: 16px;
}
.tooltip span::before {
    content: "🐈‍⬛";
}
.tooltip span::after {
    content: "🐈‍⬛";
}
</style>
