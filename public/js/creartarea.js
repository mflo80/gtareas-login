// Obtener el campo de fecha y hora
var campoFechaHoraInicio = document.getElementById("fecha-inicio");
var campoFechaHoraFin = document.getElementById("fecha-fin");

// Obtener la fecha y hora actual del sistema
var fechaHoraActual = new Date();
fechaHoraActual.setHours(fechaHoraActual.getHours() - 3);
var fechaHoraMenos3Horas = fechaHoraActual.toISOString().slice(0, 16);

// Establecer el valor del campo de fecha y hora
campoFechaHoraInicio.value = fechaHoraMenos3Horas;
campoFechaHoraFin.value = fechaHoraMenos3Horas;
