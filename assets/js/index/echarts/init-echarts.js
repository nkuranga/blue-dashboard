$(document).ready(function() {



    <!--Doughnut echarts init-->

    var dom = document.getElementById("doughnut");
    var dnutChart = echarts.init(dom);

    var app = {};
    option = null;
    option = {
        color: ['#FF518A','#eac459', '#36a2f5','#34bfa3', '#A768F3'],
        tooltip : {
            trigger: 'item',
            formatter: '{a} <br/>{b} : {c} ({d}%)'
        },
        legend: {
            orient : 'vertical',
            x : 'left',
            data:['Direct','Mail','Affiliate','AD','Search']
        },
        calculable : true,
        series : [
            {
                name:'Source',
                type:'pie',
                radius : ['50%', '70%'],
                data:[
                    {value:335, name:'Direct'},
                    {value:310, name:'Mail'},
                    {value:234, name:'Affiliate'},
                    {value:135, name:'AD'},
                    {value:1548, name:'Search'}
                ]
            }
        ]
    };

    if (option && typeof option === "object") {
        dnutChart.setOption(option, false);
    }
window.onresize = dnutChart.resize



});
