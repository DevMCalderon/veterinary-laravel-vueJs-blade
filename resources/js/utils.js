export default {
    getEdad(dateString) {
        let hoy = new Date()
        let fechaNacimiento = new Date(dateString)
        let edad = hoy.getFullYear() - fechaNacimiento.getFullYear()
        let diferenciaMeses = hoy.getMonth() - fechaNacimiento.getMonth()
        if (
            diferenciaMeses < 0 ||
            (diferenciaMeses === 0 && hoy.getDate() < fechaNacimiento.getDate())
        ) {
            edad--
        }
        return edad
    },

    edad(fechaNac){
        if(!fechaNac || isNaN(new Date(fechaNac))) return;
        const hoy = new Date();
        const dateNac = new Date(fechaNac);
        if(hoy - dateNac < 0) return;
        let days = hoy.getUTCDate() - dateNac.getUTCDate();
        let months = hoy.getUTCMonth() - dateNac.getUTCMonth();
        let years = hoy.getUTCFullYear() - dateNac.getUTCFullYear();
        if(days < 0) {
          months--;
          days = 30 + days;
        }
        if(months < 0) {
          years--;
          months = 12 + months;
        }
        return {years, months, days};
      }
}

