@extends('Doctor.docnav')

@section('doctor')
   <div class="container ">
    <div class="row ms-5">
       
       
       <canvas id="myChart" class="mt-5" height="300px"></canvas>

    </div>
   </div>

   <script type="text/javascript">
    var cdata = JSON.parse('<?php echo $chart_data ?>')
    var date =  cdata.date
    var no_of_patient =  cdata.count

    const data = {
      labels: date,
      datasets: [{
        label: 'Total No Of Patients',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: no_of_patient,
      }]
    };

    const config = {
      type: 'line',
      data: data,
      options: {}
    };

    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );

</script>
@endsection