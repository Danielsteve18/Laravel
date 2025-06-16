<template>
    
<div class="Contenertarea">
    <div class="Crear">
        <div class="subcrear">
            <img src="../private/00-reesorces/book-2.svg" alt="Icono">
            <div class="flexsubtarea">
            <h6><span>Id:  </span> {{ user }}</h6>
            <h6><span>name:  {{ userName }}</span></h6>
            </div>
        </div>
        <h1>Mi Logro</h1>
        <form @submit.prevent="crear">
                <label for="nombre">Nombre</label>
            <input v-model="nombre" type="text" id="nombre" placeholder="nombre" required/>

                <label for="descripcion">Descripcion</label>
            <input v-model="Descripcion" type="text" id="descripcion" placeholder="descripcion" required/>

                <button>Crear</button>
        </form>
    </div>
    <div class="Ver">
        <div class="contener-cards">
            <div v-for="tarea in tareas" :key="tarea.id" class="card">
        <h2>Nombre: {{ tarea.name }}</h2>
        <p>Descripción: {{ tarea.description }}</p>
        <h4>Fecha de creación:</h4>
        <h6>{{ tarea.created_at }}</h6>
      </div>
    </div>
  </div>
</div>
    
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { registrarTarea, obtenerTareasPorFk } from './tareas';
import Swal from 'sweetalert2';

const user = localStorage.getItem('userId');
const userName = localStorage.getItem('userName');

const nombre = ref('');
const Descripcion = ref('');
const tareas = ref([]);

const cargarTareas = async () => {
    try {
        tareas.value = await obtenerTareasPorFk(user);
    } catch (error) {
        console.error("Error al obtener tareas:", error);
    }
};

onMounted(() => {
    cargarTareas(); // Llama la función cuando el componente se carga
});

const crear = async () => {
    const datosLogro = {
        fk: user,
        name: nombre.value,
        description: Descripcion.value
    };

    try {
        const exito = await registrarTarea(datosLogro);
        
        if (exito) {
            Swal.fire({
                title: '¡Tarea exitosa!',
                text: 'Has creado tu logro con éxito.',
                icon: 'success',
            });

            cargarTareas(); // Recarga las tareas después de crear una nueva
        } else {
            Swal.fire({
                title: 'Error en la creación',
                text: 'No se pudo registrar la tarea.',
                icon: 'error',
                showCancelButton: true
            });
        }
    } catch (error) {
        alert("Error en la solicitud");
    }
};




</script>

<style scoped>
.Contenertarea{
   
    color: #000000;
    text-shadow: 0 0 0.2em rgb(100, 61, 136); 
    width: 90vw;
    margin: 0 auto;
    height: 90vh;
    margin-top: 5vh;
    border-radius: 5px;
    border: none;

    display: grid;
    grid-template-columns: repeat(5, 1fr);
    grid-template-rows: repeat(5, 1fr);
    gap: 8px;

    padding: auto;
}
.Crear {
    margin-left: 10px;
    width:70%;
    height: 90%;

    
    border-radius: 30px;
    background: lightgrey;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 120px 200px -48px inset, rgba(0, 0, 0, 0.3) 0px 72px 104px -72px inset;
    padding: 10px;


    display: block;
    align-self:center;
    justify-self: center;

    grid-column: span 2 / span 2;
    grid-row: span 5 / span 5;

    text-align: center;
}

.Crear h1 {
    text-align: center;
}


.subcrear{
    display: flex;
    align-items: center;
    justify-items: center;

    border-radius: 30px;
    background: rgba(144, 54, 144, 0.842);
    box-shadow: rgba(173, 173, 190, 0.25) 0px 30px 50px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 26px -18px inset;
    padding: 10px;
}

.subcrear img{
    margin-left: 10px;
    width: 50px;
    height: 50px;
    display: block;
    align-self: center;
    justify-self: center;
    filter: contrast(1%) brightness(520%);
}

.Crear button{

        cursor: pointer;
        padding: 1em 3em;
        color:rgb(100, 21, 226);
        font-size: 10px;
        font-weight: bold;
        border-radius: 1em;
        outline: none;
        box-shadow: 0 0 1em .25em #6A0DAD;
        text-shadow: 0 0 .5em #5C0C8E;
        position: relative;
        transition: all 0.3s;
    
}

.Crear button:hover{
    color:#5C0C8E;

}

.flexsubtarea{
    margin-left: 30px;

}

.flexsubtarea h6{
    color: rgb(132, 0, 255);
}

.flexsubtarea span{
    font-size: 18px;
    color: #fff;
}

.Crear input{

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

    width: 80%;
    
}

.Ver {

    margin-left: 10px;
    width: 80%;
    height: 90%;
    max-height: 90%;
    
    overflow-y: auto;

    display: block;
    align-self:center;
    justify-self: center;

    grid-column: span 3 / span 3;
    grid-row: span 5 / span 5;
    grid-column-start: 3;
}

.contener-cards {
  display: flex;
  flex-wrap: wrap;
  gap: 16px; 
}


.card {
    display: block;
    text-align: center;
    justify-self: center;
    align-self: center;
    width: calc(40%);
  height: calc(30%);
  border-radius: 30px;
  background: #FFFFFF;
  box-shadow:#E6E6E6 0px 30px 50px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 26px -18px inset;
  padding: 10px;
  transition: 400ms;

}

.cards .card:hover {
  transform: scale(1.1, 1.1);
}

.cards:hover > .card:not(:hover) {
  filter: blur(10px);
  transform: scale(0.9, 0.9);
}





</style>