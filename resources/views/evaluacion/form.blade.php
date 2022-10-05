<div class="form-floating my-3">
    <input type="text" class="form-control" id="a" placeholder="a" value="{{ $idea->codigo }}" readonly>
    <label for="floatingInput">Código</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="a" placeholder="a" value="{{ $idea->titulo }}" readonly>
    <label for="floatingPassword">Título</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="a" placeholder="a" value="{{ $idea->talento }}" readonly>
    <label for="floatingPassword">Talento</label>
</div>

<input type="hidden" name="idea" value="{{ $idea->id}}">
<input type="hidden" name="user_id" value="{{ $user->id }}">

<hr>
<h2>Formulación de la idea</h2>

<div class="row mb-4">
    <div class="col">
        <h6>&nbsp;</h6>
        <label>Descripción clara y concisa del problema, necesidad u oportunidad a atender con la idea</label>
        <select class="form-select" id="floatingSelect" name="criterio1" @if($modo == "Ver") disabled @endif required>
            <option selected value="" disabled>Seleccione...</option>
            <option  value=1 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 1) selected @endif>1</option>
            <option  value=2 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 2) selected @endif>2</option>
            <option  value=3 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 3) selected @endif>3</option>
            <option  value=4 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 4) selected @endif>4</option>
            <option  value=5 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 5) selected @endif>5</option>
            <option  value=6 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 6) selected @endif>6</option>
            <option  value=7 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 7) selected @endif>7</option>
            <option  value=8 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 8) selected @endif>8</option>
            <option  value=9 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 9) selected @endif>9</option>
            <option value=10 @if(isset($evaluacion->criterio1) && $evaluacion->criterio1 == 10) selected @endif>10</option>
        </select>
    </div>
    <div class="col">
        <h6>Rúbica</h6>
        <ul class="list-group">
            <li class="list-group-item">(1-2) No es clara, ni concisa</li>
            <li class="list-group-item">(3-4) No es clara</li>
            <li class="list-group-item">(5-7) Es suficientemente clara</li>
            <li class="list-group-item">(8-10) Es totalmente clara</li>
        </ul>
    </div>
</div>
<div class="row mb-4">
    <div class="col">
        <h6>&nbsp;</h6>
        <label>Suficiente conocimiento sobre otros resultados que dan solución al problema, necesidad u oportunidad</label>
        <select class="form-select" id="floatingSelect" name="criterio2" @if($modo == "Ver") disabled @endif required>
            <option selected value="" disabled>Seleccione...</option>
            <option  value=1 @if(isset($evaluacion->criterio2) && $evaluacion->criterio2 == 1) selected @endif>1</option>
            <option  value=2 @if(isset($evaluacion->criterio2) && $evaluacion->criterio2 == 2) selected @endif>2</option>
            <option  value=3 @if(isset($evaluacion->criterio2) && $evaluacion->criterio2 == 3) selected @endif>3</option>
            <option  value=4 @if(isset($evaluacion->criterio2) && $evaluacion->criterio2 == 4) selected @endif>4</option>
            <option  value=5 @if(isset($evaluacion->criterio2) && $evaluacion->criterio2 == 5) selected @endif>5</option>
            <option  value=6 @if(isset($evaluacion->criterio2) && $evaluacion->criterio2 == 6) selected @endif>6</option>
            <option  value=7 @if(isset($evaluacion->criterio2) && $evaluacion->criterio2 == 7) selected @endif>7</option>
            <option  value=8 @if(isset($evaluacion->criterio2) && $evaluacion->criterio2 == 8) selected @endif>8</option>
            <option  value=9 @if(isset($evaluacion->criterio2) && $evaluacion->criterio2 == 9) selected @endif>9</option>
            <option value=10 @if(isset($evaluacion->criterio2) && $evaluacion->criterio2 == 10) selected @endif>10</option>
        </select>
    </div>
    <div class="col">
        <h6>Rúbica</h6>
        <ul class="list-group">
            <li class="list-group-item">(1-2) No presenta mínima información</li>
            <li class="list-group-item">(3-4) Presenta poca información</li>
            <li class="list-group-item">(5-7) Presenta suficiente información</li>
            <li class="list-group-item">(8-10) Presenta información completa</li>
        </ul>
    </div>
