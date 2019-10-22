@extends('template')
@section('title',' Titulo')
@section('body')
<div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <div class="searchbar">
                    <input class="search_input" type="text" name="" placeholder="Search...">
                    <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
                </div>
            </div>
        </div>
<div class="row">
    <div class="col-lg-3 col-md-4 col-sm-12 shadow p-3 mb-5 rounded">

        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-5 col-sm-12 col-md-5">
                        <img src="{!! asset('imgs/estoque-icon.png') !!}" alt="" height="72px" class="image image-responsive">

                    </div>
                    <div class="col-lg-7 col-md-5 col-sm-12">
                        <p class="card-text"> Text 1</p>
                        <h3 class="card-title">Text 2</h3>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <p class="text-left">Relatório de estoque</p>
            </div>
        </div>
    </div>
    <!-- -->
    
    <div class="col-lg-3 col-md-4 shadow p-3 mb-5 rounded">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-5 col-sm-12 col-md-5">
                        <img src="{!! asset('imgs/venda-icon.jpg') !!}" alt="" height="72px" class="image image-responsive">

                    </div>
                    <div class="col-lg-7 col-md-5 col-sm-12">
                        <p class="card-text"> Text 1</p>
                        <h3 class="card-title">Text 2</h3>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <p class="text-left">Relatório de vendas</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 shadow p-3 mb-5 rounded">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-5 col-sm-12 col-md-5">
                        <img src="{!! asset('imgs/user-icon.png') !!}" alt="" height="72px" class="image image-responsive">

                    </div>
                    <div class="col-lg-7 col-md-5 col-sm-12">
                        <p class="card-text"> Text 1</p>
                        <h3 class="card-title">Text 2</h3>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <p class="text-left">Relatório de Usuários</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 shadow p-3 mb-5 rounded">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-5 col-sm-12 col-md-5">
                        <img src="{!! asset('imgs/user-icon.png') !!}" alt="" height="72px" class="image image-responsive">

                    </div>
                    <div class="col-lg-7 col-md-5 col-sm-12">
                        <p class="card-text"> Text 1</p>
                        <h3 class="card-title">Text 2</h3>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <p class="text-left">Relatório de Usuários</p>
            </div>
        </div>
    </div>
  
</div>
<!-- Row 2 -->

<div class="row">

    <div class="col-sm-12 col-md-6  col-lg-4 shadow p-3 mb-5 rounded" >
        <div class="card" >
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0-rc.1/Chart.min.js" integrity="sha256-qJdfkTrvMTvYJwkeb1z9a+rOErkiTyqpDz5vi7lZ7MQ=" crossorigin="anonymous"></script>

            <canvas id="myChart"></canvas>
            <div class="card-body">
                <h5 class="card-title">Lucro</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6  col-lg-4 shadow p-3 mb-5 rounded">
        <div class="card" >
     
            <canvas id="myLineChart" ></canvas>
            <div class="card-body">
                <h5 class="card-title">Numero de clientes</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6  col-lg-4">
        <div class="card" >
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0-rc.1/Chart.min.js" integrity="sha256-qJdfkTrvMTvYJwkeb1z9a+rOErkiTyqpDz5vi7lZ7MQ=" crossorigin="anonymous"></script>

            <canvas id="myPieChart"></canvas>
            <div class="card-body">
                <h5 class="card-title">Produtos mais vendidos</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
 
</div>
<div class="row ">
    <div class="col-sm-12 col-md-12 col-lg-6 shadow p-3 mb-5 rounded">
        <div class="card">
            <div class="card-header">
                <h3 class="h3"> Tarefas e Avisos</h3>
            </div>
            <div class="card-body">
                <table class="table text-center table-striped border    ">
                    <thead class="thead-dark"> 
                        <tr>
                            <th>Marcar</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Lorem ipsum dolor sit  elit. Sed, debitis praesentium. Impedit, nisi dolor est nemo </td>
                            <td  class="btn-group" role="group" aria-label="...">
                              
                                <a   href="#" class="btn "><i class="far fa-edit"></i></a>
                                <a   href="#" class="btn "><i class="far fa-trash-alt" style="color:red"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Lorem ipsum dolor sit  elit. Sed, debitis praesentium. Impedit, nisi dolor est nemo </td>
                            <td  class="btn-group" role="group" aria-label="...">
                              
                                <a   href="#" class="btn "><i class="far fa-edit"></i></a>
                                <a   href="#" class="btn "><i class="far fa-trash-alt" style="color:red"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>Lorem ipsum dolor sit  elit. Sed, debitis praesentium. Impedit, nisi dolor est nemo </td>
                            <td  class="btn-group" role="group" aria-label="...">
                              
                                <a   href="#" class="btn "><i class="far fa-edit"></i></a>
                                <a   href="#" class="btn "><i class="far fa-trash-alt" style="color:red"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class=" col-sm-12 col-md-12 col-lg-6 shadow p-3 mb-5 rounded">
        <div class="card">
            <div class="card-header">
                <h3 class="h3">Relatório de funcionários</h3>
            </div>
            <div class="card-body">
                <table class="table text-center table-striped border ">
                    <thead class="thead-light"> 
                        <tr>
                            <th>Nome</th>
                            <th>Salário</th>
                            <th>Cargo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John Doe</td>
                            <td>$ 6.738</td>
                            <td> Analísta de Sistemas     </td>
                        </tr>
                        <tr>
                            <td>Maria Joana</td>
                            <td>$ 4.738</td>
                            <td> Programadaora php junior     </td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@yield('css')
<style>
 .searchbar{
    margin-bottom: auto;
    margin-top: auto;
    height: 60px;
    background-color: #3a3f48;
    border-radius: 30px;
    padding: 10px;
    }

    .search_input{
    color: white;
    border: 0;
    outline: 0;
    background: none;
    width: 0;
    caret-color:transparent;
    line-height: 40px;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_input{
    padding: 0 10px;
    width: 450px;
    caret-color:red;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_icon{
    background: white;
    color: #e74c3c;
    }

    .search_icon{
    height: 40px;
    width: 40px;
    float: right;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    color:white;
    }
</style>
@yield('js')
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

<script>
$(document).ready(function(){
    pieChart()
    barChart()
    lineChart()
    function lineChart(){
        var ctx = document.getElementById('myLineChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'My First dataset',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [0, 10, 15, 12, 18, 21, 35]
                }]
            },

    // Configuration options go here
    options: {}
});
    }
   function pieChart(){
    var ctx = document.getElementById('myPieChart');
    var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels:['Produto 1','Produto 2', 'Produto 3', 'Produto 4'],
        datasets:[{
            label:'receita mes',
            data:[10,12,14,20],
            backgroundColor: [
                'rgba(255, 99, 132, 0.9)',
                'rgba(54, 162, 235, 0.9)',
                'rgba(255, 206, 86, 0.9)',
                'rgba(75, 192, 192, 0.9)',
            ],
            borderColor:[
                'rgba(255, 99, 132, 0.9)',
                'rgba(54, 162, 235, 0.9)',
                'rgba(255, 206, 86, 0.9)',
                'rgba(75, 192, 192, 0.9)',

            ],
            borderWidth:1
        }]
    }
});
   }

function barChart(){
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
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
