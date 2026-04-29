<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Admin - Maracumango</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
:root{
--yellow:#F5A623;
--black:#1A1A1A;
--cream:#FAFAF5;
--radius:16px;
--shadow:0 8px 25px rgba(0,0,0,0.08);
}

*{margin:0;padding:0;box-sizing:border-box;font-family:'Nunito',sans-serif;}

body{background:var(--cream);}

.sidebar{
position:fixed;
left:0;top:0;
width:230px;
height:100%;
background:var(--black);
padding:20px;
color:white;
}

.sidebar h2{
font-family:'Bebas Neue';
color:var(--yellow);
margin-bottom:20px;
}

.sidebar a{
display:block;
color:white;
padding:12px;
text-decoration:none;
border-radius:10px;
margin-bottom:8px;
}

.sidebar a:hover{background:var(--yellow);color:black;}

.main{
margin-left:230px;
padding:20px;
}

.topbar{
background:white;
padding:15px;
border-radius:var(--radius);
box-shadow:var(--shadow);
display:flex;
justify-content:space-between;
}

.cards{
display:grid;
grid-template-columns:repeat(3,1fr);
gap:20px;
margin-top:20px;
}

.card{
background:white;
padding:20px;
border-radius:var(--radius);
box-shadow:var(--shadow);
text-align:center;
}

.card h3{font-family:'Bebas Neue';}

.charts{
display:grid;
grid-template-columns:repeat(2,1fr);
gap:20px;
margin-top:30px;
}

.chart-box{
background:white;
padding:20px;
border-radius:var(--radius);
box-shadow:var(--shadow);
}

</style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
<h2>🥭 ADMIN</h2>
<a href="principal.php?controller=admin&action=dashboard">📊 Dashboard</a>
<a href="principal.php?controller=admin&action=productos">📦 Productos</a>
<a href="principal.php?controller=admin&action=ventas">💰 Ventas</a>
<a href="principal.php?controller=admin&action=proveedores">🚚 Proveedores</a>
<a href="principal.php?controller=login&action=logout">🚪 Salir</a>
</div>

<!-- MAIN -->
<div class="main">

<div class="topbar">
<h2>Dashboard General</h2>
<div>👤 <?php echo $_SESSION['user']['usuario']; ?></div>
</div>

<!-- CARDS -->
<div class="cards">

<div class="card">
<h3>Productos</h3>
<p><?php echo $totalProductos['total'] ?? 0; ?></p>
</div>

<div class="card">
<h3>Ventas</h3>
<p><?php echo $totalVentas['total'] ?? 0; ?></p>
</div>

<div class="card">
<h3>Stock</h3>
<p><?php echo $totalStock['total'] ?? 0; ?></p>
</div>

</div>

<!-- CHARTS -->
<div class="charts">

<div class="chart-box">
<h3>📈 Ventas por día</h3>
<canvas id="ventasChart"></canvas>
</div>

<div class="chart-box">
<h3>📦 Productos en stock</h3>
<canvas id="stockChart"></canvas>
</div>

</div>

</div>

<script>
// Datos PHP -> JS
const ventasLabels = [<?php if(isset($ventas)) while($v=$ventas->fetch_assoc()) echo '"'.$v['dia'].'",'; ?>];
const ventasData = [<?php if(isset($ventas)) while($v=$ventas->fetch_assoc()) echo $v['total'].','; ?>];

// fallback demo
const demoLabels = ['Lun','Mar','Mie','Jue','Vie'];
const demoData = [5,10,8,15,20];

// CHART VENTAS
new Chart(document.getElementById('ventasChart'), {
 type:'line',
 data:{
 labels: demoLabels,
 datasets:[{
 label:'Ventas',
 data: demoData,
 borderColor:'#F5A623',
 tension:0.3
 }]
 }
});

// STOCK
new Chart(document.getElementById('stockChart'), {
 type:'bar',
 data:{
 labels:['Prod A','Prod B','Prod C','Prod D'],
 datasets:[{
 label:'Stock',
 data:[10,20,5,12],
 backgroundColor:'#F5A623'
 }]
 }
});
</script>

</body>
</html>
