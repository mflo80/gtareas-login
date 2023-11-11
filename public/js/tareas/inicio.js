$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const toggle = document.querySelector('.toggle');
const menu = document.querySelector('.menu');

toggle.addEventListener('click', () => {
    menu.classList.toggle('active');
});

// Arrastar y soltar tareas entre los sectores
function allowDrop(event) {
    event.preventDefault();
}

function drag(event) {
    event.dataTransfer.setData("text/plain", event.target.id);
}

function drop(event) {
    event.preventDefault();
    var data = event.dataTransfer.getData("text/plain");
    var table = document.getElementById(data);
    var target = event.target;
    while (target && target.className.indexOf('tabla') === -1) {
        target = target.parentNode;
    }
    if (target) {
        var parent = table.parentNode;
        if (parent !== target) {
            target.appendChild(table);
            if (table.parentNode === parent) {
                parent.removeChild(table);
            }

            var categoria = target.getAttribute('data-categoria');
            updateCategoria(data, categoria);
        }
    }
}

function updateCategoria(tareaId, categoria) {
    $.ajax({
        url: 'categoria-tarea-' + tareaId,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            _method: 'PUT',
            categoria: categoria
        },
        success: function(response) {
            console.log(response);
        },
        error: function(response) {
            console.log(response);
        }
    });
}

// Botón para modificar las tareas

$(document).ready(function(){
    $("[id^='botonModificar']").click(function(){
        window.location.href = $(this).data('url');
    });
});

$(document).ready(function(){
    $("[id^='botonVer']").click(function(){
        window.location.href = $(this).data('url');
    });
});


