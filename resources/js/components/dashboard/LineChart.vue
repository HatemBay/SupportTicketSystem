<template>
    <canvas ref="myChart" width="900px" height="250px"></canvas>
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
            type: "line",
            data: {
                labels: this.label,
                datasets: [
                    {
                        label: "TOTAL TICKETS",
                        borderColor: "rgba(50, 115, 220, 0.5)",
                        backgroundColor: "rgba(50, 115, 220, 0.1)",
                        fill: false,
                        data: this.chartData
                    }
                ]
            },
            options: {
                scales: {
                    xAxes: [
                        {
                            type: "category",
                            labels: [
                                "Jan",
                                "Feb",
                                "Mar",
                                "Apr",
                                "May",
                                "Jun",
                                "Jul",
                                "Aug",
                                "Sep",
                                "Oct",
                                "Nov",
                                "Dec"
                            ]
                        }
                    ],
                    yAxes: [
                        {
                            ticks: {
                                beginAtZero: true
                            }
                        }
                    ]
                },
                tooltips: {
                    mode: "index",
                    callbacks: {
                        label(tooltipItem, data) {
                            // Get the dataset label.
                            const label =
                                data.datasets[tooltipItem.datasetIndex].label;

                            const value = tooltipItem.yLabel;

                            return `${label}: ${value}`;
                        }
                    }
                }
            }
        });
    }
};
</script>

<style></style>
