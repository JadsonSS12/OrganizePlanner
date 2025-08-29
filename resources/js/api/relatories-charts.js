fetch("/api/relatories-chart")
  .then(res => res.json())
  .then(data => {
    const labels = data.map(d => d.date);
    const values = data.map(d => d.total);

    new Chart(document.getElementById("myChart"), {
      type: "line",
      data: {
        labels: labels,
        datasets: [{
          label: "Vendas",
          data: values
        }]
      }
    });
  });
