<template>
  <div id="app">
    <GChart
      type="LineChart"
      :data="chartData"
      :options="chartOptions"
    />    
  </div>
</template>

<script>
import { GChart } from "vue-google-charts";
export default {
  components: {
    GChart
  },
  data() {
    return {
      // Array will be automatically processed with visualization.arrayToDataTable function
      chartData: [],
      chartOptions: {
        chart: {
          title: "Company Performance",
          subtitle: "Sales, Expenses, and Profit: 2014-2017"
        }
      }
    };
  },
  methods: {
      loadData() {
          axios.get('api/serie')
                      .then((response)=>{
                        var data = [["Fecha", "Temperatura", "Humedad"]];
                        response.data.forEach(obj => {
                          var date = new Date(parseInt(obj.timestamp));
                          var fil = [date, parseFloat(obj.temp), parseFloat(obj.hum)];
                          data.push(fil);
                        });
                        this.chartData = data;
                      });
      }
  },
  created() {
      this.loadData();
  }
};
</script>
