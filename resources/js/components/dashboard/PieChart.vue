<template>
    <canvas ref="myChart" width="250px" height="250px"></canvas>
</template>

<script>
import Chart from "chart.js";

export default {
    props: {
        label: {
            type: Array
        },
        chartData: {
            type: Array
        }
    },
    async mounted() {
        await new Chart(this.$refs.myChart, {
            type: "doughnut",
            data: {
                labels: ["Open", "Closed"],
                datasets: [
                    {
                        label: "My First Dataset",
                        data: this.chartData,
                        backgroundColor: [
                            "rgb(255, 99, 132)",
                            "rgb(54, 162, 235)",
                        ],
                        cutout: 250
                    }
                ]
            },
            options: {}
        });
    }
};
</script>

<style></style>
