
const http = require('http')
const fs = require('fs')

const mysql = require('mysql')

const conexion = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'login_encriptado_db'
})



conexion.connect(error => {
  if (error){
    console.log('Problemas de conexion con mysql')
  } else{
    console.log("Todo ok")
  }
    
})

const servidor = http.createServer((pedido, respuesta) => {
    const url = new URL('http://localhost:8088' + pedido.url)
    let camino = 'public' + url.pathname
    if (camino == 'public/')
      camino = 'public/index.html'
    encaminar(pedido, respuesta, camino)
  })