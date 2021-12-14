<template>
    <apexchart type="bar" height="350" :options="chartOptions" :series="series"></apexchart>
</template>

<script>
export default {
    name: 'TopTeacher',
    data() {
        return {
          series: [{
            data: [400, 430, 448, 470, 400, 430, 448, 470]
          }],
          chartOptions: {
            chart: {
              type: 'bar',
              height: 350
            },
             title: {
                text: 'Top 15 Teachers with the most classes conducted',
                align: 'left'
            },
            fill: {
              colors: ['#00E396']
            },
            plotOptions: {
              bar: {
                borderRadius: 4,
                horizontal: true,
              }
            },
            dataLabels: {
              enabled: false
            },
            xaxis: {
              categories: ['Jane doe', 'James Doe', 'John Doe', 'James Dee', 'Jane doe', 'James Doe', 'John Doe', 'James Dee'],
            }
          }
        }
    },
}
</script>