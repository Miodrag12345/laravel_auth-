@foreach($prognoza as $grad => $temperatura)
    <p>Trenutno je {{$temperatura}} stepena u gradu {{$grad}}</p>

 @endforeach
