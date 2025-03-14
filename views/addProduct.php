<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Añadir Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-4">Añadir Producto</h2>

        <form action="procesar_producto.php" method="POST" enctype="multipart/form-data" class="space-y-4">
            <div>
                <label class="block text-gray-700 font-medium">ID del Producto</label>
                <input type="text" name="id_producto" class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Nombre</label>
                <input type="text" name="nombre" class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Precio</label>
                <input type="number" step="0.01" name="precio" class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Descripción</label>
                <textarea name="descripcion" class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300" required></textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Foto</label>
                <input type="file" name="foto" accept="image/*" class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Descripción Adicional</label>
                <textarea name="descripcion2" class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300"></textarea>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition">
                Añadir Producto
            </button>
        </form>
    </div>

</body>
</html>
