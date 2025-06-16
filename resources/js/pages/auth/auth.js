const API_URL = 'http://localhost:8000'; // Ajusta según tu entorno

export const registrarUsuario = async (datos) => {
    console.log(datos)
    try {
        const response = await axios.post(`${API_URL}/singinUsers`, datos,
            {
            headers: { 'Content-Type': 'application/json' }
             });
        if (response.status === 201) {
            const { name } = response.data.user;

            localStorage.setItem('userName', name);

            return true;
        }
        return false;
    } catch (error) {
        console.error('Error en el registro:', error.response.data);
        throw error;
    }
};

export const iniciarUsuario = async (datos) => {
     try {
        const response = await axios.post(`${API_URL}/loginUsers`, datos,
             {
            headers: { 'Content-Type': 'application/json' }
             });
         if (response.status === 200) {
            const { id, name } = response.data.user;

            localStorage.setItem('userName', name);
            localStorage.setItem('userId', id);

               return true;
        }
        return false;
    } catch (error) {
        console.error('Error en el registro:', error.response.data);
        throw error;
    }

}
