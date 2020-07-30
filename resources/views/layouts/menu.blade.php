<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li>
          <div class="form-group">
            <label>Estado</label>
            <select class="form-control" onchange="get_municipios('estado','municipio')" id="estado">
              <option value="">Seleccione</option>
              @foreach($estados as $e)
              <option value="{{ $e->id}}">{{$e->estado}}</option>
              @endforeach
            </select>
          </div>
        </li>
        <li>
          <div class="form-group">
            <label>Municipio</label><br>
            <select class="select2 form-control" multiple="multiple" id="municipio">
              <option value="">Seleccione</option>
            </select>
          </div>
        </li>
        <li>
          <div class="form-group">
            <label>Medio</label>    <br/>    
            <select class="select2 form-control"  multiple="multiple" id="medios">
              @foreach($medios as $m)
              <option value="{{$m->id}}">{{$m->nombre_medio}}</option>
              @endforeach
            </select>
          </div>
        </li>
        <li>
          <div class="col">
            <br>
            <span class="btn btn-outline-success pull-right" onclick="busca_medios()"><i class="fa fa-search"></i> Buscar</span>
          </div>
        </li>
      </ul>
    </div>
  </div>










