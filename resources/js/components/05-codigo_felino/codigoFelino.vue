<template>
    <section  class="contenerCodigofelino">
        <div class="maullidoSecreto">
            <br>
            <label for="maullido">2. Escribe el maullido cifrado</label>
            <br>
            <input v-model="maullido" id="maullido" type="text" placeholder="miau...miau"/>
            <br>
            <button @click="decifrar" class="click">Decifrar</button>
        </div>
        <div class="diccionario">
                <br>
            <label for="diccionario">1. Escribe el codigo secreto</label>
                <br>
            <input v-model="palabra" id="diccionario" type="text" placeholder="gato, michi.."/>
                <br>
            <button @click="Añadir" class="click">Guardar</button>
            <ul v-for="(item, index) in diccionario" :key="index">
                <li> 
                    {{ item }}<button class="delate" @click="diccionario.splice(index, 1)"> <span>X</span></button>
                </li>
            </ul>
        </div>
        <div class="codigoDecifrado" id="codigo-felino">
            <ul v-for="(item, index) in decifrado " :key="index">
                <li> 
                    {{ item }} <span>✔️</span>
                </li>
            </ul>
            
        </div>
    </section>
</template>

<script setup>
    import {ref} from 'vue';
const diccionario = ref([])
const palabra = ref("") 
const maullido= ref("") 

const decifrado =ref([]) 


const Añadir= ()=>{
    if (!diccionario.value.includes(palabra.value)) {
             diccionario.value.push(palabra.value);
        }
    palabra.value = "";
}

const decifrar= ()=> {
    const resultado = descifrarMaullido(diccionario.value, maullido.value);
    decifrado.value = resultado.length ? resultado : ["No se encontró un descifrado válido"];
};

 var descifrarMaullido = (diccionarioFelino, maullido) => {
    const diccionarioSet = new Set(diccionarioFelino);
    const memo = new Map();

    const backtrack = (indice) => {
        if (indice === maullido.length) return [""]; // Caso base: se ha procesado todo el maullido
        if (memo.has(indice)) return memo.get(indice); // Si ya calculamos este índice, usamos el resultado almacenado

        let resultados = [];

        for (let i = indice + 1; i <= maullido.length; i++) {
            let palabra = maullido.substring(indice, i);
            if (diccionarioSet.has(palabra)) {
                let siguientesFrases = backtrack(i);
                for (let frase of siguientesFrases) {
                    resultados.push(frase ? palabra + " " + frase : palabra);
                }
            }
        }

        memo.set(indice, resultados);
        return resultados;
    };

    return backtrack(0);
}; 
</script>

<style scoped>
    .contenerCodigofelino{
        
        width: 95%;
        height: 84vh;
       
        margin: 0 auto;
        background-color: transparent;
        

        font-family: "Inter", sans-serif;

         display: grid;
        grid-template-columns: repeat(8, 1fr);
        grid-template-rows: repeat(5, 1fr);
        gap: 8px;

        color:rgb(148, 144, 144)
    }

    .maullidoSecreto{
   
        grid-column: span 3 / span 3;
        grid-row: span 3 / span 3;
        grid-column-start: 2;  

    }

    .diccionario{
        grid-column: span 2 / span 2;
        grid-row: span 3/ span 3;
        grid-column-start: 6;  
    }

    .codigoDecifrado{
        grid-column: span 6 / span 6;
        grid-row: span 2/ span 2;
        grid-column-start: 2; 
        grid-row-start: 4; 
    }

    .contenerCodigofelino label{
        color: rgb(166, 166, 172);
        text-shadow: 0 0 1rem rgb(151, 59, 173);
        font-size: 30px;

        display: block;
        justify-self: center;
        align-self: center;
        text-align: center;
    }

     .contenerCodigofelino input{
         display: block;
        justify-self: center;
        align-self: center;

        text-align: center;
            margin: 30px;
            width: 100%;
        background: none;
        border: none;
        outline: none;
       
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 9px;
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

     .click{
        cursor: pointer;

        display: block;
        justify-self: center;
        align-self: center;
        
        text-align: center;
            margin: 0 auto;
        background: none;
        border: none;
        outline: none;
        max-width: 190px;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 9999px;
        box-shadow: inset 2px 5px 10px rgb(228, 224, 224);
        color: #fff;
       
 
 
     }

     .click:hover{
        background-color: rgba(144, 45, 168, 0.712);
     }

     .contenerCodigofelino p{
        color: rgb(255, 255, 255);
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
</style>