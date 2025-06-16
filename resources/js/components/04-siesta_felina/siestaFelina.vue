<template>
    <section class="contener-siestaFelina" >
        
        <div class="imgSietafelina">
            <img src="../00-resource/humanoide.png" alt=""/>
            <label class="label" for="valores">Ingresar valores</label>
        </div>
        <div class="inputSietafelina">
            
            
            <input v-model="valor" id="valores" type="number" pattern="[0-9]*" inputmode="numeric" placeholder="Solo números" />
            <button  @click="guardarValor" > <span>Guardar</span></button>

        </div>
        <div class="arrayValores">
            <div class="contener-array">
            <ul v-for="(item, index) in myArray" :key="index">
                <li> 
                    {{ item }}<button class="delate" @click="myArray.splice(index, 1)"> <span>X</span></button>
                </li>
            </ul>
            </div>
            
            <button class="buttonZzz"  @click="calcularSiesta"> <span>Siesta mas larga</span></button>
        </div>
        <div class="siestaSize">
            <p>Maxima longitud <span>{{ mostrarLongitudMaxima }}</span></p>
           
            <p><span>{{ mostrarSecuencia }}</span></p>

        </div>
    
        
    </section>
</template>

<script setup>

    import { ref } from "vue";
    //
    const myArray = ref([]);
    const valor = ref(0);
    //

    //
    const mostrarLongitudMaxima=ref(0)
    const mostrarSecuencia=ref([])
    //
    const guardarValor = () => {
       if (!myArray.value.includes(valor.value)) {
             myArray.value.push(valor.value);
        }
       valor.value = 0;
    };

    const calcularSiesta= () => {
        mostrarLongitudMaxima.value=CollarT(myArray.value)
        mostrarSecuencia.value=secuencia(mostrarLongitudMaxima.value)
    }
    function CollarT (collares) {
    let myset = new Set(collares); // Convertimos el array en un conjunto para búsquedas rápidas
  
    let maxLongitud = 0;

    for (let num of myset) {
        // Si 'num - 1' no está en el conjunto, significa que 'num' es el inicio de una nueva secuencia
        if (!myset.has(num - 1)) {
            let longitudActual = 1;
            let siguiente = num + 1;

            // Expandimos la secuencia hacia adelante
            while (myset.has(siguiente)) {
                longitudActual++;
                siguiente++;
            }

            // Actualizamos la longitud máxima encontrada
            maxLongitud = Math.max(maxLongitud, longitudActual);
        }
    }

    return maxLongitud;
    };

    const secuencia = (value) => {
        let resultados=[]
        for(let j=1; j<= value; j++){
            let num= j
            resultados.push(num)
        }
        return resultados
    }
    
</script>

<style scoped>



.contener-siestaFelina {
    width: 95%;
    height: 84vh;

    display: grid;
    grid-template-columns: repeat(5, 1fr);
    grid-template-rows: repeat(5, 1fr);
    gap: 8px;

    margin: 0 auto;
}
    
.imgSietafelina {
    grid-column: span 3 / span 3;
    grid-column-start: 2;
}

.imgSietafelina img{
    filter: brightness(150%) invert(150%);
    display: block;
    justify-self: center;
    align-self: center;
    width: 300px;
    height: 300px;
    margin-top: 0%;
}

.label{
    color: rgba(185, 180, 180, 0.801);
    text-shadow: 0 0 0.2em rgb(100, 61, 136);
    display: block;
    text-align: center;
    font-size: 25px;
    
}

.inputSietafelina {
    margin-top: -70px;
    grid-column: span 3 / span 3;
    grid-row: span 2 / span 2;
    grid-column-start: 2;
    grid-row-start: 2;

    display: flex;
    align-items: center;
    justify-content: center;

    color: white;
}

.inputSietafelina input {
    

    text-align: center;
    margin: 30px;
    background: none;
    border: none;
    outline: none;
    max-width: 190px;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 14px;
    box-shadow: inset 2px 5px 10px rgb(255, 255, 255);
    color: #fff;
    --glow-color: rgb(217, 176, 255);
    --glow-spread-color: rgba(191, 123, 255, 0.781);
    --enhanced-glow-color: rgb(231, 206, 255);
   
    text-shadow: 0 0 .2em var(--glow-color);
}



input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }


.inputSietafelina button {
        cursor: pointer;
        --glow-color: rgb(217, 176, 255);
        --glow-spread-color: rgba(191, 123, 255, 0.781);
        --enhanced-glow-color: rgb(231, 206, 255);
        --btn-color: rgb(100, 61, 136);
        border: .25em solid var(--glow-color);
        padding: 1em 3em;
        color: var(--glow-color);
        font-size: 10px;
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

.arrayValores {
    grid-row: span 2 / span 2;
    grid-column-start: 2;
    grid-row-start: 4;

    color: white;

    text-align: start;
    

    margin-top: 0%;
}

.contener-array{
    max-width: 200px;
    max-height: 80px;
   
    overflow-y: auto;
    scrollbar-color: rgb(100, 61, 136) rgba(17, 17, 17, 0);

    margin: 0px 0px 9px 0px;
}

.arrayValores ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-items: center;
   
}

.arrayValores li {
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    width: 80px;
    padding: 2px;
    margin-bottom: 5px;
    background-color: rgba(100, 61, 136, 0.5);
    border-radius: 10px;
}

.delate{
    cursor: pointer;
    color:#97959583;
    text-shadow: 0 0 .2em rgb(100, 61, 136);
    font-size: 15px;
    border: none;
    background-color: transparent;
    box-shadow: 0 0 .2em rgb(100, 61, 136);
    border-radius: 4px;
}

.buttonZzz {
    margin: 0px 0px 0px 45px;
    cursor: pointer;
        --glow-color: rgb(217, 176, 255);
        --glow-spread-color: rgba(191, 123, 255, 0.781);
        --enhanced-glow-color: rgb(231, 206, 255);
        --btn-color: rgb(100, 61, 136);
        border: .25em solid var(--glow-color);
        padding: .5em .5em;
        color: var(--glow-color);
        font-size: 10px;
        font-weight:normal;
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

.siestaSize{
    grid-column: span 2 / span 2;
    grid-row: span 2 / span 2;
    grid-column-start: 3;
    grid-row-start: 4;

    color: white;

    display: block;
    justify-self: center;
    align-self: center;
}

.siestaSize p{
    font-size: 26px;
    color: rgb(110, 105, 105);
    text-shadow:0 0 .5rem rgb(100, 61, 136) ;
    padding: 0;
    
    font-family: Helvetica, sans-serif;
    
}

.siestaSize span{
    font-size: 30px;
    font-family: "Zampichi W00 Fineline", sans-serif;

    color: rgb(100, 61, 136);
    text-shadow:0 0 .5rem rgb(100, 61, 136) ;
}

        
</style>