</div>
<div class="row mb-4">
    <div class="col">
        <h6>&nbsp;</h6>
        <label>Los objetivos de la idea contribuyen a la solución del problema, necesidad u oportunidad</label>
        <select class="form-select" id="floatingSelect" name="criterio3" @if($modo == "Ver") disabled @endif required>
            <option selected value="" disabled>Seleccione...</option>
            <option  value=1 @if(isset($evaluacion->criterio3) && $evaluacion->criterio3 == 1) selected @endif>1</option>
            <option  value=2 @if(isset($evaluacion->criterio3) && $evaluacion->criterio3 == 2) selected @endif>2</option>
            <option  value=3 @if(isset($evaluacion->criterio3) && $evaluacion->criterio3 == 3) selected @endif>3</option>
            <option  value=4 @if(isset($evaluacion->criterio3) && $evaluacion->criterio3 == 4) selected @endif>4</option>
            <option  value=5 @if(isset($evaluacion->criterio3) && $evaluacion->criterio3 == 5) selected @endif>5</option>
            <option  value=6 @if(isset($evaluacion->criterio3) && $evaluacion->criterio3 == 6) selected @endif>6</option>
            <option  value=7 @if(isset($evaluacion->criterio3) && $evaluacion->criterio3 == 7) selected @endif>7</option>
            <option  value=8 @if(isset($evaluacion->criterio3) && $evaluacion->criterio3 == 8) selected @endif>8</option>
            <option  value=9 @if(isset($evaluacion->criterio3) && $evaluacion->criterio3 == 9) selected @endif>9</option>
            <option value=10 @if(isset($evaluacion->criterio3) && $evaluacion->criterio3 == 10) selected @endif>10</option>
        </select>
    </div>
    <div class="col">
        <h6>Rúbica</h6>
        <ul class="list-group">
            <li class="list-group-item">(1-2) Los objetivos enunciados No tienen relación con el problema, necesidad u oportunidad</li>
            <li class="list-group-item">(3-4) Los objetivos enunciados tienen poca relación con el problema, necesidad u oportunidad</li>
            <li class="list-group-item">(5-7) Los objetivos enunciados tienen suficiente relación con el problema, necesidad u oportunidad</li>
            <li class="list-group-item">(8-10) Los objetivos enunciados tienen completa relación con el problema, necesidad u oportunidad</li>
        </ul>
    </div>
</div>
<div class="row mb-4">
    <div class="col">
        <h6>&nbsp;</h6>
        <label>Los resultados propuestos corresponden a los objetivos</label>
        <select class="form-select" id="floatingSelect" name="criterio4" @if($modo == "Ver") disabled @endif required>
            <option selected value="" disabled>Seleccione...</option>
            <option  value=1 @if(isset($evaluacion->criterio4) && $evaluacion->criterio4 == 1) selected @endif>1</option>
            <option  value=2 @if(isset($evaluacion->criterio4) && $evaluacion->criterio4 == 2) selected @endif>2</option>
            <option  value=3 @if(isset($evaluacion->criterio4) && $evaluacion->criterio4 == 3) selected @endif>3</option>
            <option  value=4 @if(isset($evaluacion->criterio4) && $evaluacion->criterio4 == 4) selected @endif>4</option>
            <option  value=5 @if(isset($evaluacion->criterio4) && $evaluacion->criterio4 == 5) selected @endif>5</option>
            <option  value=6 @if(isset($evaluacion->criterio4) && $evaluacion->criterio4 == 6) selected @endif>6</option>
            <option  value=7 @if(isset($evaluacion->criterio4) && $evaluacion->criterio4 == 7) selected @endif>7</option>
            <option  value=8 @if(isset($evaluacion->criterio4) && $evaluacion->criterio4 == 8) selected @endif>8</option>
            <option  value=9 @if(isset($evaluacion->criterio4) && $evaluacion->criterio4 == 9) selected @endif>9</option>
            <option value=10 @if(isset($evaluacion->criterio4) && $evaluacion->criterio4 == 10) selected @endif>10</option>
        </select>
    </div>
    <div class="col">
        <h6>Rúbica</h6>
        <ul class="list-group">
            <li class="list-group-item">(1-2) Los resultados propuestos No corresponden con los objetivos</li>
            <li class="list-group-item">(3-4) Los resultados propuestos tienen poca correspondencia con los objetivos</li>
            <li class="list-group-item">(5-7) Los resultados propuestos tienen suficiente correspondencia con los objetivos</li>
            <li class="list-group-item">(8-10) Los resultados propuestos tienen completa correspondencia con los objetivos</li>
        </ul>
    </div>
