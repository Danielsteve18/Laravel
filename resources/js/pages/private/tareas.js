const API_URL = 'http://localhost:8000'; // Ajusta según tu entorno

export const registrarTarea = async (datos) => {
    console.log("Enviando datos:", datos); // Verificar lo que se está enviando
    try {
        const responset = await axios.post(`${API_URL}/api/tareas`, datos,
            {
            headers: { 'Content-Type': 'application/json' }
             });
        
         return responset.status === 201 ? true : false;
    } catch (error) {
        console.error("Error en el registro:", error.responset?.data || error.message || error);
        throw error;
    }
};

export const obtenerTareasPorFk = async (fk) => {
    try {
        const response = await axios.get(`${API_URL}/api/tareas/fk/${fk}`);
        return response.data.tareas; // Devuelve los datos de las tareas
    } catch (error) {
        console.error("Error al obtener tareas:", error.response?.data || error.message);
        throw error;
    }
};
