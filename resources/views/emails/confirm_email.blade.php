<h1>¡Gracias {{ $username }} por registrarte!</h1>
    <p>
        Dirijete al siguiente en enlace
        <a href='{{ url("registro/confirmacion/{$token}") }}'>{{ URL::to('/registro/confirmacion/' . $token) }}</a>
        para confirmar tu cuenta
    </p>