</div>
<div class="row mb-4">
    <div class="col">
        <h6>&nbsp;</h6>
        <label>El alcance de la propuesta esta corresponde con los objetivos</label>
        <select class="form-select" id="floatingSelect" name="criterio5" @if($modo == "Ver") disabled @endif required>
            <option selected value="" disabled>Seleccione...</option>
            <option  value=1 @if(isset($evaluacion->criterio5) && $evaluacion->criterio5 == 1) selected @endif>1</option>
            <option  value=2 @if(isset($evaluacion->criterio5) && $evaluacion->criterio5 == 2) selected @endif>2</option>
            <option  value=3 @if(isset($evaluacion->criterio5) && $evaluacion->criterio5 == 3) selected @endif>3</option>
            <option  value=4 @if(isset($evaluacion->criterio5) && $evaluacion->criterio5 == 4) selected @endif>4</option>
            <option  value=5 @if(isset($evaluacion->criterio5) && $evaluacion->criterio5 == 5) selected @endif>5</option>
            <option  value=6 @if(isset($evaluacion->criterio5) && $evaluacion->criterio5 == 6) selected @endif>6</option>
            <option  value=7 @if(isset($evaluacion->criterio5) && $evaluacion->criterio5 == 7) selected @endif>7</option>
            <option  value=8 @if(isset($evaluacion->criterio5) && $evaluacion->criterio5 == 8) selected @endif>8</option>
            <option  value=9 @if(isset($evaluacion->criterio5) && $evaluacion->criterio5 == 9) selected @endif>9</option>
            <option value=10 @if(isset($evaluacion->criterio5) && $evaluacion->criterio5 == 10) selected @endif>10</option>
        </select>
    </div>
    <div class="col">
        <h6>Rúbica</h6>
        <ul class="list-group">
            <li class="list-group-item">(1-2) El alcance de la propuesta No corresponden con los objetivos</li>
            <li class="list-group-item">(3-4) El alcance de la propuesta poco corresponde con los objetivos</li>
            <li class="list-group-item">(5-7) El alcance de la propuesta corresponde suficientemente con los objetivos</li>
            <li class="list-group-item">(8-10) El alcance de la propuesta corresponde completamente con los objetivos</li>
        </ul>
    </div>
