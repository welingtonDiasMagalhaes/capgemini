@extends('../layout/base')

@section('titulo', 'Banco Capgemini')

@section('content')    
        
    <div class="alert alert-danger" id="erro-js"></div>    

    <div>
        <form>
            <div class="form-group col-xs-7 col-sm-7 col-md-7 col-lg-7">
              <label for="conta">Informe o número da conta</label>
              <input type="text" class="form-control" id="conta" >
            </div>            
            <button type="button" class="btn btn-primary" onclick="procurarConta()" >Procurar</button>
            <button type="button" class="btn btn-danger" onclick="limpar()" >Limpar</button>
          </form>
        <br />
    </div>

    <div id="retorno" class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
        <table class="table table-striped table-condensed table-bordered" >
            <thead class="thead-dark"  align="center" >
              <tr>
                <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1" >ID</th>
                <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">NOME</th>
                <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">CONTA</th>
                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">SALDO</th>
                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">AÇÕES</th>
              </tr>
            </thead>
            <tbody id="dados_retorno"></tbody>
            <tfoot></tfoot>
        </table>

    </div>

    
	<!-- Bootstrap modal -->
	<div class="modal fade" id="modal_form" role="dialog">
		<div class="modal-dialog">

		  	<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">xxx</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>					
				</div>
			<div class="modal-body form">

				<form action="#" id="form" class="form-horizontal" >
                    <input type="hidden" value="" name="id-conta" id="id-conta"/>
                    <input type="hidden" value="" name="operacao" id="operacao"/>

					<div class="form-body">
						<div class="alert alert-danger" id="modal-validacao"></div>
						<div class="form-group">
							<label class="control-label col-md-3">Valor</label>
							<div class="col-md-9">
								<input name="valor" id="valor" placeholder="Digite o valor usando ponto decimal" class="form-control" 
								type="text">
							</div>
						</div>											
					</div>
				</form>

			</div>

			<div class="modal-footer">
				<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Salvar</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>	

		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- End Bootstrap modal -->

    <script src="{{ asset('js/index.js') }}"  type="text/javascript"></script>

@endSection