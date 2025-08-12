$(document).ready(function() {
    // Función para cargar la lista de estudiantes al cargar la página
    function loadStudentList() {
        $.ajax({
            url: 'phpEstudiantes/load_students.php',
            type: 'GET',
            success: function(response) {
                $('#student-table-body').html(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Error al cargar la lista de estudiantes');
            }
        });
    }

    // Función para cargar las opciones de estudiantes en el select
    function loadStudentOptions() {
        $.ajax({
            url: 'phpEstudiantes/load_student_options.php',
            type: 'GET',
            success: function(response) {
                $('#selectStudent').html(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Error al cargar las opciones de estudiantes');
            }
        });
    }

    // Función para cargar la información del estudiante seleccionado
    function loadStudentInfo(studentId) {
        $.ajax({
            url: 'phpEstudiantes/load_student_info.php',
            type: 'GET',
            data: { id: studentId },
            success: function(response) {
                var studentInfo = JSON.parse(response);
                $('#editNombre').val(studentInfo.nombre);
                $('#editApellido').val(studentInfo.apellido);
                $('#editContraseña').val(studentInfo.contraseña);
                $('#editRol').val(studentInfo.rol);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Error al cargar la información del estudiante');
            }
        });
    }

// Función para agregar un estudiante
function agregarEstudiante() {
    $.ajax({
        url: 'phpEstudiantes/add_student.php',
        type: 'POST',
        data: $('#add-student-form').serialize(),
        success: function(response) {
            $('#add-student-form')[0].reset();
            loadStudentList();
            loadStudentOptions();
            alert(response); // Mostrar el mensaje de éxito
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert('Error al agregar el estudiante');
        }
    });
}


    // Función para editar un estudiante
    function editarEstudiante() {
        $.ajax({
            url: 'phpEstudiantes/edit_student.php',
            type: 'POST',
            data: $('#edit-student-form').serialize(),
            success: function(response) {
                $('#edit-student-form')[0].reset();
                loadStudentList();
                loadStudentOptions();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Error al editar el estudiante');
            }
        });
    }
  // Eliminar estudiante
  $(document).on('click', '.eliminar-estudiante', function() {
    var studentId = $(this).data('id');
    if (confirm('¿Estás seguro de que deseas eliminar este estudiante?')) {
        $.ajax({
            url: 'phpEstudiantes/delete_student.php',
            type: 'POST',
            data: { id: studentId },
            success: function(response) {
                alert(response);
                loadStudentList();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Error al eliminar el estudiante');
            }
        });
    }
});
    // Llama a la función para cargar la lista de estudiantes al cargar la página
    loadStudentList();

    // Llama a la función para cargar las opciones de estudiantes al cargar la página
    loadStudentOptions();

    // Evento para agregar un estudiante al enviar el formulario
    $('#add-student-form').submit(function(e) {
        e.preventDefault();
        agregarEstudiante();
    });

    // Evento para cargar la información del estudiante seleccionado
    $('#selectStudent').change(function() {
        var studentId = $(this).val();
        loadStudentInfo(studentId);
    });

    // Evento para editar un estudiante al enviar el formulario
    $('#edit-student-form').submit(function(e) {
        e.preventDefault();
        editarEstudiante();
    });
    // Función para manejar el clic en el botón de editar
    $(document).on('click', '.editar-estudiante', function() {
        var studentId = $(this).data('id');
        loadStudentInfo(studentId);
        $('#edit-tab').tab('show'); // Cambiar a la pestaña de edición
    });
    // Evento para mostrar u ocultar la contraseña en el formulario de edición
    $('#verEditContraseña').change(function() {
        if ($(this).is(':checked')) {
            $('#editContraseña').attr('type', 'text');
        } else {
            $('#editContraseña').attr('type', 'password');
        }
    });
});