</div>
<div class="row mb-4">
    <div class="col">
        <h6>&nbsp;</h6>
        <label>El proponente tiene claridad conceptual, técnica y metodológica de cómo obtener los resultados</label>
        <select class="form-select" id="floatingSelect" name="criterio6" @if($modo == "Ver") disabled @endif required>
            <option selected value="" disabled>Seleccione...</option>
            <option  value=1 @if(isset($evaluacion->criterio6) && $evaluacion->criterio6 == 1) selected @endif>1</option>
            <option  value=2 @if(isset($evaluacion->criterio6) && $evaluacion->criterio6 == 2) selected @endif>2</option>
            <option  value=3 @if(isset($evaluacion->criterio6) && $evaluacion->criterio6 == 3) selected @endif>3</option>
            <option  value=4 @if(isset($evaluacion->criterio6) && $evaluacion->criterio6 == 4) selected @endif>4</option>
            <option  value=5 @if(isset($evaluacion->criterio6) && $evaluacion->criterio6 == 5) selected @endif>5</option>
            <option  value=6 @if(isset($evaluacion->criterio6) && $evaluacion->criterio6 == 6) selected @endif>6</option>
            <option  value=7 @if(isset($evaluacion->criterio6) && $evaluacion->criterio6 == 7) selected @endif>7</option>
            <option  value=8 @if(isset($evaluacion->criterio6) && $evaluacion->criterio6 == 8) selected @endif>8</option>
            <option  value=9 @if(isset($evaluacion->criterio6) && $evaluacion->criterio6 == 9) selected @endif>9</option>
            <option value=10 @if(isset($evaluacion->criterio6) && $evaluacion->criterio6 == 10) selected @endif>10</option>
        </select>
    </div>
    <div class="col">
        <h6>Rúbica</h6>
        <ul class="list-group">
            <li class="list-group-item">(1-2) El proponente No tiene claridad conceptual, técnica y metodológica de cómo obtener los resultados</li>
            <li class="list-group-item">(3-4) El proponente tiene poca claridad conceptual, técnica y metodológica de cómo obtener los resultados</li>
            <li class="list-group-item">(5-7) El proponente tiene suficiente claridad conceptual, técnica y metodológica de cómo obtener los resultados</li>
            <li class="list-group-item">(8-10) El proponente tiene completa claridad conceptual, técnica y metodológica de cómo obtener los resultados</li>
        </ul>
    </div>
</div>

<hr>

<h2>Innovación de la idea</h2>

<div class="row mb-4">
    <div class="col">
        <h6>&nbsp;</h6>
        <label>El resultado propuesto por la idea presenta funcionalidades novedosas que generen cambio o ventaja con respecto a las soluciones que se encuentran en el entorno</label>
        <select class="form-select" id="floatingSelect" name="criterio7" @if($modo == "Ver") disabled @endif required>
            <option selected value="" disabled>Seleccione...</option>
            <option  value=1 @if(isset($evaluacion->criterio7) && $evaluacion->criterio7 == 1) selected @endif>1</option>
            <option  value=2 @if(isset($evaluacion->criterio7) && $evaluacion->criterio7 == 2) selected @endif>2</option>
            <option  value=3 @if(isset($evaluacion->criterio7) && $evaluacion->criterio7 == 3) selected @endif>3</option>
            <option  value=4 @if(isset($evaluacion->criterio7) && $evaluacion->criterio7 == 4) selected @endif>4</option>
            <option  value=5 @if(isset($evaluacion->criterio7) && $evaluacion->criterio7 == 5) selected @endif>5</option>
            <option  value=6 @if(isset($evaluacion->criterio7) && $evaluacion->criterio7 == 6) selected @endif>6</option>
            <option  value=7 @if(isset($evaluacion->criterio7) && $evaluacion->criterio7 == 7) selected @endif>7</option>
            <option  value=8 @if(isset($evaluacion->criterio7) && $evaluacion->criterio7 == 8) selected @endif>8</option>
            <option  value=9 @if(isset($evaluacion->criterio7) && $evaluacion->criterio7 == 9) selected @endif>9</option>
            <option value=10 @if(isset($evaluacion->criterio7) && $evaluacion->criterio7 == 10) selected @endif>10</option>
        </select>
    </div>
    <div class="col">
        <h6>Rúbica</h6>
        <ul class="list-group">
            <li class="list-group-item">(1-2) El resultado propuesto por la idea No presenta funcionalidades novedosas</li>
            <li class="list-group-item">(3-4) El resultado propuesto por la idea presenta pocas funcionalidades novedosas</li>
            <li class="list-group-item">(5-7) El resultado propuesto por la idea presenta suficientes funcionalidades novedosas</li>
            <li class="list-group-item">(8-10) El resultado propuesto por la idea presenta completas funcionalidades novedosas</li>
        </ul>
    </div>
