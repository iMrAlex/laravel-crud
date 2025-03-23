<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Producto</title>
</head>

<body>
    <h1>Update para Producto</h1>
    <form action="{{-- {{ route('productos.update') }} --}}" method="post">
        @csrf
        <label for="">Nombre</label><br>
        <input value="{{$producto->nombre}}" type="text" name="nombre"><br><br>
        <label for="">Categoria</label><br>
        <select name="categoria" id="">
            <option value="{{ $producto->categoria->nombre }}" hidden>Seleccionar</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select><br><br>
        <label for="">Descripción</label><br>
        <textarea name="descripcion" id="" cols="30" rows="10"></textarea><br><br>
        <label for="">Precio</label><br>
        <input type="number" name="precio"><br><br>
        <label for="">Stock</label><br>
        <input type="number" name="stock"><br><br>
        <label for="">Foto</label><br>
        <input type="file" name="imagen"><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>
