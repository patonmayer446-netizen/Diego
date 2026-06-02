<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mi ChatBot</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:linear-gradient(135deg,#0f172a,#2563eb,#06b6d4);
height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

.card{
width:95%;
max-width:550px;
background:white;
border-radius:25px;
padding:30px;
box-shadow:0 15px 40px rgba(0,0,0,.3);
}

h1{
text-align:center;
color:#2563eb;
margin-bottom:20px;
}

label{
display:block;
margin-top:15px;
font-weight:bold;
color:#334155;
}

select,input{
width:100%;
padding:14px;
margin-top:8px;
border:2px solid #cbd5e1;
border-radius:12px;
font-size:16px;
}

.btn{
width:100%;
margin-top:20px;
padding:15px;
background:#2563eb;
color:white;
border:none;
border-radius:12px;
font-size:18px;
cursor:pointer;
font-weight:bold;
}

.btn:hover{
background:#1d4ed8;
}

#chatArea{
display:none;
}

.chat{
height:400px;
overflow-y:auto;
background:#f8fafc;
border-radius:15px;
padding:15px;
margin-top:15px;
border:2px solid #e2e8f0;
}

.bot{
background:#dbeafe;
padding:12px;
border-radius:12px;
margin-bottom:10px;
}

.usuario{
background:#22c55e;
color:white;
padding:12px;
border-radius:12px;
margin-bottom:10px;
text-align:right;
}

.footer{
display:flex;
gap:10px;
margin-top:15px;
}

.footer input{
flex:1;
}

.footer button{
background:#22c55e;
color:white;
border:none;
padding:14px;
border-radius:12px;
cursor:pointer;
font-weight:bold;
}

.info{
text-align:center;
margin-top:10px;
color:#64748b;
font-size:14px;
}

</style>
</head>
<body>

<div class="card">

<div id="inicio">

<h1>🤖 Bienvenido</h1>

<label>Nombre Completo</label>
<input type="text" id="nombre" placeholder="Ingrese su nombre">

<label>Seleccione su Departamento</label>

<select id="departamento">
<option value="">Seleccione...</option>
<option>La Paz</option>
<option>Cochabamba</option>
<option>Santa Cruz</option>
<option>Oruro</option>
<option>Potosí</option>
<option>Chuquisaca</option>
<option>Tarija</option>
<option>Beni</option>
<option>Pando</option>
</select>

<button class="btn" onclick="ingresar()">
Ingresar al Chat
</button>

</div>

<div id="chatArea">

<h1>💬 Centro de Ayuda</h1>

<div id="chat" class="chat">

<div class="bot">
👋 Hola, bienvenido al sistema de atención.
</div>

</div>

<div class="footer">

<input type="text"
id="mensaje"
placeholder="Escribe tu mensaje...">

<button onclick="enviar()">
Enviar
</button>

</div>

<div class="info">
Atención vía WhatsApp
</div>

</div>

</div>

<script>

let usuario = "";
let departamento = "";

function ingresar(){

usuario =
document.getElementById("nombre").value;

departamento =
document.getElementById("departamento").value;

if(usuario=="" || departamento==""){
alert("Complete todos los datos");
return;
}

document.getElementById("inicio").style.display="none";
document.getElementById("chatArea").style.display="block";

}

function enviar(){

let mensaje =
document.getElementById("mensaje").value;

if(mensaje=="") return;

let chat =
document.getElementById("chat");

chat.innerHTML += `
<div class="usuario">
${mensaje}
</div>
`;

let numero = "59171922354";

let texto =
"Nombre: "+usuario+
"%0ADepartamento: "+departamento+
"%0AMensaje: "+mensaje;

setTimeout(()=>{

chat.innerHTML += `
<div class="bot">
✅ Redirigiendo a WhatsApp...
</div>
`;

let url =
"https://wa.me/"+numero+
"?text="+texto;

window.open(url,"_blank");

},1000);

document.getElementById("mensaje").value="";

}

</script>

</body>
</html>