function setAsesoriasEstudiantes() {
    var dt = new Date();
    var month = dt.getMonth() + 1;
    var day = dt.getDate();
    var year = dt.getFullYear();

    if (day < 10) { day = '0' + day; }
    if (month < 10) { month = '0' + month; }
    var horaregistro = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    firebase.database().ref('parcialSO').push({
        fecha: {
            dia: day,
            mes: month,
            anio: year
        },
        hora: horaregistro,
        nombre: document.getElementById('estudiante').value,
        codigo: document.getElementById('codigo').value,
        asignatura: document.getElementById('asignatura').value,
        descripcion: document.getElementById('detalleAsesoria').value       
    });
    document.getElementById('estudiante').value = "";
    document.getElementById('codigo').value = "";
    document.getElementById('asignatura').value = "";
    document.getElementById('detalleAsesoria').value = "";

}


function getAlumnos() {
    $('#datosActividades').empty();
    var dt = new Date();
    var month = dt.getMonth() + 1;
    if (month < 10) { month = '0' + month; }
    console.log("MES" + month);
    $('#divhistorialAsesorias').show();
    $('#btnhistorialEs').hide();
    $('#btnhistorialCERRAREs').show();

    firebase.database().ref("parcialSO").on("child_added", function (dato) {
        var actv = dato.val();                 
            document.getElementById('datosEstudiantes').insertAdjacentHTML('beforeend',
                '<tr>' +
                '<td>' + actv.codigo+ '</td>' +
                '<td>' + actv.nombre+ '</td>' +
                '<td>' + actv.asignatura+ '</td>' +
                '<td>' + actv.descripcion + '</td>' +
                '<td>' + actv.fecha.dia + '/' + actv.fecha.mes + '/' + actv.fecha.anio + '</td>' +
                '</tr>');        
    });
}

function getServices(){
    /*$('#datosActividades').empty();
    var dt = new Date();
    var month = dt.getMonth() + 1;
    if (month < 10) { month = '0' + month; }
    console.log("MES" + month);
    $('#divhistorialAsesorias').show();
    $('#btnhistorialEs').hide();
    $('#btnhistorialCERRAREs').show();*/

    firebase.database().ref("parcialSO").on("child_added", function (dato) {
        var actv = dato.val();                 
            document.getElementById('datosEstudiantes').insertAdjacentHTML('beforeend',
                '<tr>' +
                '<td>' + actv.codigo+ '</td>' +
                '<td>' + actv.nombre+ '</td>' +
                '<td>' + actv.asignatura+ '</td>' +
                '<td>' + actv.descripcion + '</td>' +
                '<td>' + actv.fecha.dia + '/' + actv.fecha.mes + '/' + actv.fecha.anio + '</td>' +
                '</tr>');        
    });
}


