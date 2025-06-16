
<template>
    <Link href="/">
    <button class="contener-icon" href="#home">
            <img src="../../components/00-resource/gato-negro-fondo-blanco.png" alt="">
    </button>
    </Link>
    <div class="contener_form">
        <form class="form"  @submit.prevent="registro">
            <p class="titulo">Registro </p>
            <p class="mensaje">Regístrate ahora y obtén acceso completo a nuestra aplicación. </p>
                <div class="flex">
                <label>
                    <input v-model="name"  placeholder="°" type="text" class="input"  required>
                    <span>primer nombre</span>
                </label>

                <label>
                    <input v-model="Lastname"  placeholder="°" type="text" class="input"  required>
                    <span>apaellido</span>
                </label>
            </div>  
                    
            <label>
                <input v-model="email"  placeholder="°" type="email" class="input"  required>
                <span>correo</span>
            </label> 
                
            <label>
                <input v-model="password"  placeholder="°" type="password" class="input"  required>
                <span>contraseña</span>
            </label>
            <label>
                <input v-model="comparePasword"  placeholder="°" type="password" class="input"  required>
                <span>Confirmar contraseña</span>
            </label>
            <button class="button">Registrarse</button>
            <p class="signin">Ya tienes una cuenta ?<Link href="/login"> <button class="login"> iniciar secion</button> </Link></p>
        </form>
   </div>
</template>

<script setup>

import { Link } from '@inertiajs/vue3';

import { ref } from 'vue';
import { registrarUsuario } from './auth'; 


import Swal from 'sweetalert2';


const name = ref('');
const Lastname = ref('');
const email = ref('');
const password = ref('');
const comparePasword = ref('');


const registro = async () => {
  if(password.value === comparePasword.value) {
    const datosUsuario = {
        name: name.value,
        lastname: Lastname.value,
        email: email.value,
        password: password.value,
    };

    try {
        const exito = await registrarUsuario(datosUsuario);
        const name = localStorage.getItem('userName');
        if (exito) {
            Swal.fire({
                title: '¡Registro exitoso!',
                html: `<span style="color: green; font-weight: bold;">${name}</span>, Tu cuenta ha sido creada con éxito`,
              
                icon: 'success',
                confirmButtonText: 'Iniciar seccion',
                showCancelButton: true,
            }).then((result) => {
                  if (result.isConfirmed){
                     window.location.href= "/login";
                  }
                });
        } else {
            Swal.fire({
              title: 'Registro fallido',
              text: 'Tu cuenta no ha sido creada.',
              icon: 'error',
               showCancelButton: true
            })
        }
    } catch (error) {
        console.error("❌ Fallo en el registro:", error.response ? error.response.data : error);
    Swal.fire({
        title: 'Error en el registro',
        text: error.response ? JSON.stringify(error.response.data) : 'No se pudo conectar con el servidor.',
        icon: 'error',
        confirmButtonText: 'Cerrar'
    });
    }
  } else {
    Swal.fire({
        title: '¡Las contraseñas no coinciden!',
        text: 'Por favor, verifica que ambas contraseñas sean iguales.',
        icon: 'warning',
        confirmButtonText: 'Ok'
      });  
};
};

</script>


<style scoped>

.contener-icon {
  background-color: #e81cff72;
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

.contener_form{
    margin-top: 3vh;
    display: block;
    align-self: center;
    justify-self: center;
}
   
.form {
  display: flex;
  flex-direction: column;
  gap: 10px;
  max-width: 550px;
  background-color: #f7f7f7f2;
  padding: 30px;
  border-radius: 20px;
  position: relative;
  background: linear-gradient(#212121, #212121) padding-box,
              linear-gradient(145deg, transparent 35%,#e81cff, #40c9ff) border-box;
  border: 4px solid transparent;
}

.titulo {
  font-size: 28px;
  color: #e81cff;
  font-weight: 600;
  letter-spacing: -1px;
  position: relative;
  display: flex;
  align-items: center;
  padding-left: 30px;
}

.titulo::before,.titulo::after {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  border-radius: 50%;
  left: 0px;
  background-color:  #e81cff;
}

.titulo::before {
  width: 18px;
  height: 18px;
  background-color:  #e81cff;
}

.titulo::after {
  width: 18px;
  height: 18px;
  animation: pulse 1s linear infinite;
}

.mensaje, .signin {
  color: rgba(88, 87, 87, 0.822);
  font-size: 14px;
}

.signin {
  text-align: center;
}

.signin .login { 
  color: royalblue;
}

.login{
    background-color: transparent;
    border: none;
}

.signin .login:hover {
    cursor: pointer;
  text-decoration: underline royalblue;
}

.flex {
  display: flex;
  width: 100%;
  gap: 6px;
}

.form label {
  position: relative;
}

.form label .input {
  width: 90%;
  padding: 10px 10px 20px 10px;
  outline: 0;
  border: 1px solid rgba(105, 105, 105, 0.397);
  border-radius: 10px;
  background-color: #d5d5d5f2 ;
  
}

.form label .input + span {
  position: absolute;
  left: 10px;
  top: 15px;
  color: grey;
  font-size: 0.9em;
  cursor: text;
  transition: 0.3s ease;
}

.form label .input:placeholder-shown + span {
  top: 15px;
  font-size: 0.9em;
}

.form label .input:focus + span,.form label .input:valid + span {
  top: 30px;
  font-size: 0.7em;
  font-weight: 600;
}

.form label .input:valid + span {
  color: green;
}

.button {
  cursor: pointer;
  border: none;
  outline: none;
  background-color: #e81cffcb;
  padding: 10px;
  border-radius: 10px;
  color: #fff;
  font-size: 16px;
  transform: .3s ease;
}

.button:hover {
  background-color:   #e81cff;
}

@keyframes pulse {
  from {
    transform: scale(0.9);
    opacity: 1;
  }

  to {
    transform: scale(1.8);
    opacity: 0;
  }
}
</style>