</div>
<div class="row mb-4">
    <div class="col">
        <h6>&nbsp;</h6>
        <label>El resultado propuesto por la idea tiene características que generan valor agregado a los productos, procesos y servicios, y contribuyen a la mejora de la productividad y competitividad de las personas o las organizaciones</label>
        <select class="form-select" id="floatingSelect" name="criterio8" @if($modo == "Ver") disabled @endif required>
            <option selected value="" disabled>Seleccione...</option>
            <option  value=1 @if(isset($evaluacion->criterio8) && $evaluacion->criterio8 == 1) selected @endif>1</option>
            <option  value=2 @if(isset($evaluacion->criterio8) && $evaluacion->criterio8 == 2) selected @endif>2</option>
            <option  value=3 @if(isset($evaluacion->criterio8) && $evaluacion->criterio8 == 3) selected @endif>3</option>
            <option  value=4 @if(isset($evaluacion->criterio8) && $evaluacion->criterio8 == 4) selected @endif>4</option>
            <option  value=5 @if(isset($evaluacion->criterio8) && $evaluacion->criterio8 == 5) selected @endif>5</option>
            <option  value=6 @if(isset($evaluacion->criterio8) && $evaluacion->criterio8 == 6) selected @endif>6</option>
            <option  value=7 @if(isset($evaluacion->criterio8) && $evaluacion->criterio8 == 7) selected @endif>7</option>
            <option  value=8 @if(isset($evaluacion->criterio8) && $evaluacion->criterio8 == 8) selected @endif>8</option>
            <option  value=9 @if(isset($evaluacion->criterio8) && $evaluacion->criterio8 == 9) selected @endif>9</option>
            <option value=10 @if(isset($evaluacion->criterio8) && $evaluacion->criterio8 == 10) selected @endif>10</option>
        </select>
    </div>
    <div class="col">
        <h6>Rúbica</h6>
        <ul class="list-group">
            <li class="list-group-item">(1-2) El resultado propuesto por la idea No tiene características que generan valor agregado</li>
            <li class="list-group-item">(3-4) El resultado propuesto por la idea tiene pocas características que generan valor agregado</li>
            <li class="list-group-item">(5-7) El resultado propuesto por la idea tiene suficientes características que generan valor agregado</li>
            <li class="list-group-item">(8-10) El resultado propuesto por la idea tiene plenas características que generan valor agregado</li>
        </ul>
    </div>
</div>

<hr>

<h2>Viabilidad de la idea en el mercado</h2>

<div class="row mb-4">
    <div class="col">
        <h6>&nbsp;</h6>
        <label>El resultado propuesto tiene identificados usuario(s), consumidor(es), cliente(s) y mercados potenciales</label>
        <select class="form-select" id="floatingSelect" name="criterio9" @if($modo == "Ver") disabled @endif required>
            <option selected value="" disabled>Seleccione...</option>
            <option  value=1 @if(isset($evaluacion->criterio9) && $evaluacion->criterio9 == 1) selected @endif>1</option>
            <option  value=2 @if(isset($evaluacion->criterio9) && $evaluacion->criterio9 == 2) selected @endif>2</option>
            <option  value=3 @if(isset($evaluacion->criterio9) && $evaluacion->criterio9 == 3) selected @endif>3</option>
            <option  value=4 @if(isset($evaluacion->criterio9) && $evaluacion->criterio9 == 4) selected @endif>4</option>
            <option  value=5 @if(isset($evaluacion->criterio9) && $evaluacion->criterio9 == 5) selected @endif>5</option>
            <option  value=6 @if(isset($evaluacion->criterio9) && $evaluacion->criterio9 == 6) selected @endif>6</option>
            <option  value=7 @if(isset($evaluacion->criterio9) && $evaluacion->criterio9 == 7) selected @endif>7</option>
            <option  value=8 @if(isset($evaluacion->criterio9) && $evaluacion->criterio9 == 8) selected @endif>8</option>
            <option  value=9 @if(isset($evaluacion->criterio9) && $evaluacion->criterio9 == 9) selected @endif>9</option>
            <option value=10 @if(isset($evaluacion->criterio9) && $evaluacion->criterio9 == 10) selected @endif>10</option>
        </select>
    </div>
    <div class="col">
        <h6>Rúbica</h6>
        <ul class="list-group">
            <li class="list-group-item">(1-2) El resultado propuesto No tiene identificados usuario(s), consumidor(es), cliente(s) y mercados potenciales</li>
            <li class="list-group-item">(3-4) El resultado propuesto tiene identificados pocos usuario(s), consumidor(es), cliente(s) y mercados potenciales</li>
            <li class="list-group-item">(5-7) El resultado propuesto tiene identificados suficientes usuario(s), consumidor(es), cliente(s) y mercados potenciales</li>
            <li class="list-group-item">(8-10) El resultado propuesto tiene identificados un gran número de usuario(s), consumidor(es), cliente(s) y mercados potenciales</li>
        </ul>
    </div>
