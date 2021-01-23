

function setCookie(cname, cvalue, exdays) {

    var d = new Date()
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));

    var expires = "expires="+d.toUTCString();

    document.cookie = cname + "=" + cvalue + ";" ;

}



function getCookie(cname) {

    var name = cname + "=",
        ca = document.cookie.split(';')

    for(var i = 0; i < ca.length; i++) {

        var c = ca[i]

        while (c.charAt(0) == ' ') {

            c = c.substring(1);

        }

        if (c.indexOf(name) == 0) {

            return c.substring(name.length, c.length);

        }
    }

    return ""
}



function checkCookie() {

    var user = getCookie("username");

    if (user != "") {

        alert("Welcome again " + user);

    } else {

        user = prompt("Please enter your name:", "");

        if (user != "" && user != null) {

            setCookie("username", user, 365);

        }

    }

}



 function deleteProducto(id){

      var carrito = [],
          data = {}

          carritocookie = getCookie('valorcarrito')
          carritocookie = JSON.parse(carritocookie)

        for (var i = 0; i < carritocookie.length; i++) {

          if(carritocookie[i].id ==id) {

              } else {  

                carrito.push(carritocookie[i])
              }
            }

            setCookie('valorcarrito',JSON.stringify(carrito), 1)
            
            mostrarCarrito()

      }

   function agregarCarrito(id,nombre,imagen,precio,preciofijo) {

    var carrito = [],
        data = {}

      data.id = id
      data.nombre = nombre.replace(/['"]+/g, '')
      data.imagen = imagen.replace(/['"]+/g, '')
      data.precio = parseFloat(precio.replace(/['"]+/g, '')).toFixed(2)
      data.preciofijo = parseFloat(preciofijo.replace(/['"]+/g, '')).toFixed(2)
      data.cantidad = 1
      data.prueba= 0  
      
      carritocookie = getCookie('valorcarrito');

        if(carritocookie=="") {

          carrito.push(data)

          setCookie('valorcarrito',JSON.stringify(carrito), 1)

        } else {

          carritocookie = JSON.parse(carritocookie)

        for (var i = 0; i < carritocookie.length; i++) { 

            if(carritocookie[i].id==data.id) {

             data.prueba = 1
             carritocookie[i].cantidad =  carritocookie[i].cantidad+1
             carritocookie[i].precio =  parseFloat(carritocookie[i].precio)+parseFloat(data.precio)
             carritocookie[i].precio = carritocookie[i].precio.toFixed(2)

            }
        }

    if(data.prueba==0) {

        carritocookie.push(data)
    }

      setCookie('valorcarrito',JSON.stringify(carritocookie), 1)

      }

            mostrarCarrito()

            $("#success-alert").hide()
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500)



        })
      }



  function agregarCarritodetalle(id,nombre,imagen,precio,preciofijo) {

    var valorqty = getCookie('valorqty')
    var carrito = [],
        data = {}

      data.id = id
      data.nombre = nombre.replace(/['"]+/g, '')
      data.imagen = imagen.replace(/['"]+/g, '')
      data.precio = parseFloat(precio.replace(/['"]+/g, '')).toFixed(2)
      data.preciofijo = parseFloat(preciofijo.replace(/['"]+/g, '')).toFixed(2)
      data.cantidad = valorqty
      data.prueba= 0  
      data.precio = data.preciofijo * data.cantidad
      data.precio = data.precio.toFixed(2)

      carritocookie = getCookie('valorcarrito');


        if(carritocookie=="") {

            // la primera vez, multiplica el precio por la cantidad

            data.precio = data.preciofijo*data.cantidad
            data.precio =  data.precio.toFixed(2)

            carrito.push(data)

            setCookie('valorcarrito',JSON.stringify(carrito), 1)

        } else {


          carritocookie = JSON.parse(carritocookie)


        /*

        Recorrer todo y sumar si encuentra el iten enviado

        */

        for (var i = 0; i < carritocookie.length; i++) {

            if(carritocookie[i].id==data.id) {

             data.prueba = 1

               carritocookie[i].cantidad =  valorqty
           
               carritocookie[i].precio = data.preciofijo*data.cantidad
               carritocookie[i].precio = carritocookie[i].precio.toFixed(2)




            }

        }

          if(data.prueba==0) {        

              carritocookie.push(data)

          }

          setCookie('valorcarrito',JSON.stringify(carritocookie), 1)

        }

            mostrarCarrito()

            $("#success-alert").hide()
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500)

        })
      }

function deleteCart(id) {

      var carrito = [],
          data = {}

          carritocookie = getCookie('valorcarrito')
          carritocookie = JSON.parse(carritocookie)

        for (var i = 0; i < carritocookie.length; i++) {

          if(carritocookie[i].id ==id) {

              } else {

                carrito.push(carritocookie[i])
              }
            }


            setCookie('valorcarrito',JSON.stringify(carrito), 1)

           productosCart()
           mostrarCarrito()

}  

function updateCart(id,nombre,imagen,precio,preciofijo,cantidad) {

      data = {}
      data.id = id
      data.nombre = nombre.replace(/['"]+/g, '')
      data.imagen = imagen.replace(/['"]+/g, '')
      data.cantidad = $('#combo'+id).val()
      data.precio = preciofijo*data.cantidad

      carritocookie = getCookie('valorcarrito')
      carritocookie = JSON.parse(carritocookie)

        for (var i = 0; i < carritocookie.length; i++) { 

            if(carritocookie[i].id==data.id) {

               carritocookie[i].cantidad =  data.cantidad
               carritocookie[i].precio =  parseFloat(data.precio)
               carritocookie[i].precio = carritocookie[i].precio.toFixed(2)

          
            }
        }

           setCookie('valorcarrito',JSON.stringify(carritocookie), 1)

            mostrarCarrito()
            productosCart()

            $("#success-alert").hide()
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500)

        })
}



function totales() {

      carritocookie = getCookie('valorcarrito')
      carritocookie = JSON.parse(carritocookie)
      var precio = 0

      for (var i = 0; i < carritocookie.length; i++) { 

            precio = precio+parseFloat(carritocookie[i].precio)
            precio = precio

            }

            $("#preciosubtotalcart").text(precio.toFixed(2))
            $("#preciototalcart").text(precio.toFixed(2))

        }