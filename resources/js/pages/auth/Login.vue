
<template>
    <Link href="/">
    <button class="contener-icon" href="#home">
            <img src="../../components/00-resource/gato-negro-fondo-blanco.png" alt="">
    </button>
    </Link>
    <div class="contener_form">
        <form class="form"  @submit.prevent="inicio">
            <p class="titulo">Inicio de seccion</p>
            <p class="mensaje">Inicia secion ahora y disfruta de acceso completo a nuestra aplicación. </p>
               
                 <label>
                    <input v-model="email"  placeholder="°" type="email" class="input"  required>
                    <span>correo</span>
                </label> 
                
                <label>
                    <input v-model="password"  placeholder="°" type="password" class="input"  required>
                    <span>contraseña</span>
                </label>
                 
            <button   class="button">Inicio</button>
            <p class="signin">No tienes una cuenta ?<Link href="/singin"> <button class="login"> Registrarse</button> </Link></p>
        </form>
   </div>
</template>

<script setup>
 import { Link } from '@inertiajs/vue3';
 import { ref } from 'vue';
import { iniciarUsuario } from './auth'; 


import Swal from 'sweetalert2';

 const email= ref('');
 const password=ref('');

 const inicio = async () => {
 
    const datosUsuario = {
        email: email.value,
        password: password.value,
    };

    try {
        const exito = await iniciarUsuario(datosUsuario);
        
        if (exito) {
            Swal.fire({
                title: '¡Inicio exitoso!',
                text: 'Has accedido a tu cuenta con éxito.',
                icon: 'success',
            }).then(() => { window.location.href= "/MiTarea"});
                                                    
        } else {
            Swal.fire({
              title: 'Inicio fallido',
              text: 'No existe una cuenta con tus datos.',
              icon: 'error',
              showCancelButton: true
            })
        }
    } catch (error) {
        alert("Error en la solicitud");
    }
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
  background-color:  #e81cffcb;
  padding: 10px;
  border-radius: 10px;
  color: #fff;
  font-size: 16px;
  transform: .3s ease;
}

.button:hover {
  background-color:  #e81cff;
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