</div>
<div class="row mb-4">
    <div class="col">
        <h6>&nbsp;</h6>
        <label>Están definidos posibles canales de comercialización o de explotación del resultado propuestos</label>
        <select class="form-select" id="floatingSelect" name="criterio10" @if($modo == "Ver") disabled @endif required>
            <option selected value="" disabled>Seleccione...</option>
            <option  value=1 @if(isset($evaluacion->criterio10) && $evaluacion->criterio10 == 1) selected @endif>1</option>
            <option  value=2 @if(isset($evaluacion->criterio10) && $evaluacion->criterio10 == 2) selected @endif>2</option>
            <option  value=3 @if(isset($evaluacion->criterio10) && $evaluacion->criterio10 == 3) selected @endif>3</option>
            <option  value=4 @if(isset($evaluacion->criterio10) && $evaluacion->criterio10 == 4) selected @endif>4</option>
            <option  value=5 @if(isset($evaluacion->criterio10) && $evaluacion->criterio10 == 5) selected @endif>5</option>
            <option  value=6 @if(isset($evaluacion->criterio10) && $evaluacion->criterio10 == 6) selected @endif>6</option>
            <option  value=7 @if(isset($evaluacion->criterio10) && $evaluacion->criterio10 == 7) selected @endif>7</option>
            <option  value=8 @if(isset($evaluacion->criterio10) && $evaluacion->criterio10 == 8) selected @endif>8</option>
            <option  value=9 @if(isset($evaluacion->criterio10) && $evaluacion->criterio10 == 9) selected @endif>9</option>
            <option value=10 @if(isset($evaluacion->criterio10) && $evaluacion->criterio10 == 10) selected @endif>10</option>
        </select>
    </div>
    <div class="col">
        <h6>Rúbica</h6>
        <ul class="list-group">
            <li class="list-group-item">(1-2) No están definidos posibles canales de comercialización o de explotación del resultado propuestos</li>
            <li class="list-group-item">(3-4) Están definidos pocos posibles canales de comercialización o de explotación del resultado propuestos</li>
            <li class="list-group-item">(5-7) Están definidos suficientes canales posibles de comercialización o de explotación del resultado propuestos</li>
            <li class="list-group-item">(8-10) Están definidos un gran número de posibles canales de comercialización o de explotación del resultado propuestos</li>
        </ul>
    </div>
</div>

<hr>

<h2>Capacidad de acompañamiento del Tecnoparque</h2>

