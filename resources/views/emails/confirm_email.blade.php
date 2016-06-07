<h1>¡Gracias {{ $username }} por registrarte!</h1>
    <p>
        Diríjete al siguiente enlace
        <a href='{{ url("registro/confirmacion/{$token}") }}'>{{ URL::to('/registro/confirmacion/' . $token) }}</a>
        para confirmar tu cuenta.
    </p>
