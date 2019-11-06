@extends('template')
@section('body')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0-rc.1/Chart.min.js" integrity="sha256-qJdfkTrvMTvYJwkeb1z9a+rOErkiTyqpDz5vi7lZ7MQ=" crossorigin="anonymous"></script>

    <div class=" container" >
        <div class="col-12   d-flex justify-content-center align-items-top">
            <div class="card w-100 shadow p-3 mb-5  rounded">
                <div class="card-header shadow p-3 mb-5 bg-info  text-center w-100">
                    <h1 class="h1 text-white lead">Relatório de vendas</h1>
                </div>
                <div class="card-body col-md-12">
                    <form action="">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="periodoFixo">Periodo</label>
                                <select name="periofoFixo" id="periofoFixo" class="custom-select">
                                    <option value="0">ultimas 24 horas</option>
                                    <option value="1">ultimos 7 dias</option>
                                    <option value="2"> ultimo mês</option>
                                    <option value="3">1 ano</option>
                                    <option value="4">Adicionar Intevalo</option>
                                </select>
                            </div>
                            <!-- <div class="form-group col-md-3">
                                <label for="filtro">Adicionar mais Filtro</label>
                                <select name="filtro" id="filtro" class="custom-select">
                                    <option value="-1" selected>Por produto</option>
                                    <option value="0">Por produto</option>
                                    <option value="1">por vendedor</option>
                                    <option value="2"> por Categoria</option>

                                </select>
                            </div> -->

                            <div class="form-group col-md-3">
                                <label for="vendedor">Por vendedor</label>
                                <select name="venvedor" id="venvedor" class="custom-select">
                                    <option value="0" selected>Selecione</option>
                                    @foreach($data['usuarios'] as $usuario)
                                    <option value="{{$usuario->id}}">{{$usuario->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="produto">Por produto</label>
                                <select name="produto" id="produto" class="custom-select">
                                    <option value="0" selected>Selecione</option>
                                    @foreach($data['produtos'] as $produto)
                                    <option value="{{$produto->id}}">{{$produto->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="produto">Por Cliente</label>
                                <select name="cliente" id="cliente" class="custom-select">
                                    <option value="0" selected>Selecione</option>
                                    @foreach($data['clientes'] as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 form-row data_intervalo">
                                <div class="col-md-6">
                                    <label for="dt_inicio"> Data inicial</label>
                                    <input type="date" id="dt_inicio" name="dt_inicio" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label for="dt_inicio"> Data Final</label>
                                    <input type="date" id="dt_final" name="dt_final" class="form-control">
                                </div>

                            </div>
                            <div class="form-group col-md-12">
                                <button class="btn btn-info btn-md" style="margin-top:30px"> <i class="fas fa-search"></i> Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body col-md-12">
                
                    <div class="d-flex justify-content-left ">
                        <div class="searchbar bg-info">
                            <input class="search_input"  id="myInput" type="text" name="" placeholder="Search...">
                            <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
                        </div>
                    </div>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Data</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Vendedor</th>
                            <th scope="col">forma Pagamento</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- fim linha 1 -->
    <!-- linha 2  Relatorio de vendas -->

<div class="row">
    <div class="card w-100 shadow p-3 mb-5  rounded">
        <div class="card-header shadow p-3 mb-5 bg-info  text-center w-100">
            <h1 class="h1 text-white lead">Relatório de vendas</h1>
        </div>
        <div class="card-body h-100">
            <div class="row">
                <div class="col-md-6  h-100">
                <div class="card-body border">
                        <canvas id="vendaVendedor">
                        </canvas>
                    </div>
                </div>
                <div class="col-md-6  h-100">
                    <div class="card-body border">
                        <canvas id="vendaDia">
                        </canvas>
                    </div>
                </div>
            </div>
        </div>
     
    </div>
</div>
    
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    .searchbar {
        margin-bottom: 30px;
        margin-top: auto;
        height: 60px;



        border-radius:30px;
        padding: 10px;
    }

    .search_input {
        color: white;
        border: 0;
        outline: 0;
        background: none;
        width: 0;
        caret-color: transparent;
        line-height: 40px;
        transition: width 0.4s linear;
    }

    .searchbar:hover>.search_input {
        padding: 0 10px;
        width: 450px;
        caret-color: red;
        transition: width 0.4s linear;
    }

    .searchbar:hover>.search_icon {
        background: white;
        color: #e74c3c;
    }

    .search_icon {
        height: 40px;
        width: 40px;
        float: right;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        color: white;
    }

</style>
@stop
@yield('js')
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        barChart()
        pieChart()

        $('.data_intervalo').hide();
        $('#periofoFixo').change(function() {
            if($('#periofoFixo').val()==4)
                $('.data_intervalo').fadeIn('slow')
            else
            $('.data_intervalo').fadeOut('slow')

        });
        function pieChart() {
            var ctx = document.getElementById('vendaDia');
            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Produto 1', 'Produto 2', 'Produto 3', 'Produto 4'],
                    datasets: [{
                        label: 'receita mes',
                        data: [10, 12, 14, 20],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.9)',
                            'rgba(54, 162, 235, 0.9)',
                            'rgba(255, 206, 86, 0.9)',
                            'rgba(75, 192, 192, 0.9)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 0.9)',
                            'rgba(54, 162, 235, 0.9)',
                            'rgba(255, 206, 86, 0.9)',
                            'rgba(75, 192, 192, 0.9)',

                        ],
                        borderWidth: 1
                    }]
                }
            });
        }

        function barChart() {
            var ctx = document.getElementById('vendaVendedor');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                    datasets: [{
                        label: ' Ultimos 6 meses',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.9)',
                            'rgba(54, 162, 235, 0.9)',
                            'rgba(255, 206, 86, 0.9)',
                            'rgba(75, 192, 192, 0.9)',
                            'rgba(153, 102, 255, 0.9)',
                            'rgba(255, 159, 64, 0.9)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        } 
    });
</script>