<div class="row mb-4">
    <div class="col">
        <h6>&nbsp;</h6>
        <label>La idea puede ser acompañada técnica y metodológicamente por el Nodo del Tecnoparque</label>
        <select class="form-select" id="floatingSelect" name="capAcomp1" @if($modo == "Ver") disabled @endif required>
            <option selected value="" disabled>Seleccione...</option>
            <option  value="Si" @if(isset($evaluacion->capAcomp1) && $evaluacion->capAcomp1 == "Si") selected @endif>Si</option>
            <option  value="No" @if(isset($evaluacion->capAcomp1) && $evaluacion->capAcomp1 == "No") selected @endif>No</option>
        </select>
    </div>
    <div class="col">
        <h6>&nbsp;</h6>
        <label>El Nodo del Tecnoparque dispone profesionales con experticia para el acompañamiento de la idea</label>
        <select class="form-select" id="floatingSelect" name="capAcomp2" @if($modo == "Ver") disabled @endif required>
            <option selected value="" disabled>Seleccione...</option>
            <option  value="Si" @if(isset($evaluacion->capAcomp2) && $evaluacion->capAcomp2 == "Si") selected @endif>Si</option>
            <option  value="No" @if(isset($evaluacion->capAcomp2) && $evaluacion->capAcomp2 == "No") selected @endif>No</option>
        </select>
    </div>
</div>
<div class="row mb-4">
    <div class="col">
        <h6>&nbsp;</h6>
        <label>El Tecnoparque dispone de los materiales (insumos), equipos, servicios, para el acompañamiento de la idea</label>
        <select class="form-select" id="floatingSelect" name="capAcomp3" @if($modo == "Ver") disabled @endif required>
            <option selected value="" disabled>Seleccione...</option>
            <option  value="Si" @if(isset($evaluacion->capAcomp3) && $evaluacion->capAcomp3 == "Si") selected @endif>Si</option>
            <option  value="No" @if(isset($evaluacion->capAcomp3) && $evaluacion->capAcomp3 == "No") selected @endif>No</option>
        </select>
    </div>
    <div class="col">
        <h6>&nbsp;</h6>
        <label>El resultado propuesto está enmarcado en el contexto institucional SENA, y en la normativa técnica y jurídica colombiana</label>
        <select class="form-select" id="floatingSelect" name="capAcomp4" @if($modo == "Ver") disabled @endif required>
            <option selected value="" disabled>Seleccione...</option>
            <option  value="Si" @if(isset($evaluacion->capAcomp4) && $evaluacion->capAcomp4 == "Si") selected @endif>Si</option>
            <option  value="No" @if(isset($evaluacion->capAcomp4) && $evaluacion->capAcomp4 == "No") selected @endif>No</option>
        </select>
    </div>
</div>

<hr>

<h2>Capacidad de ejecución del proponente o posible talento</h2>

<div class="row mb-4">
    <div class="col">
        <h6>&nbsp;</h6>
        <label>El usuario dispone del talento humano con las competencias técnicas y disponibilidad para la ejecución de la idea</label>
        <select class="form-select" id="floatingSelect" name="capEjec1" @if($modo == "Ver") disabled @endif required>
            <option selected value="" disabled>Seleccione...</option>
            <option  value="Si" @if(isset($evaluacion->capEjec1) && $evaluacion->capEjec1 == "Si") selected @endif>Si</option>
            <option  value="No" @if(isset($evaluacion->capEjec1) && $evaluacion->capEjec1 == "No") selected @endif>No</option>
        </select>
    </div>
    <div class="col">
        <h6>&nbsp;</h6>
        <label>El usuario manifiesta el compromiso de suministrar  materiales (insumos) y servicios, con que no cuenta el Nodo de Tecnoparque, para la obtención de los resultados</label>
        <select class="form-select" id="floatingSelect" name="capEjec2" @if($modo == "Ver") disabled @endif required>
            <option selected value="" disabled>Seleccione...</option>
            <option  value="Si" @if(isset($evaluacion->capEjec2) && $evaluacion->capEjec2 == "Si") selected @endif>Si</option>
            <option  value="No" @if(isset($evaluacion->capEjec2) && $evaluacion->capEjec2 == "No") selected @endif>No</option>
        </select>
    </div>
</div>

<label for="floatingTextarea">Observaciones</label>
<textarea class="form-control" placeholder="Observaciones..." name="observaciones" rows="5" @if($modo == "Ver") disabled @endif>{{ isset( $evaluacion->observaciones ) ? $evaluacion->observaciones : old('observaciones') }}</textarea>

@if($modo != "Ver")
<input type="submit" class="btn btn-primary mt-4" value="Evaluar">
@endif
