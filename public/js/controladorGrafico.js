
    var url = "/api/equipaments";
    var url2 = "/api/checklists";
    var Status = new Array();
    var Aptos = new Array();
    var nAptos = new Array();
    var a = new Array();
    var na = new Array();
    var Checklists = new Array();
    var c = new Array();
    $(document).ready(function(){
      $.get(url, function(response){
        response.forEach(function(data){
            if(data.status == 1){
                Aptos.push(data.status);
            }else if(data.status == 0){
                nAptos.push(data.status);
            }
        });
    
        $.get(url2, function(response2){
            response2.forEach(function(data){
                Checklists.push(data.id)
            });
        
        
        a.push(Aptos.length);
        na.push(nAptos.length);
        c.push(Checklists.length);

        var ctx = document.getElementById("grafico").getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels:['Não aptos', 'Aptos', 'Checklists preenchidos'],
                  datasets: [{
                      label: 'Total',
                      data: [na, a, c],
                      backgroundColor:[
                        'rgba(204, 40, 15, 0.96)',
                        'rgba(45, 140, 24, 0.96)',
                        'rgba(136, 57, 254, 1)'
                      ],
                      borderWidth: 2
                      
                  }]
            
              },
              options: {
                  title:{
                      display: true,
                      text: "Dados do sistema"
                  },
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero:true
                          }
                      }]
                  }
              }
          });


          
        });
    });
});
